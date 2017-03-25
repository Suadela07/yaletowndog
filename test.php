<?php
				/* Start the Loop */
				$args = array(
					'post_type'=> 'video',
					'posts_per_page' => -1
				);

				$videos = new WP_Query($args);

				if ( $videos->have_posts() ) {

					echo '<div id="item-list">';

				while ( $videos->have_posts() ) {
		        $videos->the_post();

        $termList = get_the_terms( $post->ID, 'video-category' );
        $termName = "";

		    foreach ( $termList as $term ) {
		        $termName .= $term->slug.' ';
		    }


					 if(function_exists('get_field')){
							 if(get_field('video_url')){
								 echo '<div class="'. $termName .'item video-item">';
								 the_field('video_url');
								 echo '<h3 class="video-time-title">';
								 the_title();
								 echo '</h3>';

							 }
							 if(get_field('video_description')){
								 echo '<p class="video_description">';
								 the_field('video_description');
								 echo '</p>';
							 }
							 echo '</div>'; //end video-item
					 }


				}else {

				get_template_part( 'template-parts/content', 'none' );

			}
			echo '</div>'; //end item-list
		}
		?>










----------------------------------------------------------------------------------







<h2>ISOTOPE FILTER</h2>

<ul id="filters">
    <li><a href="#" data-filter="*" class="selected">All</a></li>
    <?php
        $terms = get_terms('video-category');
        $count = count($terms); //How many are they?
        if ( $count > 0 ){  //If there are more than 0 terms
            foreach ( $terms as $term ) {  //for each term:
                echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
            }
        }
    ?>
</ul>

<?php
    $args = array(
        'post_type'=> 'video',
        'posts_per_page' => -1,
    );

    $the_videos = new WP_Query($args);?>

<?php if ( $the_videos->have_posts() ) : ?>
    <div id="item-list">
    <?php while ( $the_videos->have_posts() ) {
            $the_videos->the_post();

                $termList = get_the_terms( $post->ID, 'video-category' );  //Get the assigned terms for a particular item
                $termName = ""; //initialize the string that will contain the terms
                    foreach ( $termList as $term ) { // for each term
                        $termName .= $term->slug.' '; //create a string that has all the slugs
                    }
    ?>
            <div class="<?php echo $termName;?>item"> <?php // 'item' is used as an identifier in the js file ?>

                <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
                <?php the_post_thumbnail('medium'); ?>
                </a>

            </div> <!-- end item -->
    <?php }  ?>
    </div> <!-- end item-list -->
<?php endif; ?>














		<section class="filter widget">
			<ul id="filters" class="filter-list" data-group="video-category">
				<li><a href="#" data-filter="*" class="selected">All</a></li>

				<?php
					$terms = get_terms( 'video-category');

					if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
						foreach( $terms as $term) {
							 echo '<li><a href="#" data-filter=".'.$term->slug.'">' . $term->name . '</a></li>\n';
						}
					}
					?>
			</ul>
		</section>

<div class="video-flex-wrapper">

	<?php
    $args = array(
        'post_type'=> 'video',
        'posts_per_page' => -1,
    );

    $videos = new WP_Query($args);
	?>

	<?php if ( $videos->have_posts() ) : ?>

			<div id="video-list">

				<?php
				while ( $videos->have_posts() ) {
						$videos->the_post();

						$termList = get_the_terms( $post->ID, 'video-category' );
						$termName = "";

						foreach ( $termList as $term ) {
								$termName .= $term->slug.' ';
						}

                        if( function_exists('get_field') ) {
                            if( get_field('video_url') ) {

                                echo '<div class="'. $termName. 'item video-item">';
                                the_field('video_url');
                                echo '<h3 class="video-time-title">';
                                the_title();
                                echo '</h3>';
                            }


                            if( get_field('video_description') ) {

                                echo '<p class="video_description">';
                                the_field('video_description');
                                echo '</p>';

                            }

                            echo '</div>'; <!-- end item -->

                        }

				        echo '</div>'; <!-- end video-list -->

                }
                ?>












<?php
    $args = array(
    'post_type'=> 'video',
    'posts_per_page' => -1,
    );

    $videos = new WP_Query($args);
?>

<?php if ( $videos->have_posts() ) : ?>

    <div id="video-list">

<?php
    while ( $videos->have_posts() ) {
        $videos->the_post();

        $termList = get_the_terms( $post->ID, 'video-category' );
        $termName = "";

    foreach ( $termList as $term ) {
        $termName .= $term->slug.' ';
    }

    if( function_exists('get_field') ) {
        if( get_field('video_url') ) {

        echo '<div class="'. $termName. 'item video-item">';
        the_field('video_url');
        echo '<h3 class="video-time-title">';
        the_title();
        echo '</h3>';
    }


    if( get_field('video_description') ) {

        echo '<p class="video_description">';
        the_field('video_description');
        echo '</p>';

    }

    echo '</div>'; <!-- end item -->

    }

    echo '</div>'; <!-- end video-list -->

    }
?>
