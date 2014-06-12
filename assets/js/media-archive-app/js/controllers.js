var mediaArchiveApp = angular.module('mediaArchiveApp', []);

mediaArchiveApp.controller('StaticMediaArchiveCtrl', function ($scope, $http) {
  $scope.items = [];
  $scope.mediatypes = { audio: false, video: false};
  
  $scope.loadItems = function() {
    var httpRequest = $http({
      method: 'GET',
      url: '/wp-content/themes/lsecities-2012/assets/js/media-archive-app/media_archive_data.json'
    }).success(function(data, status) {
      $scope.audio_video_items = data.audio_video_items;
      $scope.articles = data.articles;
    });
  };
  
  $scope.loadItems();
});

mediaArchiveApp.controller('MediaArchiveCtrl', function ($scope, $http) {
  $scope.items = [];
  $scope.mediatypes = { audio: false, video: false};
  
  $scope.loadItems = function() {
    var avItemsRequest = $http({
      method: 'GET',
      url: '/search/audio_video_items'
    }).success(function(data, status) {
      $scope.audio_video_items = data.audio_video_items;
    });
    var articleItemsRequest = $http({
      method: 'GET',
      url: '/search/articles'
    }).success(function(data, status) {
      $scope.articles = data.articles;
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
