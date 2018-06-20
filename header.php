<?php
/**
 *
 * (c) king-theme.com
 *
 * The Header of theme.
 *
 */


$lumise_theme = lumise_theme::globe();
$post = lumise_theme::globe('post');

$post_data = lumise_post_meta_options();

$m_class = array( 'site_wrapper' );
if ( isset($lumise_theme->cfg['layout']) ) {
	$m_class[] = 'layout-' . $lumise_theme->cfg['layout'];
}

?>
<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head><?php wp_head(); ?></head>
<body <?php body_class(); ?> <?php body_style(); ?>>
	<div id="main" class="<?php echo esc_attr( implode( " ", $m_class ) ); ?>">

		<?php

			/**
			* Load header path, change header via theme panel, files location themes/lumisetheme/templates/header/
			*
			include 'core/style-selector.php';*/
			lumise_theme::path( 'header' );

		?>