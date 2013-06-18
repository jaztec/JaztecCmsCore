'use strict';

jaztecCms.directive('sectionPart', function($http, $templateCache, $compile, $parse) {
    return {
        restrict: 'A',
        link: function linkFn(scope, lElement, attrs) {
            // Get the right template with this section.
            scope.$watch(attrs, function(sectionPart) {
                var part = '/cms/partials/sections/' + attrs.sectionPart.toLowerCase() + '.html';
                console.log(part);
                $http.get(part, {cache: $templateCache}).then(function(html){
                    lElement.replaceWith($compile(html.data)(scope));
                });
            });
        }
    }
});