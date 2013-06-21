'use strict';

function PageCtrl($scope, $http, $route, $routeParams, $compile, $rootScope, Page)
{
    var url;
    if (undefined != $routeParams.route) {
        url = $routeParams.route.split('/')[0];
    } else {
        url = 'home'
    }
    // Guards
    if (url == '' || url == undefined) {
        return false;
    }
    $scope.page = Page.get({url: url}, function(page){
        if (page.PageTypeDescription == undefined) {
            return false;
        }
        $route.current.templateUrl = '/cms/partials/pages/' + page.PageTypeDescription.toLowerCase() + '.html';

        $http.get($route.current.templateUrl).then(function(msg){
            $('#views').html($compile(msg.data)($scope));
        });
        // Set the main app's page variabel.
        $rootScope.page = $scope.page;
    });
}

function SectionCtrl($scope)
{
    // We want the current section to be in the scope.
    $.each($scope.page.sections, function(k,v){
        if (v['SectionID'] == $scope.sectionId) {
            $scope.section = v;
        }
    });
}

function ArticleCtrl($scope)
{
    
}
