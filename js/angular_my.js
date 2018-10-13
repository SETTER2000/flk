angular.module('app',[])
    .config(['$sceDelegateProvider', function($sceDelegateProvider) {
        // We must whitelist the JSONP endpoint that we are using to show that we trust it
        $sceDelegateProvider.resourceUrlWhitelist([
            'self',
            'https://angularjs.org/**'
        ]);
    }])
    .controller('mainCtrl', ['$scope', '$http','$templateCache',
        function ($scope,  $http, $templateCache) {

        $scope.showPopUpMsg = false;
        $scope.pops = 'dohera';
        $scope.openPopUp = function (task) {

            if (angular.isDefined(task)) {
                console.log(task);
                $scope.showPopUpMsg = true;
                $scope.popUpMsgContent = task;
            }
        }
    }
])
    .directive('popUpMsg', function ($http) {
        return {
            restrict: 'E',
            scope: false,
            templateUrl: 'application/views/popupTmp.html',
            // template: '<div id="popUpMsg-bg" ng-show="showPopUpMsg"><div id="popUpMsg"><div class="close" ng-click="closePopUp()">x</div><div class="content">{{popUpMsgContent}}</div><button ng-click="closePopUp()">Ok</button></div></div>',

            controller: function ($scope) {
                $scope.closePopUp = function () {
                    $scope.showPopUpMsg = false;

                };

                $scope.closeOKPopUp = function () {
                    console.log($scope.popUpMsgContent);
                    $scope.showPopUpMsg = false;

                    var promise =$http.post('/tasks/add', $scope.popUpMsgContent);
                    //console.log(promise);
                    promise.then(fullfilled, rejected);

                    // toastr.success('Объект удалён.', 'OK! ');
                    function fullfilled(response) {
                        console.log('Status: ' + response.status);
                        console.log('Type: ' + response.headers('content-type'));
                        console.log('Length: ' + response.headers('content-length'));
                        console.log('Length: ' + response.data);

                        // toastr.success(response.data, 'Ok!');
                        console.log(response.data);
                        if(response.status === 200) {
                            // document.write(response.responseText);
                            // location.assign( "/");
                        }

                        //$scope.items = response.data.users;
                    }

                    function rejected(err) {
                        console.log(err.data);
                        // toastr.error(err.data, 'Ошибка! DashboardController');

                    }
                };

            }
        }
    })
