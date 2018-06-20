<?php
/**
 * (c) King-Theme.com
 */

global $post, $lumise_theme;

if ( isset( $post->ID ) ) {

	$sidebar = get_post_meta( $post->ID,'_king_page_sidebar' , true );

	if( empty( $sidebar ) ){
		if ( is_single() ) {
			if ( !empty( $lumise_theme->cfg['article_sidebar'] ) ) {
				$sidebar = $lumise_theme->cfg['article_sidebar'];
			} else {
				$sidebar = 'sidebar';
			}
		} elseif ( is_archive() || is_author() || is_category() || is_front_page() || is_home() || is_search() || is_tag() || is_tax() ) {
			if ( !empty( $lumise_theme->cfg['blog_sidebar'] ) ) {
				$sidebar = $lumise_theme->cfg['blog_sidebar'];
			} else {
				$sidebar = 'sidebar';
			}
		} else {
			$sidebar = 'sidebar';
		}
	}

} else {
	$sidebar = 'sidebar';
}

?>

<?php if ( is_active_sidebar( $sidebar ) ) : ?>
	<?php if ( $sidebar == 'sidebar' ): ?>
		<div id="sidebar" class="widget-area king-sidebar">
			<?php dynamic_sidebar( $sidebar ); ?>
		</div>
	<?php else: ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( $sidebar ); ?>
		</div><!-- #secondary -->
	<?php endif ?>
<?php endif; ?>