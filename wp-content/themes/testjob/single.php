<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package test
 */

get_header();
?>

<div class="container">
    <div class="row">

        <div class="col-sm-8 blog-main">
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
