<?php
/**
 * The loop that displays posts.
 *
 *
 * @package WordPress
 * @subpackage invictus
 * @since invictus 1.0
 */
global $imgDimensions, $substrExcerpt;

$image_size = 'tablet';

?>

				<ul id="portfolioList" class="clearfix portfolio-list">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<li data-id="id-<?php echo $post->ID ?>" class="item <?php echo max_get_post_lightbox_class() . " "; ?><?php echo $_term_classes . " "; ?><?php if( get_option_max('image_show_fade') != "true") { echo("no-hover"); } ?>">
							<div class="shadow">
							<?php

								// get the gallery item
								max_get_post_custom_image(get_post_thumbnail_id(), false, false, $image_size);

								if( !empty($itemCaption) && $itemCaption === true) {

									// check if caption option is selected
									if ( get_option_max( 'image_show_caption' ) == 'true' || get_option_max( 'image_show_caption' ) == 'always'  ) {

									?>

									<div class="item-caption">
										<strong><?php echo get_the_title() ?></strong><br />
										<?php
										if( get_the_excerpt() != "" && get_option_max('image_caption_excerpt', 'false') == 'false' ) {
											// check the excerpt length and cut it off, if necessary
											$_excerpt = get_the_excerpt();
											echo ( strlen( $_excerpt )  > $substrExcerpt ? substr( $_excerpt , 0, $substrExcerpt - 3 ) . "..." : $_excerpt );
										}
										?>
									</div>

									<?php
									}
								}
							?>
							</div>

						</li>

						<?php endwhile; ?>

						<?php else : ?>

						<h2><?php _e('No Entries found','invictus') ?></h2>

						<?php endif; ?>

					</ul>

					<?php

					/* Display navigation to next/previous pages when applicable */
					if (function_exists("max_pagination")) {

						max_pagination();

					}

					?>