'use strict';

function PageCtrl($scope, $http, $route, $routeParams, $compile, Page)
{
    var url;
    if (undefined != $routeParams.route) {
        url = $routeParams.route.split('/')[0];
    } else {
        url = 'home'
    }
    $scope.page = Page.get({url: url}, function(page){
        $route.current.templateUrl = '/cms/partials/pages/' + page.PageTypeDescription.toLowerCase() + '.html';

        $http.get($route.current.templateUrl).then(function(msg){
            $('#views').html($compile(msg.data)($scope));
        });
    });
}
