<?php
namespace BdevsElement\Widget;

defined( 'ABSPATH' ) || die();

abstract class BDevs_El_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget categories.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'bdevs-element' ];
    }


    /**
     * Add wrapper class.
     *
     * @return string
     */
    protected function get_custom_wrapper_class() {
        return '';
    }

    /**
     * Overriding default function to add custom html class.
     *
     * @return string
     */
    public function get_html_wrapper_class() {

        $html_class = parent::get_html_wrapper_class();
        $html_class .= ' bdevs-el';
        $html_class .= ' ' . $this->get_name();
        $html_class .= ' ' . $this->get_custom_wrapper_class();

        return rtrim( $html_class );
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {
        $this->register_style_controls();
        $this->register_content_controls();
    }

    /**
     * Register content controls
     *
     * @return void
     */
    abstract protected function register_content_controls();

    /**
     * Register style controls
     *
     * @return void
     */
    abstract protected function register_style_controls();

    /**
     * Fix for 2.6.*
     *
     * In 2.6.0 Elementor removed render_edit_tools method.
     */
    protected function render_edit_tools() {
        
    }

    /**
     * Overriding the parent method
     *
     * Add inline editing attributes.
     *
     * Define specific area in the element to be editable inline. The element can have several areas, with this method
     * you can set the area inside the element that can be edited inline. You can also define the type of toolbar the
     * user will see, whether it will be a basic toolbar or an advanced one.
     *
     * Note: When you use wysiwyg control use the advanced toolbar, with textarea control use the basic toolbar. Text
     * control should not have toolbar.
     *
     * @since 1.8.0
     * @access protected
     *
     * @param string $key     Element key.
     * @param string $toolbar Optional. Toolbar type. Accepted values are `advanced`, `basic` or `none`. Default is `basic`.
     * @param string $setting_key Additional settings key in case $key != $setting_key
     */
    protected function add_inline_editing_attributes( $key, $toolbar = 'basic', $setting_key = '' ) {

        if ( ! \BdevsElement::$elementor_instance->editor->is_edit_mode() ) {
            return;
        }

        if ( empty( $setting_key ) ) {
            $setting_key = $key;
        }

        $this->add_render_attribute( $key, [
            'class' => 'elementor-inline-editing',
            'data-elementor-setting-key' => $setting_key,
        ] );

        if ( 'basic' !== $toolbar ) {
            $this->add_render_attribute( $key, [
                'data-elementor-inline-editing-toolbar' => $toolbar,
            ] );
        }
    }

    /**
     * Add link render attributes.
     *
     * Used to add link tag attributes to a specific HTML element.
     *
     * The HTML link tag is represented by the element parameter. The `url_control` parameter
     * needs to be an array of link settings in the same format they are set by Elementor's URL control.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array|string $element   The HTML element.
     * @param array $url_control      Array of link settings.
     * @param bool $overwrite         Optional. Whether to overwrite existing
     *                                attribute. Default is false, not to overwrite.
     *
     * @return \Elementor\Element_Base instance
     */

    public function add_link_attributes( $element, array $url_control, $overwrite = false ) {
        
        //add_link_attributes is only available form 2.8.0s
        return parent::add_link_attributes( $element, $url_control, $overwrite );
        

        $attributes = [];

        if ( ! empty( $url_control['url'] ) ) {
            $attributes['href'] = $url_control['url'];
        }

        if ( ! empty( $url_control['is_external'] ) ) {
            $attributes['target'] = '_blank';
        }

        if ( ! empty( $url_control['nofollow'] ) ) {
            $attributes['rel'] = 'nofollow';
        }

        if ( ! empty( $url_control['custom_attributes'] ) ) {
            // Custom URL attributes should come as a string of comma-delimited key|value pairs
            $custom_attributes = explode( ',', $url_control['custom_attributes'] );
            $blacklist = [ 'onclick', 'onfocus', 'onblur', 'onchange', 'onresize', 'onmouseover', 'onmouseout', 'onkeydown', 'onkeyup' ];

            foreach ( $custom_attributes as $attribute ) {
                // Trim in case users inserted unwanted spaces
                list( $attr_key, $attr_value ) = explode( '|', $attribute );

                // Cover cases where key/value have spaces both before and/or after the actual value
                $attr_key = trim( $attr_key );
                $attr_value = trim( $attr_value );

                // Implement attribute blacklist
                if ( ! in_array( strtolower( $attr_key ), $blacklist, true ) ) {
                    $attributes[ $attr_key ] = $attr_value;
                }
            }
        }

        if ( $attributes ) {
            $this->add_render_attribute( $element, $attributes, $overwrite );
        }

        return $this;
    }

}


