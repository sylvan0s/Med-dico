angular.module('starter.controllers', [])
    .controller('AppCtrl', function($scope, $ionicModal, $timeout, $http, ApiEndpoint) {

        // With the new view caching in Ionic, Controllers are only called
        // when they are recreated or on app start, instead of every page change.
        // To listen for when this page is active (for example, to refresh data),
        // listen for the $ionicView.enter event:
        //$scope.$on('$ionicView.enter', function(e) {
        //});
        // Form data for the login modal
        $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
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
          $http.get(ApiEndpoint.url + "/med-dico/public/api/test?token=" + data.token).
              success(function(data) {
                  alert(data.foo);
              }).
              error(function(data) {
                  if(data != null)
                    alert("error get : " + data.error);
              });
        }).
        error(function(data) {
            if(data != null) {
                alert("error post : " + data.error);
            }
        });


    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    /* $timeout(function() {
      $scope.closeLogin();
    }, 1000); */
  };
})
    .controller('SearchCtrl', function($scope, $timeout, $http, ApiEndpoint) {
        var vm = this;
        $scope.searchData = {};
        $("#search").keyup(function() {

            clearTimeout(vm.plainSearch_timeout);
            vm.plainSearch_timeout = setTimeout(function(){
                Search();
                //console.log("coucou, sa fonctionne :)")
            }, 1000);
        });

        $scope.searchClear = function() {

        };

       var Search = function() {
           // alert("hey");
           //$scope.medicaments = [];
           //console.log($scope.medicaments);
            if($scope.searchData.search.length > 0){
                $http.post( ApiEndpoint.url + "/med-dico/public/api/search",
                    {
                        "search" : $scope.searchData.search
                    },"json").
                    success(function(data) {
                        console.log(data.results);
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
    .controller('PlaylistsCtrl', function($scope) {
      $scope.playlists = [
        { title: 'Reggae', id: 1 },
        { title: 'Chill', id: 2 },
        { title: 'Dubstep', id: 3 },
        { title: 'Indie', id: 4 },
        { title: 'Rap', id: 5 },
        { title: 'Cowbell', id: 6 }
      ];
    })
    .controller('PlaylistCtrl', function($scope, $stateParams) {

    });
