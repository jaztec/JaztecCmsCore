'use strict';

/** Directive for loading the section templates */
jaztecCms.directive('sectionPart', function($http, $templateCache, $compile, $parse) {
    return {
        restrict: 'A',
        link: function linkFn(scope, lElement, attrs) {
            // Get the right template with this section.
            scope.$watch(attrs, function() {
                var part = '/cms/partials/sections/' + attrs.sectionPart.toLowerCase() + '.html';
                // Set the id in the component
                scope.sectionId = attrs.sectionId;
                $http.get(part, {cache: $templateCache}).then(function(html){
                    lElement.replaceWith($compile(html.data)(scope));
                });
            });
        }
    }
});

/** Directive for loading article templates */
jaztecCms.directive('articlePlaceholder', function($http, $templateCache, $compile, $parse) {
    return {
        restrict: 'A',
        link: function linkFn(scope, lElement, attrs) {
            // Get the right template for this article.
            scope.$watch(attrs, function() {
                var t = '/cms/partials/articles/' + attrs.articlePlaceholder.toLowerCase() + '.html';
                $http.get(t, {cache: $templateCache}).then(function(html){
                    lElement.replaceWith($compile(html.data)(scope));
                });
            });
        }
    }
});
