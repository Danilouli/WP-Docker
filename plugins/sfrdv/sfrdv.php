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

function add_modal_code() {
	echo '
		<div v-if="shown" v-bind:style="styleObject" class="sfrdv-reset" id="sfrdv-modalcontainer">
			<div id="sfrdv-modal" v-html="rawContent">
			</div>
		</div>
	';
}

function sfrdvlog($content, $variable = false, $option = 'log') {
	if ($variable)
		echo '<script>console["'.$option.'"]('.$content.')</script>';
	else {
		echo sprintf('<script>console["%s"]("%s")</script>', $option, $content);
		// echo '<script>console["'.$option.'"]("'.$content.'")</script>';
	}
}

function sfrdv_main() {
	$page_object = get_queried_object();
	$page_name = $page_object->post_name;
	$page_id = get_queried_object_id();
	if ($page_name == 'sample-page') {
		sfrdvlog("SFRDV Plugin - Will load");
		add_action('wp_body_open', 'add_modal_code');
		add_action( 'the_content', 'my_thank_you_text' );
		add_shortcode('__SHORTCODE__', 'shortcode_content');
		wp_register_script('vuejs', plugin_dir_url(__FILE__ )."resources/js/vue.js");
		wp_register_script('sfrdv-vuejscalendar', plugin_dir_url(__FILE__ )."resources/js/vuejs-datepicker.js");
		wp_register_script('sfrdv-vuecalendarfr', plugin_dir_url(__FILE__ )."resources/js/datefr.js");
		wp_register_script('sfrdv-script', plugin_dir_url(__FILE__ )."resources/js/sfrdv.js", array('vuejs', 'sfrdv-vuejscalendar', 'sfrdv-vuecalendarfr'), false, true);
		wp_enqueue_script('vuejs');
		wp_enqueue_script('sfrdv-vuejscalendar');
		wp_enqueue_script('sfrdv-vuecalendarfr');
		wp_enqueue_script('sfrdv-script');
		sfrdvlog("SFRDV Plugin - Loaded");
	}
}
add_action('template_redirect', 'sfrdv_main' );
?>