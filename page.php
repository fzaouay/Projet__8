<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

get_header();
?>

	<main id="primary" class="site-main">
	<?php get_template_part('template-parts/nomination-festival.php', "test"); ?>	
	<div id="hero-header">
    <?php
    // Recupera l'URL del video dal Customizer
    $video_url = get_theme_mod('hero_header_video');
    $fallback_image = get_theme_mod('hero_header_fallback_image');
    ?> 

    <?php if ($video_url): ?>
        <video autoplay muted loop playsinline class="video-background">
            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
        </video>
    <?php endif; ?>

    <?php if ($fallback_image): ?>
        <img src="<?php echo esc_url($fallback_image); ?>" alt="Hero Fallback" class="fallback-image">
    <?php endif; ?> 
	</div> 

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php get_template_part('template-parts/nomination-festival'); ?>

	</main><!-- #main -->

<?php
get_footer();
