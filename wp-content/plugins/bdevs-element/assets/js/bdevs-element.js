(function ($) {

    var WidgetSliderHerowidthElementorHandler = function ($scope, $) {

        var carousel_elem = $scope.find('.bdevs-element').eq(0);

        if (carousel_elem.length > 0) {

            var settings = carousel_elem.data('slider_options');
            carousel_elem.slick(settings);
        }

    };

    // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/bdevs-elementor.default', WidgetSliderHerowidthElementorHandler);

    });

})(jQuery);
