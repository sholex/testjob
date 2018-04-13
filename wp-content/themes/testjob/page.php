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
 * @package test
 */

get_header();
?>

<div class="container">
    <div class="row">

        <div class="col-sm-8">
            <?php while ( have_posts() ) : the_post();?>

                <div class="blog-post">
                    <h2 class="blog-post-title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
                </div><!-- /.blog-post -->

            <?php   endwhile; 	?>
        </div><!-- /.blog-main -->


        <?php get_sidebar(); ?>

    </div><!-- /.row -->

</div>


<?php

get_footer();