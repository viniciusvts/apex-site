
$j(document).ready(function() {
    "use strict";

    $j('.price_slider_wrapper').parents('.widget').addClass('widget_price_filter');
    initSelect2();
    initAddToCartPlusMinus();
    initSingleProductImageSlider();
});

$j(window).on('resize', function() {
    calculateProductSliderHeight();
});

function initSelect2() {
    "use strict";
    if ($j('.woocommerce-ordering .orderby').length || $j('#calc_shipping_country').length ) {

        $j('.woocommerce-ordering .orderby').select2({
            minimumResultsForSearch: Infinity
        });

        $j('#calc_shipping_country, .dropdown_product_cat, .dropdown_layered_nav_color, .woocommerce-account .country_select').select2();

    }
}

function initAddToCartPlusMinus(){
 "use strict";
    $j(document).on( 'click', '.quantity .plus, .quantity .minus', function() {

        // Get values
        var $qty        = $j(this).closest('.quantity').find('.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.data( 'max' ) ),
            min         = parseFloat( $qty.data( 'min' ) ),
            step        = $qty.data( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $j( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }
        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
}

function initSingleProductImageSlider() {
    'use strict';

    var slider = $j('#single-product-slider');
    if ( slider.length ) {
        slider.carouFredSel({
            responsive: true,
            items: {
                visible: 1
            },
            scroll      : {
                fx          : "crossfade"
            },
            prev : {
                button : function() {
                    return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.single-product-gallery-prev');
                }
            },
            next : {
                button : function() {
                    return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.single-product-gallery-next');
                }
            },
            pagination  : {
                container       : ".single-product-slider-thumbs",
                anchorBuilder   : false
            },
            onCreate: function() {
                slider.animate({'opacity':1}, '300');

                slider.parents('.single_product_image_wrapper').find('.caroufredsel-direction-nav a').each(function(){
                    var navArrow = $j(this);
                    var navArrowHeight = parseInt(navArrow.height());
                    var thumbHeight = parseInt(slider.parents('.single_product_image_wrapper').find('.thumbnails').outerHeight());

                    var marginTop = (navArrowHeight + thumbHeight)/2;

                    navArrow.css('margin-top', '-' + marginTop + 'px');
                });
            }
        });

    }

    calculateProductSliderHeight();

}

function calculateProductSliderHeight() {
    'use strict';
    var slider = $j('#single-product-slider');

    slider.waitForImages(function(){
        var height = slider.find('img').height();
        slider.parent().css({
            'height' : height
        });
    });
}