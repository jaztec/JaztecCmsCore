'use strict';

function PageCtrl($scope, $http, $route, $routeParams, $compile, $rootScope, Page)
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
    console.log($scope.section);
}

function ArticleCtrl($scope)
{
    
}

// Helper function
function findInArray(arr, field, value)
{
//    var obj;

}