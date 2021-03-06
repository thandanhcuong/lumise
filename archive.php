<?php
/**
 * (c) king-theme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$lumise_theme = lumise_theme::globe();

get_header();

?>

	<?php lumise_theme::path( 'breadcrumb' ); ?>

	<div id="main-pages" class="archive-posts-pages">
		<div class="container">
			<div class="row">
				<div class="col-md-9 content_left">
					<div class="main-content">

						<?php

							if ( have_posts() ) :
								while ( have_posts() ) : the_post();

									get_template_part( 'content' );

								endwhile;

								$lumise_theme->pagination();

							else :
						?>

							<article id="post-0" class="post no-results not-found">
								<header class="entry-header">
									<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'lumise' ); ?></h1>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<p><?php esc_html_e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'lumise' ); ?></p>
									<?php get_search_form(); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-0 -->

						<?php endif; ?>

					</div>
				</div>

				<div class="col-md-3 right_sidebar">
					<?php get_sidebar( ); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>