<?php

class Mikado_Burst_Call_To_Action extends WP_Widget {
    public function __construct() {
		parent::__construct(
	 		'mkd_call_to_action_widget', // Base ID
			'Mikado Call To Action', // Name
			array( 'description' => esc_html__( 'Mikado Call to Action Widget', 'burst' ), ) // Args
		);
	}
    
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $content        = '';
        $params         = '';
        $content_key    = 'text';

        //is call to action text set?
        if(array_key_exists($content_key, $instance)) {
            //set shortcode's content and remove it from instance array
            $content = $instance[$content_key];
            unset($instance[$content_key]);
        }

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key = '$value' ";
            }
        }

        //finally call the shortcode
        echo do_shortcode("[no_call_to_action $params]".$content."[/no_call_to_action]"); // XSS OK
	}

 	public function form($instance) {
        
        global $mkd_burst_IconCollections;

        //set widget values
        $type                                       = isset( $instance['type'] ) ? esc_attr( $instance['type'] ) : '';
        $full_width                                 = isset( $instance['full_width'] ) ? esc_attr( $instance['full_width'] ) : '';
        $content_in_grid                            = isset( $instance['content_in_grid'] ) ? esc_attr( $instance['content_in_grid'] ) : '';
        $grid_size                                  = isset( $instance['grid_size'] ) ? esc_attr( $instance['grid_size'] ) : '';
        $icon_pack                                  = isset( $instance['icon_pack'] ) ? esc_attr( $instance['icon_pack'] ) : '';
        $custom_icon                                = isset( $instance['custom_icon'] ) ? esc_attr( $instance['custom_icon'] ) : '';
        $icon_size                                  = isset( $instance['icon_size'] ) ? esc_attr( $instance['icon_size'] ) : '';
        $icon_position                              = isset( $instance['icon_position'] ) ? esc_attr( $instance['icon_position'] ) : '';
        $icon_color                                 = isset( $instance['icon_color'] ) ? esc_attr( $instance['icon_color'] ) : '';
        $text                                       = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : '';
        $text_color                                 = isset( $instance['text_color'] ) ? esc_attr( $instance['text_color'] ) : '';
        $text_size                                  = isset( $instance['text_size'] ) ? esc_attr( $instance['text_size'] ) : '';
        $background_color                           = isset( $instance['background_color'] ) ? esc_attr( $instance['background_color'] ) : '';
        $border_color                               = isset( $instance['border_color'] ) ? esc_attr( $instance['border_color'] ) : '';
        $box_padding                                = isset( $instance['box_padding'] ) ? esc_attr( $instance['box_padding'] ) : '';
        $show_button                                = isset( $instance['show_button'] ) ? esc_attr( $instance['show_button'] ) : '';
        $button_position                            = isset( $instance['button_position'] ) ? esc_attr( $instance['button_position'] ) : '';
        $button_size                                = isset( $instance['button_size'] ) ? esc_attr( $instance['button_size'] ) : '';
        $button_link                                = isset( $instance['button_link'] ) ? esc_attr( $instance['button_link'] ) : '';
        $button_text                                = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';
        $button_target                              = isset( $instance['button_target'] ) ? esc_attr( $instance['button_target'] ) : '';
        $button_text_color                          = isset( $instance['button_text_color'] ) ? esc_attr( $instance['button_text_color'] ) : '';
        $button_hover_text_color                    = isset( $instance['button_hover_text_color'] ) ? esc_attr( $instance['button_hover_text_color'] ) : '';
        $button_background_color                    = isset( $instance['button_background_color'] ) ? esc_attr( $instance['button_background_color'] ) : '';
        $button_hover_background_color              = isset( $instance['button_hover_background_color'] ) ? esc_attr( $instance['button_hover_background_color'] ) : '';
        $button_border_color                        = isset( $instance['button_border_color'] ) ? esc_attr( $instance['button_border_color'] ) : '';
        $button_hover_border_color                  = isset( $instance['button_hover_border_color'] ) ? esc_attr( $instance['button_hover_border_color'] ) : '';
        $button_border_width                        = isset( $instance['button_border_width'] ) ? esc_attr( $instance['button_border_width'] ) : '';
        $border_radius                              = isset( $instance['border_radius'] ) ? esc_attr( $instance['border_radius'] ) : '';

        $icon_options_visible = ($type == 'with_icon') ? true : false;

        //dynamically generate variables based on collection param attribute
        $mkd_icon_fields = $mkd_burst_IconCollections->getShortcodeParams();
        foreach ($mkd_icon_fields as $icon_collection_key => $icon_collection_value ) {
            $$icon_collection_key = isset( $instance[$icon_collection_key] ) ? esc_attr( $instance[$icon_collection_key] ) : '';
        }

        //dynamically generate dependency data attributes that will be added to icon collections dropdown
        $icon_pack_data_attr_array = array();
        $icon_pack_data_attr_str   = '';

        //do we have icon collections?
        if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) {
            //get param attributes for all icon collections as array
            $icon_collection_param = $mkd_burst_IconCollections->getIconCollectionsParams();

            foreach ($mkd_burst_IconCollections->iconCollections as $icon_collection_key => $icon_collection_obj) {
                $icon_pack_data_attr_array['data-show-'.$icon_collection_key] = '#'.$this->get_field_id($icon_collection_obj->param).'-container';
                $icon_pack_data_attr_array['data-hide-'.$icon_collection_key] = '';

                //generate data-hide attribute. It needs to have all icon collections ids except current one
                foreach ($icon_collection_param as $collection_param) {
                    if($collection_param !== $icon_collection_obj->param) {
                        $icon_pack_data_attr_array['data-hide-'.$icon_collection_key] .= '#'.$this->get_field_id($collection_param).'-container,';
                    }
                }

                $icon_pack_data_attr_array['data-hide-'.$icon_collection_key] = rtrim($icon_pack_data_attr_array['data-hide-'.$icon_collection_key], ',');
            }

        }

        //generate data array as a string so we can append it in html
        if(is_array($icon_pack_data_attr_array) && count($icon_pack_data_attr_array)) {
            foreach ($icon_pack_data_attr_array as $pack_data_key => $pack_data_val) {
                $icon_pack_data_attr_str .= $pack_data_key.'="'.$pack_data_val.'" ';
            }
        }
        
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'full_width' )); ?>"><?php esc_html_e( 'Full Width:','burst'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'full_width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'full_width' )); ?>">
                <option value="yes" <?php if(esc_attr($full_width) == "yes"){echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'burst') ?></option>
                <option value="no" <?php if(esc_attr($full_width) == "no"){echo 'selected="selected"';} ?>><?php esc_html_e('No', 'burst') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'content_in_grid' )); ?>"><?php esc_html_e( 'Content In Grid:','burst'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'content_in_grid' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'content_in_grid' )); ?>">
                <option value="yes" <?php if(esc_attr($content_in_grid) == "yes"){echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'burst') ?></option>
                <option value="no" <?php if(esc_attr($content_in_grid) == "no"){echo 'selected="selected"';} ?>><?php esc_html_e('No', 'burst') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'grid_size' )); ?>"><?php esc_html_e( 'Grid Size:','burst'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'grid_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'grid_size' )); ?>">
                <option value="75" <?php if(esc_attr($grid_size) == "75"){echo 'selected="selected"';} ?>><?php esc_html_e('75/25', 'burst') ?></option>
                <option value="50" <?php if(esc_attr($grid_size) == "50"){echo 'selected="selected"';} ?>><?php esc_html_e('50/50', 'burst') ?></option>
                <option value="66" <?php if(esc_attr($grid_size) == "66"){echo 'selected="selected"';} ?>><?php esc_html_e('66', 'burst') ?></option>
            </select>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'type' )); ?>"><?php esc_html_e( 'Type:','burst'); ?></label>
            <select class="dependence" data-hide-with_icon="#<?php echo esc_attr($this->get_field_id('custom_icon')); ?>-container" data-show-with_icon="#<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>-container, #<?php echo esc_attr($this->get_field_id('icon_size')); ?>-container" data-hide-normal="#<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>-container,#<?php echo esc_attr($this->get_field_id('icon_size')); ?>-container, #<?php echo esc_attr($this->get_field_id('custom_icon')); ?>-container" data-show-with_custom_icon="#<?php echo esc_attr($this->get_field_id('icon_size')); ?>-container,#<?php echo esc_attr($this->get_field_id('custom_icon')); ?>-container" data-hide-with_custom_icon="#<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>-container" id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>">
                <option value="normal" ><?php esc_html_e('Normal', 'burst') ?></option>
                <option value="with_icon" <?php if(esc_attr($type) == "with_icon"){echo 'selected="selected"';} ?>><?php esc_html_e('With Icon', 'burst') ?></option>
                <option value="with_custom_icon" <?php if(esc_attr($type) == "with_custom_icon"){echo 'selected="selected"';} ?>><?php esc_html_e('With Custom Icon', 'burst') ?></option>
            </select>
        </p>
        
        <div style="<?php if(!$icon_options_visible) { echo 'display: none;'; } ?>" id="<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>-container">
            <p>
                <!--ICON PACK-->
                <label for="<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>"><?php esc_html_e( 'Icon Pack:','burst' ) ?></label>
                <select <?php print $icon_pack_data_attr_str; ?> class="dependence" id="<?php echo esc_attr($this->get_field_id( 'icon_pack' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_pack' )); ?>">
                    <?php

                    $icon_collections = $mkd_burst_IconCollections->getIconCollections();

                    foreach ($icon_collections as $key => $value) { ?>

                        <option value="<?php echo esc_attr($key); ?>"  <?php if(esc_attr($icon_pack) == $key){echo 'selected="selected"';} ?>><?php echo esc_html($value); ?></option>

                    <?php } ?>
                </select>
            </p>

            <?php if(is_array($mkd_burst_IconCollections->iconCollections) && count($mkd_burst_IconCollections->iconCollections)) { ?>

                <?php foreach($mkd_burst_IconCollections->iconCollections as $key => $collection) {
                    $icon_pack_visible = ($icon_pack == $key) ? true : false;
                ?>
                    <p id="<?php echo esc_attr($this->get_field_id($collection->param));  ?>-container" style="<?php if(!$icon_pack_visible) { echo 'display: none;'; } ?>">
                        <label for="<?php echo esc_attr($this->get_field_id($collection->param)); ?>"><?php esc_html_e( 'Icon:','burst' ) ?></label>
                        <select class="widefat" name="<?php echo esc_attr($this->get_field_name($collection->param)); ?>" id="<?php echo esc_attr($this->get_field_id($collection->param)); ?>">
                            <?php foreach ($collection->getIconsArray() as $icon_key => $icon_value) { ?>
                                <option <?php if(${$collection->param} == $icon_key) { echo 'selected'; } ?> value="<?php echo esc_attr($icon_key); ?>"><?php echo esc_attr($icon_key); ?></option>
                            <?php }
                            ?>
                        </select>
                    </p>
                <?php } ?>

            <?php } ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'icon_position' )); ?>"><?php esc_html_e( 'Icon Position:','burst'); ?></label>
                <select id="<?php echo esc_attr($this->get_field_id( 'icon_position' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_position' )); ?>">
                    <option value="top" <?php if(esc_attr($icon_position) == "top"){echo 'selected="selected"';} ?>><?php esc_html_e('Default/Top', 'burst') ?></option>
                    <option value="middle" <?php if(esc_attr($icon_position) == "middle"){echo 'selected="selected"';} ?>><?php esc_html_e('Middle', 'burst') ?></option>
                    <option value="bottom" <?php if(esc_attr($icon_position) == "bottom"){echo 'selected="selected"';} ?>><?php esc_html_e('Bottom', 'burst') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'icon_color' )); ?>"><?php esc_html_e( 'Icon Color:','burst' ) ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'icon_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_color' )); ?>" type="text" value="<?php echo esc_attr( $icon_color ); ?>"/>
            </p>
        </div>

        <p style="<?php if($type !== 'with_custom_icon') { echo 'display: none;'; } ?>" id="<?php echo esc_attr($this->get_field_id('custom_icon')); ?>-container">
            <label for="<?php echo esc_attr($this->get_field_id( 'custom_icon' )); ?>"><?php esc_html_e( 'Custom Icon:','burst' ) ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'custom_icon' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_icon' )); ?>" type="text" value="<?php echo esc_attr( $custom_icon ); ?>"/>
        </p>

        <p style="<?php if(!in_array($type, array('with_icon', 'with_custom_icon'))) { echo 'display: none;'; } ?>" id="<?php echo esc_attr($this->get_field_id('icon_size')); ?>-container">
            <label for="<?php echo esc_attr($this->get_field_id( 'icon_size' )); ?>"><?php esc_html_e( 'Icon Size:','burst' ) ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'icon_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_size' )); ?>" type="text" value="<?php echo esc_attr( $icon_size ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'background_color' )); ?>"><?php esc_html_e( 'Background Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'background_color' )); ?>" type="text" value="<?php echo esc_attr( $background_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'border_color' )); ?>"><?php esc_html_e( 'Border Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'border_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'border_color' )); ?>" type="text" value="<?php echo esc_attr( $border_color ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'box_padding' )); ?>"><?php esc_html_e( 'Box padding (top right bottom left) px', 'burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'box_padding' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'box_padding' )); ?>" type="text" value="<?php echo esc_attr( $box_padding ); ?>"/>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'show_button' )); ?>"><?php esc_html_e( 'Show Button:','burst'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'show_button' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_button' )); ?>">
                <option value="yes" <?php if(esc_attr($show_button) == "yes"){echo 'selected="selected"';} ?>><?php esc_html_e('Yes', 'burst') ?></option>
                <option value="no" <?php if(esc_attr($show_button) == "no"){echo 'selected="selected"';} ?>><?php esc_html_e('No', 'burst') ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_position' )); ?>"><?php esc_html_e( 'Button position:','burst'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'button_position' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_position' )); ?>">
                <option value="right" <?php if(esc_attr($button_position) == "right"){echo 'selected="selected"';} ?>><?php esc_html_e('Right', 'burst') ?></option>
                <option value="center" <?php if(esc_attr($button_position) == "center"){echo 'selected="selected"';} ?>><?php esc_html_e('Center', 'burst') ?></option>
                <option value="left" <?php if(esc_attr($button_position) == "left"){echo 'selected="selected"';} ?>><?php esc_html_e('Left', 'burst') ?></option>
            </select>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_size' )); ?>">Button Size</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_size' )); ?>" type="text" value="<?php echo esc_attr( $button_size ); ?>"/>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_text' )); ?>"><?php esc_html_e( 'Button Text:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_text' )); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_link' )); ?>"><?php esc_html_e( 'Button Link:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_link' )); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_target' )); ?>"><?php esc_html_e( 'Button Target:','burst' ); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'button_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_target' )); ?>">
                <option value="_blank" <?php if(esc_attr($button_target) == "_blank"){echo 'selected="selected"';} ?>>Blank</option>
                <option value="_self" <?php if(esc_attr($button_target) == "_self"){echo 'selected="selected"';} ?>>Self</option>
                <option value="_top" <?php if(esc_attr($button_target) == "_top"){echo 'selected="selected"';} ?>>Top</option>
                <option value="_parent" <?php if(esc_attr($button_target) == "_parent"){echo 'selected="selected"';} ?>>Parent</option>
            </select>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_text_color' )); ?>"><?php esc_html_e( 'Button Text Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_text_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_text_color' )); ?>" type="text" value="<?php echo esc_attr( $button_text_color ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_hover_text_color' )); ?>"><?php esc_html_e( 'Button Hover Text Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_hover_text_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_hover_text_color' )); ?>" type="text" value="<?php echo esc_attr( $button_hover_text_color ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_background_color' )); ?>"><?php esc_html_e( 'Button Background Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_background_color' )); ?>" type="text" value="<?php echo esc_attr( $button_background_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_hover_background_color' )); ?>"><?php esc_html_e( 'Button Hover Background Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_hover_background_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_hover_background_color' )); ?>" type="text" value="<?php echo esc_attr( $button_hover_background_color ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_border_color' )); ?>"><?php esc_html_e( 'Button Border Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_border_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_border_color' )); ?>" type="text" value="<?php echo esc_attr( $button_border_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_hover_border_color' )); ?>"><?php esc_html_e( 'Button Hover Border Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_hover_border_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_hover_border_color' )); ?>" type="text" value="<?php echo esc_attr( $button_hover_border_color ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_border_width' )); ?>"><?php esc_html_e( 'Button Border Width', 'burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_border_width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_border_width' )); ?>" type="text" value="<?php echo esc_attr( $button_border_width ); ?>" />
        </p>
        
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'border_radius' )); ?>"><?php esc_html_e( 'Button Radius', 'burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'border_radius' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'border_radius' )); ?>" type="text" value="<?php echo esc_attr( $border_radius ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php esc_html_e( 'Text:','burst'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>" cols="5" rows="5"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'text_color' )); ?>"><?php esc_html_e( 'Text Color:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_color' )); ?>" type="text" value="<?php echo esc_attr( $text_color ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'text_size' )); ?>"><?php esc_html_e( 'Text Size:','burst' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_size' )); ?>" type="text" value="<?php echo esc_attr( $text_size ); ?>" />
        </p>
        
		<?php 
        
	}

	public function update($new_instance, $old_instance) {
        
        global $mkd_burst_IconCollections;
        
		// processes widget options to be saved
        $instance = array();

		$instance['type']                                    = $new_instance['type'];
		$instance['full_width']                              = $new_instance['full_width'];
        $instance['content_in_grid']                         = $new_instance['content_in_grid'];
        $instance['grid_size']                               = $new_instance['grid_size'];
        $instance['icon_pack']                               = $new_instance['icon_pack'];
        $instance['icon_size']                               = $new_instance['icon_size'];
        $instance['icon_position']                           = $new_instance['icon_position'];
        $instance['icon_color']                              = $new_instance['icon_color'];
        $instance['text']                                    = strip_tags($new_instance['text']);
        $instance['text_color']                              = $new_instance['text_color'];
        $instance['text_size']                               = $new_instance['text_size'];
        $instance['background_color']                        = $new_instance['background_color'];
        $instance['border_color']                        	 = $new_instance['border_color'];
        $instance['box_padding']                        	 = $new_instance['box_padding'];
        $instance['show_button']                             = $new_instance['show_button'];
        $instance['button_size']                             = $new_instance['button_size'];
        $instance['button_position']                         = $new_instance['button_position'];
        $instance['button_text']                             = $new_instance['button_text'];
        $instance['button_link']                             = $new_instance['button_link'];
        $instance['button_target']                           = $new_instance['button_target'];
        $instance['button_text_color']                       = $new_instance['button_text_color'];
        $instance['button_hover_text_color']                 = $new_instance['button_hover_text_color'];
        $instance['button_background_color']                 = $new_instance['button_background_color'];
        $instance['button_hover_background_color']           = $new_instance['button_hover_background_color'];
        $instance['button_border_color']                     = $new_instance['button_border_color'];
        $instance['button_hover_border_color']               = $new_instance['button_hover_border_color'];
        $instance['button_border_width']                     = $new_instance['button_border_width'];
        $instance['border_radius']                           = $new_instance['border_radius'];

        $mkd_icon_fields = $mkd_burst_IconCollections->getShortcodeParams();
        
        foreach ($mkd_icon_fields as $icon_collection_key => $icon_collection_value ) {
            
            $instance[$icon_collection_key] = $new_instance[$icon_collection_key];
            
        }
        
		return $instance;
	}
}

function mkd_burst_call_to_action_widget_load(){
	register_widget('Mikado_Burst_Call_To_Action');
}
add_action('widgets_init', 'mkd_burst_call_to_action_widget_load');
