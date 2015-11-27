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

        $scope.test = function() {
            console.log("coucou");
        };

        setInterval(function(){
            $scope.token = ApiEndpoint.token;
        }, 1500);

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

        $scope.refreshMedicament = function() {
            $http.get(ApiEndpoint.url + "/med-dico/public/api/admin/" + ApiEndpoint.email_user).
                success(function(data) {
                    console.log(data);
                    $scope.medicaments = data.medicament[0];
                }).
                error(function(data) {
                    if(data != null)
                        alert("error get user medicament : " + data.error);
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

        $scope.logout = function() {
            ApiEndpoint.token = '';
        };

        // Perform the login action when the user submits the login form
        $scope.doLogin = function() {

    $http.post(ApiEndpoint.url + "/med-dico/public/api/login",
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
            if(data.error == "invalid_credentials") {
                $scope.showAlert("Login ou mot de passe incorrect");
                //alert("error post login: " + data.error);
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
    .controller('SearchCtrl', function($scope, $timeout, $http, ApiEndpoint, $ionicLoading) {
        var vm = this;
        $scope.searchData = {};
        $("#search").keyup(function() {
            clearTimeout(vm.plainSearch_timeout);
            vm.plainSearch_timeout = setTimeout(function(){
                Search();
            }, 1000);
        });

        $scope.searchClear = function() {
            $('#search').val('');
        };

        $scope.show = function() {
            $ionicLoading.show({
                template: "Loading... <ion-spinner></ion-spinner>"
            });
        };
        $scope.hide = function(){
            $ionicLoading.hide();
        };

       var Search = function() {
            if($scope.searchData.search.length > 0){
                $scope.show();
                $http.post( ApiEndpoint.url + "/med-dico/public/api/search",
                    {
                        "search" : $scope.searchData.search
                    },"json").
                    success(function(data) {
                        $scope.medicaments = data.results;
                        $scope.hide()
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
                $scope.medicaments = data;
            }).
            error(function(data) {
                if(data != null)
                    alert("error get : " + data.error);
            });
    })

    .controller('FicheCtrl', function($scope, $stateParams, $http, ApiEndpoint) {
        console.log($stateParams.medicamentId);
        $http.get(ApiEndpoint.url + "/med-dico/public/api/fiche/" + $stateParams.medicamentId).
            success(function(data) {
                $scope.medicaments = data.medicament[0];
            }).
            error(function(data) {
                if(data != null)
                    alert("error get info medicament : " + data.error);
            });
    })
    .controller('AdminCtrl', function($scope, $stateParams, $timeout, $http, ApiEndpoint, $ionicModal) {
        console.log(ApiEndpoint.email_user);
        $scope.addData = {};
        $scope.refreshMedicament = function() {
            console.log("refresh");
            $http.get(ApiEndpoint.url + "/med-dico/public/api/admin/" + ApiEndpoint.email_user).
                success(function(data) {
                    console.log(data);
                    if(data.medicament.length == 1)
                        $scope.medicaments = data.medicament[0];
                    else
                        $scope.medicaments = data.medicament;
                }).
                error(function(data) {
                    if(data != null)
                        alert("error get user medicament : " + data.error);
                });
        };
        $scope.refreshMedicament();
        $ionicModal.fromTemplateUrl('templates/medicamentAdd.html', {
            scope: $scope
        }).then(function(modal) {
            $scope.modalAdd = modal;
        });
        $scope.add = function() {
            $scope.modalAdd.show();
        };
        $scope.closeAdd = function() {
            $scope.modalAdd.hide();
        };
        $scope.doAdd = function() {
            console.log($scope.addData);
            $http.post( ApiEndpoint.url + "/med-dico/public/api/add",
                {
                    "email_user" : ApiEndpoint.email_user,
                    "name" : $scope.addData.name,
                    "description" : $scope.addData.description,
                    "forme" : $scope.addData.forme,
                    "voie" : $scope.addData.voie,
                    "remboursement" : $scope.addData.remboursement,
                    "prix" : $scope.addData.prix,
                    "laboratoire" : $scope.addData.laboratoire,
                    "ordonnance" : $scope.addData.voie
                },"json").
                success(function() {
                    $scope.showAlert("Ajout de medicament success");
                    $scope.refreshMedicament();
                    $scope.closeAdd();
                }).
                error(function(data) {
                    if(data != null) {
                        alert("error post login: " + data.error);
                    }
                });
            // Simulate a login delay. Remove this and replace with your login
            // code if using a login system
            $timeout(function() {
                $scope.closeAdd();
            }, 1000);
        };
    });