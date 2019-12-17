<?php
/**
* Plugin Name: Service Funeraire de Paris - Prise de RDV
* Plugin URI: http://www.mywebsite.com/my-plugin
* Description: Plugin pour la prise de RDV - Service Funeraire de Paris
* Version: 1.0
* Author: Me the Graceful
* Author URI: http://www.mywebsite.com
*/

function sfrdv_getHTMLFromFile ($relPath) {
	ob_start();
	include dirname(__FILE__).$relPath;
	$ret = ob_get_contents();
	ob_end_clean();
	return $ret;
}


function my_thank_you_text ( $content ) {
	return $content .= '<p>Thank you for reading this shittty post ! :)</p>';
}


function shortcode_content ( $content ) {
	return sfrdv_getHTMLFromFile('/sfrdv_view.php');
}

wp_register_script('vuejs', "https://cdn.jsdelivr.net/npm/vue/dist/vue.js");
wp_register_script('sfrdv-vuejscalendar', "https://unpkg.com/vuejs-datepicker");
wp_register_script('sfrdv-vuecalendarfr', "https://unpkg.com/vuejs-datepicker/dist/locale/translations/fr.js");
wp_register_script('sfrdv-script', plugin_dir_url(__FILE__ )."resources/js/sfrdv.js", array('vuejs', 'sfrdv-vuejscalendar', 'sfrdv-vuecalendarfr'), false, true);
add_action( 'the_content', 'my_thank_you_text' );
add_shortcode('__SHORTCODE__', 'shortcode_content');
wp_enqueue_script('vuejs');
wp_enqueue_script('sfrdv-vuejscalendar');
wp_enqueue_script('sfrdv-vuecalendarfr');
wp_enqueue_script('sfrdv-script');
?>