<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

                        <?php
                        the_archive_title( '<h1 class="blog-title">', '</h1>' );
                        the_archive_description( '<div class="lead blog-description">', '</div>' );
                        ?>
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