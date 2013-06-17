'use strict';

function PageCtrl($scope, $http, $route, $routeParams, $compile, Page)
{
    var url = $routeParams.route.split('/')[0];
    console.log(url);
    $scope.page = Page.get({url: url});
    
}
