<?php

class sl_widgets extends WP_Widget
{

/**
 * Sets up the widgets name etc
 */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'sl_widgets',
            'description' => 'My Widget is awesome',
        );
        parent::__construct('sl_widgets', 'sl widgets', $widget_ops);
    }

/**
 * Outputs the content of the widget
 *
 * @param array $args
 * @param array $instance
 */
    public function widget($args, $instance)
    {
        // outputs the content of the widget
        $links = array(
            'facebook' => esc_attr($instance['facebook_link']),
            'twitter' => esc_attr($instance['twitter_link']),
            'instagram' => esc_attr($instance['instagram_link']),
        );
        $icons = array(
            'facebook' => esc_attr($instance['facebook_icon']),
            'twitter' => esc_attr($instance['twitter_icon']),
            'instagram' => esc_attr($instance['instagram_icon']),
        );
        $icon_size = esc_attr($instance['icon_size']);
        $title = esc_attr($instance['title']);

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        $this->DisplayForm($links, $icons, $icon_size);
        echo $args['after_widget'];
    }

/**
 * Outputs the options form on admin
 *
 * @param array $instance The widget options
 */
    public function form($instance)
    {
        // outputs the options form on admin

        $this->getForm($instance);
    }

/**
 * Processing widget options on save
 *
 * @param array $new_instance The new options
 * @param array $old_instance The previous options
 *
 * @return array
 */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = array(
            'title' => !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '',

            'facebook_link' => !empty($new_instance['facebook_link']) ? strip_tags($new_instance['facebook_link']) : '',
            'twitter_link' => !empty($new_instance['twitter_link']) ? strip_tags($new_instance['twitter_link']) : '',
            'instagram_link' => !empty($new_instance['instagram_link']) ? strip_tags($new_instance['instagram_link']) : '',

            'facebook_icon' => !empty($new_instance['facebook_icon']) ? strip_tags($new_instance['facebook_icon']) : '',
            'twitter_icon' => !empty($new_instance['twitter_icon']) ? strip_tags($new_instance['twitter_icon']) : '',
            'instagram_icon' => !empty($new_instance['instagram_icon']) ? strip_tags($new_instance['instagram_icon']) : '',
            'icon_size' => !empty($new_instance['icon_size']) ? strip_tags($new_instance['icon_size']) : '',
        );
        return $instance;
    }

/**
 * create widgets form for admin
 *
 * @param array $instance The widget options
 */
    public function getForm($instance)
    {
        // outputs the options form on admin

        // TITLE
        if (isset($instance['title'])) {
            $title = esc_attr($instance['title']);
        } else {
            $title = 'Social Links widgets';
        }

        // URL
        if (isset($instance['facebook_link'])) {
            $facebook_link = esc_attr($instance['facebook_link']);
        } else {
            $facebook_link = 'https://www.facebook.com';
        }
        if (isset($instance['twitter_link'])) {
            $twitter_link = esc_attr($instance['twitter_link']);
        } else {
            $twitter_link = 'https://www.twitter.com';
        }
        if (isset($instance['instagram_link'])) {
            $instagram_link = esc_attr($instance['instagram_link']);
        } else {
            $instagram_link = 'https://www.instagram.com';
        }
        // ICON
        if (isset($instance['facebook_icon'])) {
            $facebook_icon = esc_attr($instance['facebook_icon']);
        } else {
            $facebook_icon = plugins_url() . '/sl-widgets/assets/public/img/facebook.png';
        }
        if (isset($instance['twitter_icon'])) {
            $twitter_icon = esc_attr($instance['twitter_icon']);
        } else {
            $twitter_icon = plugins_url() . '/sl-widgets/assets/public/img/twitter.png';
        }
        if (isset($instance['instagram_icon'])) {
            $instagram_icon = esc_attr($instance['instagram_icon']);
        } else {
            $instagram_icon = plugins_url() . '/sl-widgets/assets/public/img/instagram.png';
        }

        // ICON SIZE
        if (isset($instance['icon_size'])) {
            $icon_size = esc_attr($instance['icon_size']);
        } else {
            $icon_size = '32';
        }
        ?>
    <div class="wrap">
        <div class="social_links_content">

            <div class="title">
            <h3><?php _e('Title', 'domain');?></h3>
                <p>
                    <label for="<?php echo $this->get_field_id("title"); ?>"><?php _e('Title', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
                </p>
            </div>
            <div class="facebook">
                <h3><?php _e('Facebook', 'domain');?></h3>
                <p>
                    <label for="<?php echo $this->get_field_id("facebook_link"); ?>"><?php _e('Facebook url', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_attr($facebook_link); ?>">
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id("facebook_icon"); ?>"><?php _e('Facebook icon', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" value="<?php echo esc_attr($facebook_icon); ?>">
                </p>
            </div>
            <div class="twitter">
                <h3><?php _e('twitter', 'domain');?></h3>
                <p>
                    <label for="<?php echo $this->get_field_id("twitter_link"); ?>"><?php _e('Twitter url', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_attr($twitter_link); ?>">
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id("twitter_icon"); ?>"><?php _e('Twitter url', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" value="<?php echo esc_attr($twitter_icon); ?>">
                </p>
            </div>
            <div class="instagram">
                <h3><?php _e('Instagram', 'domain');?></h3>
                <p>
                    <label for="<?php echo $this->get_field_id("instagram_link"); ?>"><?php _e('Instagram url', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" value="<?php echo esc_attr($instagram_link); ?>">
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id("instagram_icon"); ?>"><?php _e('Instagram Icon', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('instagram_icon'); ?>" name="<?php echo $this->get_field_name('instagram_icon'); ?>" value="<?php echo esc_attr($instagram_icon); ?>">
                </p>
            </div>
            <div class="icon size">
                <h3><?php _e('Icon size, domain');?></h3>
                <p>
                    <label for="<?php echo $this->get_field_id("icon_size"); ?>"><?php _e('Icon size', 'domain');?></label>
                    <input class="widefat" type="text" id="<?php echo $this->get_field_id('icon_size'); ?>" name="<?php echo $this->get_field_name('icon_size'); ?>" value="<?php echo esc_attr($icon_size); ?>">
                </p>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Outputs the content of the widget
 *
 * @param array $links
 * @param array $icons
 * @param array $icon_size
 */
    public function DisplayForm($links, $icons, $icon_size)
    {
        // outputs the content of the widget
        ?>
    <div class="wrap">
    <div class="social-links-content">
    <a href="<?php echo esc_attr($links['facebook']); ?>">
            <img width="<?php echo $icon_size; ?>" src="<?php echo esc_attr($icons['facebook']); ?>" alt="">
        </a>
        <a href="<?php echo esc_attr($links['twitter']); ?>">
            <img width="<?php echo $icon_size; ?>" src="<?php echo esc_attr($icons['twitter']); ?>" alt="">
        </a>
        <a href="<?php echo esc_attr($links['instagram']); ?>">
            <img width="<?php echo $icon_size; ?>" src="<?php echo esc_attr($icons['instagram']); ?>" alt="">
        </a>
    </div>
    </div>
    <?php
}
}