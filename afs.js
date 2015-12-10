angular.module('afsLS', ['ui.router'])

.config(function($stateProvider, $urlRouterProvider) {

	$stateProvider

		.state('afs', {
			url: '/afs',
			templateUrl: 'afs.html'
		})

		//a fresh start log in
		.state('afs.signin', {
			url: '/signin',
			templateUrl: 'afs-signin.html',
			controller: 'loginController'
		})

		//a fresh start register
		.state('afs.register', {
			url: '/register',
			templateUrl: 'afs-register.html',
			controller: 'regController'
		})

		//a fresh start
		.state('afs.fp', {
			url: '/fp',
			templateUrl: 'afs-fp.html',
			controller: 'fpController'
		})

		.state("afs.sr", {
			url: '/sr',
			templateUrl: 'afs-sr.html',
			controller: 'srController'
		})

		.state('afs.campaign', {
			url: '/campaign',
			templateUrl: 'afs-campaign.html',
			controller: 'campaignController'

		})

		.state('afs.campStatus', {
			url: '/campaignStatus',
			templateUrl: 'afs-campStatus.html',
			controller: 'campStatusController'

		});


		$urlRouterProvider.otherwise('/afs/signin');
})

//loginController
.controller('loginController', function($scope) {
	$scope.login = function() {
		var _User = Parse.Object.extend("Users");

		var query = new Parse.Query(_User);
		var _user = new _User();
 
		query.equalTo("username", $scope.username);
		query.equalTo("password", $scope.password);

		//find using query.find
		query.find({
			success: function(results) {
				if(results.length === 1) {
					//go to shelter page
					alert("Going to profile page");
					}
				else
					alert("Incorrect user combination");
				},
				error: function(results, error) {
					alert("Error: " + error.code + error.message);
				}
			});
		}
})

//registration controller
.controller("regController", function($scope) 
{
	$scope.register= function() {
		var _User = Parse.Object.extend("Users");
		var query = new Parse.Query(_User);

		var _user = new _User();


		// put info into a database, but however before we input data
		// we need to look for info from parse.
		query.equalTo("username", $scope.username);
		query.equalTo("email", $scope.email);
		query.find({
			success: function(results) 
			{
				if(results.length === 0  && $scope.checkPWComb()) 
				{
					_user.set("username", $scope.username);
					_user.set("password", $scope.password);
					_user.set("name", $scope.name);
					_user.set("email", $scope.email);
					_user.set("isVerified", false);

					//campaignids
					_user.set("campaignIds", "");
					//communityIds
					_user.set("communityIds", "")
					//followedShelterIds
					_user.set("shelterIds", "");

					_user.save(null, {
					success: function(user) {
						alert("User created");
					},
					error: function(user, error) {
						alert("User was not created");
						}
					});
				}
				else
				{
					//user already exists
					if(!$scope.checkPWComb())
						alert("Passwords do not match");
					else
						alert("User already exists!");
				}
			},
			error: function(error) {}
		});
	}
	$scope.checkPWComb = function() {
		if($scope.password === $scope.passwordOne) {
			return true;
		}
		else
			return false;
	}
	$scope.generateUserID = function() {
		//generate userID
	}
})

//forgotPassword controller

//check to see if email exists
//if it does send email with password reset?
.controller('fpController', function($scope) {
	//check email if it exists
	//send email code
	$scope.sendEmail = function() {
		var _UserEmail = Parse.Object.extend("Users");
		var query = new Parse.Query(_UserEmail);

		var _userEmail = new _UserEmail();

		query.equalTo("email", $scope.emailOne);

		query.find({
			success: function(results) {
				//send email here
				//need to make a call to the server from here
			},
			error: function(results, error) {
				alert("Error: " + error.code);
			}
		})
	}
})
//Shelter Registration Controller
.controller('srController', function($scope) {
	//Check to see if shelter already exists
	//send error
	$scope.addShelter = function() {
		$scope.shelterIdOne = $scope.createShelterId();
		alert($scope.shelterIdOne);
	}
	//else go ahead and register it to user
	//create an adminID for that shelter
	//create a shelterID as well
	$scope.createShelterId = function() {
		//create shelterID
		return Math.floor((Math.random() * 3000000) + 2000000);

	}

})
.controller('campaignController', function($scope) {
	$scope.createCampaign = function() {
				var _Campaigns = Parse.Object.extend("Campaigns");
				var _campaigns = new _Campaigns();
					_campaigns.set("campaignName", $scope.campaignName);
					_campaigns.set("startDate", $scope.startDate);
					_campaigns.set("endDate", $scope.endDate);
					_campaigns.set("place", $scope.place);
					_campaigns.set("description", $scope.description);
					_campaigns.set("goal", $scope.goal);
					_campaigns.set("isVerified", false);
					_campaigns.set("shelterIds", $scope.shelterIds);
					_campaigns.save(null, {
					success: function(campaign) {
						alert("Campaign created");
					},
					error: function(campaign, error) {
						alert("Campaign was not created");
						}
					});
					//_campaigns.set("itemCount", $scope.itemCount);
					//_campaigns.set("dollarCount", $scope.dollarCount);
	}
})

.controller('campStatusController', function($scope,$timeout) {
	$scope.lookupCampaign = function() {
		var _Campaigns = Parse.Object.extend("Campaigns");

		var query = new Parse.Query(_Campaigns);
		var _campaigns = new _Campaigns();
 
		query.equalTo("campaignName", $scope.campaignName);

		//find using query.find
		query.find({
			success: function(results) {
				if(results.length === 1) {
					document.getElementById("campaignName").innerHTML = results[0].get('campaignName');
					document.getElementById("shelterIds").innerHTML = results[0].get('shelterIds');
					document.getElementById("place").innerHTML = results[0].get('place');
					document.getElementById("startDate").innerHTML = results[0].get('startDate');
					document.getElementById("endDate").innerHTML = results[0].get('endDate');
					document.getElementById("description").innerHTML = results[0].get('description');
					document.getElementById("goal").innerHTML = results[0].get('goal');
					document.getElementById("itemCount").innerHTML = results[0].get('itemCount');
					//attempting to set up live updating
					//for (var i = 0; i < 30; i++) {
					//	$timeout(function(){document.getElementById("itemCount").innerHTML = results[0].get('itemCount')}, 2000);
					//};
					
				}
				else
					alert("That Campaign does not exist");
				},
				error: function(results, error) {
					alert("Error: " + error.code + error.message);
				}
			});
		}
});