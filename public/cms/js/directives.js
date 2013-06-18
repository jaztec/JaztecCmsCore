'use strict';

jaztecCms.directive('sectionPart', function($parse) {
    return {
        restrict: 'A',
        transclude: true,
        link: function linkFn(scope, lElement, attrs) {
            console.log(scope, lElement, attrs);
        }
    }
});