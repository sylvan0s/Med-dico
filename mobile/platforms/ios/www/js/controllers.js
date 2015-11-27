angular.module('starter.controllers', [])
    .controller('AppCtrl', function($scope, $ionicModal, $timeout, $http, ApiEndpoint, $ionicPopup) {

        // With the new view caching in Ionic, Controllers are only called
        // when they are recreated or on app start, instead of every page change.
        // To listen for when this page is active (for example, to refresh data),
        // listen for the $ionicView.enter event:
        //$scope.$on('$ionicView.enter', function(e) {
        //});
        // Form data for the login modal

        // init token
        $scope.token = ApiEndpoint.token;

        setInterval(function(){
            console.log(ApiEndpoint.token);
            $scope.token = ApiEndpoint.token;
        }, 2000);

        $scope.loginData = {};
        $scope.registerData = {};

      // Create the login modal that we will use later

        $ionicModal.fromTemplateUrl('templates/login.html', {
            scope: $scope
        }).then(function(modal) {
            $scope.modalLogin = modal;
        });

        $ionicModal.fromTemplateUrl('templates/register.html', {
            scope: $scope
        }).then(function(modal) {
            $scope.modalRegister = modal;
        });

        $scope.showAlert = function(data) {
            $ionicPopup.alert({
                title: 'Message info',
                template: data
            });
        };

        // Triggered in the login modal to close it
        $scope.closeLogin = function() {
            $scope.modalLogin.hide();
        };

        $scope.closeRegister = function() {
            $scope.modalRegister.hide();
        };

        // Open the login modal
        $scope.login = function() {
            $scope.modalLogin.show();
        };

        // Open the register modal
        $scope.register = function() {
            $scope.modalRegister.show();
        };

        // Perform the login action when the user submits the login form
        $scope.doLogin = function() {

    //console.log('Doing login', $scope.loginData);

    $http.post( ApiEndpoint.url + "/med-dico/public/api/login",
        {
          "email" : $scope.loginData.email,
          "password" : $scope.loginData.password
        },"json").
        success(function(data) {
            ApiEndpoint.token = data.token;
            ApiEndpoint.email_user = data.credentials.email;
            $scope.showAlert("login success");
        }).
        error(function(data) {
            if(data != null) {
                alert("error post login: " + data.error);
            }
        });


    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
     $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };

        $scope.doRegister = function() {
            console.log($scope.registerData);
            $http.post( ApiEndpoint.url + "/med-dico/public/api/register",
                {
                    "lastname" : $scope.registerData.nom,
                    "firstname" : $scope.registerData.prenom,
                    "email" : $scope.registerData.email,
                    "pseudo" : $scope.registerData.pseudo,
                    "password" : $scope.registerData.password
                },"json").
                success(function(data) {
                    //console.log(data);
                    $scope.showAlert(data);
                }).
                error(function(data) {
                    if(data != null) {
                        alert("error post login: " + data.error);
                    }
                });
            // Simulate a login delay. Remove this and replace with your login
            // code if using a login system
            $timeout(function() {
                $scope.closeRegister();
            }, 1000);
        };
})
    .controller('SearchCtrl', function($scope, $timeout, $http, ApiEndpoint) {
        var vm = this;
        $scope.searchData = {};
        $("#search").keyup(function() {

            clearTimeout(vm.plainSearch_timeout);
            vm.plainSearch_timeout = setTimeout(function(){
                Search();
            }, 1000);
        });

        $scope.searchClear = function() {

        };

       var Search = function() {
            if($scope.searchData.search.length > 0){
                $http.post( ApiEndpoint.url + "/med-dico/public/api/search",
                    {
                        "search" : $scope.searchData.search
                    },"json").
                    success(function(data) {
                        //console.log(data.results);
                        $scope.medicaments = data.results;
                    }).
                    error(function(data) {
                        if(data != null) {
                            alert("error post : " + data.error);
                        }
                    });
            }
       };
    })

    .controller('HomeCtrl', function($scope, $stateParams, $http, ApiEndpoint) {
        $http.get(ApiEndpoint.url + "/med-dico/public/api/home").
            success(function(data) {
                //alert(data);
                //console.log(data);
                $scope.medicaments = data;
            }).
            error(function(data) {
                if(data != null)
                    alert("error get : " + data.error);
            });
    });
