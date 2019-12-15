<?php
/**
* Plugin Name: My Plugin Test
* Plugin URI: http://www.mywebsite.com/my-plugin
* Description: The best plugin in the world. Void.
* Version: 1.0
* Author: Me the Graceful
* Author URI: http://www.mywebsite.com
*/

include dirname(__FILE__)."./mypluginscript.php";

function mp_getHTMLFromFile ($relPath) {
	ob_start();
	include dirname(__FILE__).$relPath;
	$ret = ob_get_contents();
	ob_end_clean();
	return $ret;
}


function my_thank_you_text ( $content ) {
	return $content .= '<p>Thank you for reading this shitty post ! :)</p>';
}


function my_shortcode_text ( $content ) {
	return mp_getHTMLFromFile('/myplugin_view.php');
}

wp_register_script('mp-vuejs', "https://cdn.jsdelivr.net/npm/vue/dist/vue.js");
wp_register_script('mp-script', plugin_dir_url(__FILE__ )."resources/js/myplugin.js", array('mp-vuejs'), false, true);
add_action( 'the_content', 'my_thank_you_text' );
add_shortcode('__SHORTCODE__', 'my_shortcode_text');
wp_enqueue_script('mp-vuejs');
wp_enqueue_script('mp-script');
?>