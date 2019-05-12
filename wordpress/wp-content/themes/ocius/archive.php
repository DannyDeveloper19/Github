<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ocius
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
        /**
         * ocius_before_main_content hook.
         *
         * @since 1.0
         */
        do_action( 'ocius_before_main_content' );


        /**
         * ocius_breadcrumb hook.
         *
         * @since 1.0
         * @hooked ocius_construct_breadcrumb -  10
         *
         */
        do_action( 'ocius_breadcrumb' );

        if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

            /**
             * ocius_action_navigation hook
             * @since Ocius 1.0.0
             *
             * @hooked ocius_posts_navigation -  10
             */
            do_action( 'ocius_action_navigation');

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

        /**
         * ocius_after_main_content hook.
         *
         * @since 0.1
         */
        do_action( 'ocius_after_main_content' );
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/**
 * ocius_sidebar hook
 * @since Ocius 1.0.0
 *
 * @hooked ocius_sidebar -  10
 */
do_action( 'ocius_sidebar');

get_footer();
