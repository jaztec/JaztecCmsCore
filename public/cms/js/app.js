'use strict';

var jaztecCms = angular.module('jaztecCms', [
    'jaztecCmsPageService'
]).config(['$routeProvider', function($routeProvider){
    $routeProvider.
        when('/:route', {templateUrl: '/cms/partials/cleared.html', controller: 'PageCtrl'}).
        otherwise({redirectTo: '/home'});
}]);
