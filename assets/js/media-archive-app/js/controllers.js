var mediaArchiveApp = angular.module('mediaArchiveApp', []);
 
mediaArchiveApp.controller('MediaArchiveCtrl', function ($scope, $http) {
  $scope.items = [];
  
  // use GET parameter to populate query input field
  $scope.search = $location.search('search');
  $scope.mediatypes = { audio: false, video: false};
  
  $scope.loadItems = function() {
    var httpRequest = $http({
      method: 'GET',
      url: '/media/search-dev.json'
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
