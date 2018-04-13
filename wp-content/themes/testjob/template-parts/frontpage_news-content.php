<div class="row single-news-post">
	<div class="col-md-2">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'news-loop-thumb'); ?>
		</a>
	</div>

	<div class="col-md-9">
		<span><?php echo get_the_date('n F, Y'); ?></span>
		<p><?php the_excerpt_max_charlength(100); ?></p>
	</div>
</div>