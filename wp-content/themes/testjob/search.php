<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package test
 */

get_header();
?>


<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">

			<?php if ( have_posts() ) : ?>
                <div class="blog-header">
                    <h1>
	                    <?php printf( esc_html__( 'Search Results for: %s', 'test' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h1>
                </div>

				<?php
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/frontpage_news', 'content');

				endwhile;
				?>

			<?php endif; ?>

        </div><!-- /.row -->


		<?php get_sidebar(); ?>


    </div>
</div>

<?php

get_footer();