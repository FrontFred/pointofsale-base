<?php /* Template Name: Custom Front Page */ ?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package erply
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<section class="section">
			<div class="section-container" id="top-banner">
                <div class="heading-container container">
                    <div class="row">
                        <div class="col-md-3 col-sm-1"></div>
                        <div class="col-md-6 col-sm-10"><h1><?php the_field("banner_image_heading")?></h1></div>
                        <div class="col-md-3 col-sm-1"></div>
                    </div>
                </div>
			</div>
		</section>
		<section class="section">
			<div class="section-container" id="video-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12 erply-desc">
							<h2><?php the_field("video_banner_header")?></h2>
							<p><?php the_field("video_banner_sub-header")?></p>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12 example-image">
                            <div class="ipad-frame"></div>
							<img src="<?php echo get_template_directory_uri(); ?>/img/ipad_frame_fin.png" alt="ipad_image">
							<div class="erply-link">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12 link-container">
										<!--<a href="#" class="link-with-icon">Watch video of Erply in use</a>-->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container details-section">
				<div class="row">
					<div class="col-md-2 col-sm-12 platform-icons">
						<h3>ERPLY toimii kaikilla eniten käytetyillä alustoilla</h3>
						<ul class="platforms-list unstyled">
							<li><img src="<?php echo get_template_directory_uri(); ?>/img/windows_icon.png" alt="windows"/></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/img/apple_icon.png" alt="apple"/></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/img/android_icon.png" alt="android"/></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/img/cloud_icon.png" alt="cloud"/></li>
							<li><img src="<?php echo get_template_directory_uri(); ?>/img/p_icon.png" alt="p_icon"/></li>
						</ul>
					</div>
				
					<div class="col-md-10 col-sm-12 col-xs-12 text-container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_1")?></h3>
								<p><?php the_field("erply_description_1")?></p>							
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_2")?></h3>
								<p><?php the_field("erply_description_2")?></p>							
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_3")?></h3>
								<p><?php the_field("erply_description_3")?></p>							
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_4")?></h3>
								<p><?php the_field("erply_description_4")?></p>							
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_5")?></h3>
								<p><?php the_field("erply_description_5")?></p>							
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h3><?php the_field("erply_heading_6")?></h3>
								<p><?php the_field("erply_description_6")?></p>							
							</div>							
						</div>											
					</div>					
					
					
					
				</div>
			</div>
		</section>
		<section>
			<div class="separator-container">
				<div class="separator-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider">
                                    <div class="slide">
                                        <div class="slide1">
                                            <h2>“<?php the_field("testimonial_1_heading")?>”</h2>
                                            <p><?php the_field("testimonial_1_author")?></p>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide2">
                                            <h2>“<?php the_field("testimonial_2_heading")?>”</h2>
                                            <p><?php the_field("testimonial_1_author")?></p>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide3">
                                            <h2>“<?php the_field("testimonial_3_heading")?>”</h2>
                                            <p><?php the_field("testimonial_1_author")?></p>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide4">
                                            <h2>“<?php the_field("testimonial_4_heading")?>”</h2>
                                            <p><?php the_field("testimonial_1_author")?></p>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="slide5">
                                            <h2>“<?php the_field("testimonial_5_heading")?>”</h2>
                                            <p><?php the_field("testimonial_1_author")?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</section>
        <section class="subscribe-wrapper container" style="padding:4em 0;">
            <div class="row">
                <div class="col-md-3 col-sm-12"></div>
                <div class="col-md-6 col-sm-12">
                    <div class="subscribe-container" id="subscribe">
                        <h3>PYSY AJANTASALLA, TILAA UUTISKIRJE!</h3>
                        <p>Pysy ajantasalla - tilaa uutiskirjeemme ajankohtaisista uutisista, oppaista sekä webinaareista ja tapahtumista!</p>
                        <?php echo do_shortcode('[mc4wp_form id="699"]');?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12"></div>
            </div>
        </section>
	</div><!-- #primary -->

<?php
//Temporarily commented out for testing purposes!!!!!
// get_sidebar();
get_footer();?>

