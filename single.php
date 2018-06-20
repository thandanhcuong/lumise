<?php
/**
 * (c) king-theme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$lumise_theme = lumise_theme::globe();

get_header();

?>

	<?php
		if ( isset( $kctheme->cfg['blog_breadcrumb'] ) && $kctheme->cfg['blog_breadcrumb']['_file_'] != '') {
			lumise_incl_core( $lumise_theme->cfg['blog_breadcrumb'] );
		} else {
			lumise_theme::path( 'breadcrumb' );
		}
	?>

	<div id="main-pages">
		<div class="container">
			<div class="row">
				<div class="col-md-9 content_left blog-single-post">
					<div class="main-content single-post">

						<?php while ( have_posts() ) : the_post(); ?>

							<div <?php post_class(); ?>>

								<div class="entry-header">
									<?php

										global $more,$post;

										if( !isset($lumise_theme->cfg['excerptImage']) ){
											$lumise_theme->cfg['excerptImage'] = 1;
										}

										if( $lumise_theme->cfg['excerptImage'] == 1 && !is_page() && !is_single() )
										{

											$img = $lumise_theme->get_featured_image( $post, true );
											if( strpos( $img , 'default.') === false && $img != null  && !is_single() )
											{
												if( strpos( $img , 'youtube') !== false )
												{
													echo '<div class="video_frame">';
													echo '<ifr'.'ame src="'.$img.'"></ifra'.'me>';
													echo '</div>';

												} else {

													echo '<div class="imgframe animated fadeInUp">';
														if( $more == false )
															echo '<a title="Continue read: '.get_the_title().'" href="'.get_permalink(get_the_ID()).'">';
																echo '<img alt="'.get_the_title().'" class="featured-image" src="'.$img.'" />';
														if( $more == false )
															echo '</a>';
													echo '</div>';

												}
											}

										}

										if( $lumise_theme->cfg['excerptImage'] == 1 && is_single() ){

											$img = $lumise_theme->get_featured_image( $post, false );

											if( strpos( $img , 'default.') === false && $img != null )
											{
												if( $more == false ){
													echo '<a title="Continue read: '.get_the_title().'" href="'.get_permalink(get_the_ID()).'">';
												}
														echo '<img alt="'.get_the_title().'" class="featured-image animated eff-fadeInUp" src="'.$img.'" />';
												if( $more == false ){
													echo '</a>';
												}
											}
										}

									?>

									<?php if ( is_sticky() ) : ?>
										<h3 class="entry-format">
												<?php esc_html_e( 'Featured', 'lumise' ); ?>
										</h3>
									<?php endif; ?>

								</div>

								<div class="entry-content">

										<?php if ( !empty( $lumise_theme->cfg['showMeta'] ) && $lumise_theme->cfg['showMeta'] ==1 ): ?>
											<?php if ( !empty( $lumise_theme->cfg['showDateMeta'] ) && $lumise_theme->cfg['showDateMeta'] == 1 ): ?>

												<div class="box-date">
													<span>.<?php echo get_the_date('d'); ?></span>
													<em><?php echo get_the_date('M'); ?></em>
												</div>

											<?php endif ?>
										<?php endif ?>

										<div class="title animated ext-fadeInUp">
											<h2><?php the_title(); ?></h2>

											<?php if ( !empty( $lumise_theme->cfg['showMeta'] ) && $lumise_theme->cfg['showMeta'] ==1 ): ?>
												<ul class="post-meta">

													<?php if ( !empty( $lumise_theme->cfg['showAuthorMeta'] ) && $lumise_theme->cfg['showAuthorMeta'] == 1 ): ?>
														<li><?php echo esc_html__( 'Written by:', 'lumise' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></li>
													<?php endif ?>

													<?php if ( !empty( $lumise_theme->cfg['showCommentsMeta'] ) && $lumise_theme->cfg['showCommentsMeta'] == 1 ): ?>
														<li><a href="<?php comments_link(); ?>"><?php echo get_comments_number( $post->ID ); ?></a> <?php echo esc_html__( 'Comments', 'lumise' ); ?></li>
													<?php endif ?>

													<?php if ( !empty( $lumise_theme->cfg['showShareBox'] ) && $lumise_theme->cfg['showShareBox'] == 1 ): ?>
														<li class="single-post-share">
															<a href="#"><?php echo esc_html__( 'Share', 'lumise' ); ?></a>
															<?php if( !empty($lumise_theme->cfg['showShareBox']) && $lumise_theme->cfg['showShareBox'] == 1 ){ ?>
																<?php $escaped_link = get_the_permalink(); ?>

																<ul>
																	<?php if( $lumise_theme->cfg['showShareFacebook'] == 1 ){ ?>
																		<li>
																			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $escaped_link ); ?>">
																				&nbsp;<i class="fab-facebook-f"></i>&nbsp;
																			</a>
																		</li>
																	<?php } ?>
																	<?php if( $lumise_theme->cfg['showShareTwitter'] == 1 ){ ?>
																		<li>
																			<a href="https://twitter.com/home?status=<?php echo esc_url( $escaped_link ); ?>">
																				<i class="fab-twitter"></i>
																			</a>
																		</li>
																	<?php } ?>
																	<?php if( $lumise_theme->cfg['showShareGoogle'] == 1 ){ ?>
																		<li>
																			<a href="https://plus.google.com/share?url=<?php echo esc_url( $escaped_link ); ?>">
																				<i class="fab-google-plus-g"></i>
																			</a>
																		</li>
																	<?php } ?>
																	<?php if( $lumise_theme->cfg['showSharePinterest'] == 1 ){ ?>
																		<li>
																			<a href="https://pinterest.com/pin/create/button/?url=&amp;media=&amp;description=<?php echo esc_url( $escaped_link ); ?>">
																				<i class="fab-pinterest"></i>
																			</a>
																		</li>
																	<?php } ?>
																	<?php if( $lumise_theme->cfg['showShareLinkedin'] == 1 ){ ?>
																		<li>
																			<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=&amp;title=&amp;summary=&amp;source=<?php echo esc_url( $escaped_link ); ?>">
																				<i class="fab-linkedin"></i>
																			</a>
																		</li>
																	<?php } ?>
																</ul>

															<?php } ?>
														</li>
													<?php endif ?>

													<?php if( !empty( $lumise_theme->cfg['showCateMeta'] ) && $lumise_theme->cfg['showCateMeta'] == 1 && has_category() ) :  ?>
														<li><?php the_category(', '); ?></li>
													<?php endif; ?>
												</ul>
											<?php endif ?>

										</div>


									<div class="desc">

										<?php
											if( ( get_option('rss_use_excerpt') == 1 || is_search() ) && !is_single() && !is_page() ){

												the_excerpt();
												echo '<a href="'.get_the_permalink().'">'.esc_html__('Read More &#187;','lumise').'</a>';

											} else {
												the_content( esc_html__( 'Read More &#187;', 'lumise' ) );
											}

											wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__( 'Pages:', 'lumise' ) . '</span>', 'after' => '</div>' ) );
										?>

									</div>

									<?php if ( !empty( $lumise_theme->cfg['showMeta'] ) && $lumise_theme->cfg['showMeta'] ==1 ): ?>
										<?php if ( !empty( $lumise_theme->cfg['showTagsMeta'] ) && $lumise_theme->cfg['showTagsMeta'] ): ?>
											<?php
											$posttags = get_the_tags();
											if ($posttags) {
											?>
											<div class="post-tag">
												<h4><?php echo esc_html__( 'Tags', 'lumise' ); ?></h4>
												<?php
													
													$tag_val = array();
													foreach($posttags as $tag) {
														$tag_link = get_tag_link( $tag->term_id );
														$tag_val[] = '<a href="'.$tag_link.'">'.$tag->name.'</a>';
													}

													echo implode(' ', $tag_val);
												?>
											</div>
											<?php } ?>
										<?php endif ?>
									<?php endif ?>

								</div>

							</div>

							<?php if( !empty($lumise_theme->cfg['navArticle']) && $lumise_theme->cfg['navArticle'] == 1 ): ?>

								<nav id="nav-single">
									<span class="nav-previous"><?php previous_post_link( '%link', '<span class="fa fa-angle-double-left"></span> ' . esc_html__( 'Previous Article', 'lumise' ) ); ?></span>
									<span class="nav-next"><?php next_post_link( '%link', esc_html__( 'Next Article', 'lumise' ) . ' <span class="fa fa-angle-double-right"></span>' ); ?></span>
								</nav><!-- #nav-single -->

							<?php endif; ?>
							<?php
								$author_desc = get_the_author_meta( 'description' );
							?>
							<?php if (!empty($lumise_theme->cfg['archiveAboutAuthor']) && $lumise_theme->cfg['archiveAboutAuthor'] == 1 && !empty($author_desc)){ ?>

								<!--About author-->
								<div class="about-author">
									<h3 class="author-name"><?php echo get_the_author(); ?></h3>
									<figure>
										<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
									</figure>
									<div class="author-content">
										<p><?php the_author_meta( 'description' ); ?></p>
									</div>
								</div>

							<?php } ?>

							<?php
							if( !empty($lumise_theme->cfg['archiveRelatedPosts']) && $lumise_theme->cfg['archiveRelatedPosts'] == 1 ){
								get_template_part( 'post-related' );
							}

							if( is_single() ){
								comments_template( '', true );
							}

						endwhile; // end of the loop. ?>

					</div>
				</div>

				<div class="col-md-3 right_sidebar">
					<?php get_sidebar( ); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>