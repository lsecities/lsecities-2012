var mediaArchiveApp = angular.module('mediaArchiveApp', []);
 
mediaArchiveApp.controller('MediaArchiveCtrl', function ($scope) {
  $scope.items = [];
  
  $scope.loadItems = function() {
    var httpRequest = $http({
      method: 'GET',
      url: '/media/search-dev'
    }).success(function(data, status) {
      $scope.items = data;
    });
  };
  
  $scope.loadItems();
});
