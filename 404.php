<?php
/**
 *#		(c) king-theme.com
 */
get_header();

?>
<div id="primary" class="site-content">
	<div class="container">

		<div class="error-404">

			<div class="desc">
				<h1><?php esc_html_e('404', 'lumise'); ?></h1>
				<span><?php esc_html_e('The page you are looking for is not available or has been removed.', 'lumise'); ?></span>
				<span><?php esc_html_e('Try going to', 'lumise'); ?><em><?php esc_html_e('Home Page', 'lumise'); ?></em><?php esc_html_e(' by using the button below', 'lumise'); ?></span>
			</div>

			<a href="<?php echo LUMISETHEME_SITE_URI; ?>" class="btn-style3"><?php esc_html_e('Home Page', 'lumise'); ?></a>

	    </div>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>