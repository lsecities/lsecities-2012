var mediaArchiveApp = angular.module('mediaArchiveApp', []);

mediaArchiveApp.controller('MediaArchiveCtrl', function ($scope, $http) {
  $scope.items = [];
  $scope.mediatypes = { "audio" : true, "video" : true };
  $scope.talktypes = { "lecture" : true, "conference_session" : true };
  var use_static_data = $location.search('static');
  
  $scope.loadItems = function() {
    if(use_static_data === 'false') {
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
    } else {
      var httpRequest = $http({
        method: 'GET',
        url: '/wp-content/themes/lsecities-2012/assets/js/media-archive-app/media_archive_data.json'
      }).success(function(data, status) {
        $scope.audio_video_items = data.audio_video_items;
        $scope.articles = data.articles;
      });
    };
  };
  
  $scope.loadItems();
});

mediaArchiveApp.filter('mediatypefilter', function() {
  return function(items, mediatypes) {
    var filtered = [];
    
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

mediaArchiveApp.filter('talkTypeFilter', function() {
  return function(items, talktypes) {
    var filtered = [];
    
    angular.forEach(items, function(item) {
      if(talktypes.lecture == true && item.parent_event !== null && typeof item.parent_event === 'object'){
        filtered.push(item);
      }
      else if(talktypes.conference_session == true && item.related_session !== null && typeof item.related_session === 'object'){
        filtered.push(item);
      }
    });

    return filtered;
  };
});
