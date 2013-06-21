'use strict';

var jaztecCms = angular.module('jaztecCms', [
    'jaztecCmsPageService',
    'ngSanitize'
]).config(['$routeProvider', function($routeProvider){
    $routeProvider.
        when('/:route', {templateUrl: '/cms/partials/cleared.html', controller: 'PageCtrl'}).
        otherwise({redirectTo: '/home'});
}]).config(['$locationProvider', function($location) {
    $location.hashPrefix('!');
}]);
