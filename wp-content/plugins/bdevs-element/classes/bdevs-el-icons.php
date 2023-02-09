<?php
namespace BdevsElement;

defined( 'ABSPATH' ) || die();

class BDevs_El_Icons {

      public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_bdevs_el_icons_tab' ] );
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_bdevs_el_regular_icons_tab' ] );
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_bdevs_el_flat_icons_tab' ] );
      }

      public static function add_bdevs_el_icons_tab( $tabs ) {
        $tabs['bdevs-element-icons'] = [
            'name' => 'bdevs-element-icons',
            'label' => __( 'Fontawesome Pro Light', 'bdevs-element' ),
            'url' => BDEVSEL_ASSETS . 'fonts/css/fontawesome.pro.min.css',
            'enqueue' => [ BDEVSEL_ASSETS . 'fonts/css/fontawesome.pro.min.css' ],
            'prefix' => 'fa-',
            'displayPrefix' => 'fal',
            'labelIcon' => 'fas fa-icons',
            'ver' => BDEVSEL_VERSION,
            'fetchJson' => BDEVSEL_ASSETS . 'fonts/bdevs-element-icons.js?v=' . BDEVSEL_VERSION,
            'native' => false,
        ];
        return $tabs;
      }

      public static function add_bdevs_el_regular_icons_tab( $tabs ) {

        $tabs['bdevs-el-regular-icons'] = [
            'name' => 'bdevs-el-regular-icons',
            'label' => __( 'Fontawesome Pro Regular', 'bdevs-element' ),
            'url' => BDEVSEL_ASSETS . 'fonts/css/fontawesome.pro.min.css',
            'enqueue' => [ BDEVSEL_ASSETS . 'fonts/css/fontawesome.pro.min.css' ],
            'prefix' => 'fa-',
            'displayPrefix' => 'far',
            'labelIcon' => 'fas fa-icons',
            'ver' => BDEVSEL_VERSION,
            'fetchJson' => BDEVSEL_ASSETS . 'fonts/bdevs-element-regular-icons.js?v=' . BDEVSEL_VERSION,
            'native' => false,
        ];

        return $tabs;
      }

      public static function add_bdevs_el_flat_icons_tab( $tabs ) {
        $tabs['bdevs-element-flaticons'] = [
            'name' => 'bdevs-element-flat-icons',
            'label' => __( 'FlatIcons', 'bdevs-element' ),
            'url' => BDEVSEL_ASSETS . 'fonts/css/flaticon.css',
            'enqueue' => [ BDEVSEL_ASSETS . 'fonts/css/flaticon.css' ],
            'prefix' => '',
            'displayPrefix' => '',
            'labelIcon' => 'flaticon-business-and-finance-1',
            'ver' => BDEVSEL_VERSION,
            'fetchJson' => BDEVSEL_ASSETS . 'fonts/bdevs-element-flaticons.js?v=' . BDEVSEL_VERSION,
            'native' => false,
        ];
        return $tabs;
      }

}