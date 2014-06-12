var mediaArchiveApp = angular.module('mediaArchiveApp', ['mediatypefilter']);

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
  $scope.mediatypes = { audio: true, video: true };
  
  $scope.loadItems = function() {
    var avItemsRequest = $http({
      method: 'GET',
      url: '/search/audio_video_items'
    }).success(function(data, status) {
      $scope.audio_video_items = data.items;
    });
    
    var articleItemsRequest = $http({
      method: 'GET',
      url: '/search/articles'
    }).success(function(data, status) {
      $scope.articles = data.items;
    });
  };
  
  $scope.loadItems();
});

mediaArchiveApp.filter('mediatypefilter', function() {
  return function(items, mediatypes) {
    var filtered = [];

    console.log('in mediatypefilter');
    console.log(mediatypes);
    
    // If no specific media type has been selected, return everything
    if(mediatypes.audio == false && mediatypes.video == false) {
        return items;
    }
    
    // Otherwise, filter by media type
    angular.forEach(items, function(item) {
      if(mediatypes.audio == true && item.youtube_uri.length > 0){
        filtered.push(item);
      }
      else if(mediatypes.video == true && item.audio_uri.length > 0){
        filtered.push(item);
      }
    });

    return filtered;
  };
});
