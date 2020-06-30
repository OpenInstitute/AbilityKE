<?php
/*
Plugin Name: Elfsight YouTube Gallery CC
Description: Increase visitor engagement with stylish YouTube video gallery on your website
Plugin URI: https://elfsight.com/youtube-channel-plugin-yottie/wordpress/?utm_source=markets&utm_medium=codecanyon&utm_campaign=youtube-gallery&utm_content=plugin-site
Version: 3.0.1
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=markets&utm_medium=codecanyon&utm_campaign=youtube-gallery&utm_content=plugins-list
*/

if (!defined('ABSPATH')) exit;


require_once('core/elfsight-plugin.php');
require_once('includes/activation.php');

$elfsight_youtube_gallery_config_path = plugin_dir_path(__FILE__) . 'config.json';
$elfsight_youtube_gallery_config = json_decode(file_get_contents($elfsight_youtube_gallery_config_path), true);

register_activation_hook(__FILE__, 'elfsight_youtube_gallery_activation');


$elfsightYoutubeGallery = new ElfsightYoutubeGalleryPlugin(array(
        'name' => 'YouTube Gallery',
        'description' => 'Increase visitor engagement with stylish YouTube video gallery on your website',
        'slug' => 'elfsight-youtube-gallery',
        'version' => '3.0.1',
        'text_domain' => 'elfsight-youtube-gallery',
        'editor_settings' => $elfsight_youtube_gallery_config['settings'],
        'editor_preferences' => $elfsight_youtube_gallery_config['preferences'],
        'script_url' => plugins_url('assets/elfsight-youtube-gallery.js', __FILE__),

        'plugin_name' => 'Elfsight YouTube Gallery',
        'plugin_file' => __FILE__,
        'plugin_slug' => plugin_basename(__FILE__),

        'vc_icon' => plugins_url('assets/img/vc-icon.png', __FILE__),

        'menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),
        'update_url' => 'https://a.elfsight.com/updates/v1/',

        'preview_url' => plugins_url('preview/index.html', __FILE__),
        'observer_url' => plugins_url('preview/youtube-gallery-observer.js', __FILE__),

        'product_url' => 'https://codecanyon.net/item/youtube-plugin-wordpress-gallery-for-youtube/14115701?ref=Elfsight',
        'support_url' => 'https://elfsight.ticksy.com/submit/#100003623',
    )
);

add_shortcode('yottie', array($elfsightYoutubeGallery, 'addShortcode'))

?>