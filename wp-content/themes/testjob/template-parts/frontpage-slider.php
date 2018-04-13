<?php
$slider_home_group = get_field('slider_home_group', 'option');
//echo '<pre>';
//print_r($slider_home_group);
//echo '</pre>';
?>

<!--slider-->
<div class="row row-slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner">

            <?php foreach ($slider_home_group['sliders'] as $index => $slide):?>
                <div class="item <?php echo ($index == 0) ? 'active' : ''; ?>">
                    <div class="mask col-md-0 col-xs-12" style="background-image: url('<?php echo $slide['image']['sizes']['slider']; ?>'); height: 200px;position: absolute;"></div>

                    <div class="col-md-4 col-xs-12">

                        <span class="slider-title">
                            <?php echo get_the_title($slide['post']->ID); ?>
                        </span>

                        <div class="slider-meta">
                            <span class="btn-block post-time"><i class="far fa-clock"></i> <span>20 сентябрь 2020</span></span>
                            <?php
                            /*
                             * получаем рубрики и выводим
                             */
                            $news_terms = wp_get_object_terms($slide['post']->ID, 'region');
                            //print_r ($news_terms);
                            if( $news_terms && ! is_wp_error($news_terms) ){
                                foreach( $news_terms as $term ){
		                            echo '<a class="btn post-category" href="'. get_term_link($term) .'">'. $term->name .'</a>'.PHP_EOL;
	                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-0">
                        <img src="<?php echo $slide['image']['sizes']['slider']; ?>" alt="">
                    </div>
                </div>
            <?php endforeach; ?>

			<!-- Left and right controls -->
			<a class="right slider-control right-control" href="#myCarousel" data-slide="next">
				<i class="fas fa-caret-right"></i>
				<span class="sr-only">Next</span>
			</a>
			<a class="left slider-control left-control" href="#myCarousel" data-slide="prev">
				<i class="fas fa-caret-left"></i>
				<span class="sr-only">Previous</span>
			</a>


		</div>
	</div>

</div><!-- !slider-->