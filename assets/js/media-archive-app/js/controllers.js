var mediaArchiveApp = angular.module('mediaArchiveApp', []);
 
mediaArchiveApp.controller('MediaArchiveCtrl', function ($scope, $http) {
  $scope.items = [];
  $scope.mediatypes = { audio: false, video: false};
  
  $scope.loadItems = function() {
    var httpRequest = $http({
      method: 'GET',
      url: '/media/search-dev'
    }).success(function(data, status) {
      $scope.items = data.items;
    });
  };
  
  $scope.loadItems();
});

mediaArchiveApp.filter('mediatypefilter', function() {
  return function(items, options) {
    console.log(items);
    console.log(options);
  };
});
