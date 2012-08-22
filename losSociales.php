<?php
/*
  Plugin Name: losSociales
  Plugin URI: https://github.com/jdgarrido/losSociales
  Description: Plugin con los 3 más importantes botones sociales (Google Plus, Facebook, Twitter)
  Author: Jose Damian Garrido
  Version: 1.0
  Author URI: http://www.josegarrido.net
  License: Copyleft
 */

function losSociales_configuracion() {
    global $wpdb;

    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    if ($_POST['losSociales_update']) {
        ( $_POST[elTwitter] ) ? update_option('elTwitter', 1) : update_option('elTwitter', 0);
        ( $_POST[elFacebook] ) ? update_option('elFacebook', 1) : update_option('elFacebook', 0);
        ( $_POST[elGooglePlus] ) ? update_option('elGooglePlus', 1) : update_option('elGooglePlus', 0);
    }

    include "losSociales-form-config.php";
}

function losSociales_admin_action() {
    add_plugins_page("Los Sociales :)", "Configuración losSociales", 1, "losSociales", "losSociales_configuracion");
}

add_action('admin_menu', 'losSociales_admin_action');

function losSociales_content($content) {

    $elContenido = $content;

    $url_plugin = plugins_url('losSociales');
    $elCss = $url_plugin . '/losSociales.css';

    $laURLArticulo = urlencode(get_permalink());

    $elTwitter = '<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-size="large">Twittear</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';

    $elPlus = '<div class="g-plusone" data-annotation="none"></div><script type="text/javascript">  window.___gcfg = {lang: \'es\'}; (function() { var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true; po.src = \'https://apis.google.com/js/plusone.js\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s); })();</script>';

    $elFacebook = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . $laURLArticulo . '" scrolling="no" frameborder="0" style="border:none; width:210px; height:30px"></iframe>';

    $losBotones = '';
    if (get_option('elGooglePlus') || get_option('elFacebook') || get_option('elTwitter')) {
        $losBotones .= (get_option('elGooglePlus')) ? '<li>' . $elPlus . '</li>' : '';
        $losBotones .= (get_option('elFacebook')) ? '<li>' . $elFacebook . '</li>' : '';
        $losBotones .= (get_option('elTwitter')) ? '<li>' . $elTwitter . '</li>' : '';
    }

    $elContenedor = '
	<link rel="stylesheet" href="' . $elCss . '?ver=1.0" type="text/css" media="all" />
	
	<div class="losSociales">
		<ul>
                    ' . $losBotones . '
		</ul>
		<div class="clear"></div>
	</div>';

    if (is_page()) //se muestra en las páginas
        return $elContenido = $elContenedor . $content;

    if (is_single()) //se muestra en los post
        return $elContenido = $elContenedor . $content;

    return $content;
}

add_filter('the_content', 'losSociales_content');
?>
