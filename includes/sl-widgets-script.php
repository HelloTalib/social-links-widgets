<?php
class lsWidgetsScript
{
    public function __construct()
    {
        $this->version = time();
        add_action('plugins_loaded', [$this, 'load_textdomain']);
        add_action('wp_enqueue_scripts', [$this, 'load_lsWidgetsScript_assets']);
        add_action('widgets_init', [$this, 'regsiter_sl_widgets']);

    }
    public function load_textdomain()
    {
        load_plugin_textdomain('ls-widgets', false, plugin_dir_path(__FILE__) . '/languages');
    }
    public function load_lsWidgetsScript_assets()
    {
        wp_enqueue_style('ls-widgets-style', PUBLIC_DIR . '/css/style.css', null, $this->version);
        wp_enqueue_script('ls-widgets-script', PUBLIC_DIR . '/js/main.js', ['jquery'], $this->version, true);
    }
    public function regsiter_sl_widgets()
    {
        register_widget('sl_widgets');
    }
}
new lsWidgetsScript();
