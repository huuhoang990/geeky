<?php
/*
	Template name: About Page
*/
?>
<?php
	get_header();
?>
		<div class="top-content">
        	<?php 
				$args = array(
							'post_type' =>'page',
							'posts_per_page'=>1,
							'p'=>21
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : $loop->the_post();
			?>
            <div class="top-content-label"><?php the_title(); ?></div>
            <div class="top-content-msg"><?php the_content(); ?></div>
			<?php
				endif; 
			?>
            <a href="#" class="top-content-button">[ &nbsp;Click here and Create a free account now!&nbsp; ]</a>
        </div>
		<div class="home-content">
            <div class="home-content-wrapper">
            	<?php
                	$args = array('post_type' => "geeky_business", 'order' =>"ASC" );
					query_posts( $args );
					if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$geeky_post_meta = get_post_meta($post->ID);
						$geeky_features = unserialize($geeky_post_meta['geeky_features'][0]);
						?>
						<div class="feature-item">
                            <p class="title"><?php the_title();?></p>
                            <div class="features-list">
                                <ul>
                                	<?php
                                    foreach($geeky_features as $geeky)
									{
										?>
		                                    <li><?php echo $geeky?></li>
                                        <?php
	
									}
									
									?>                                    
                                </ul>                        
                            </div>
                            <a href="<?php echo the_permalink()?>" class="upgrade-button">Upgrade Now</a>
                        </div>
                        <?php
					endwhile;
					else :
							echo wpautop( 'Sorry, no geekys were found' );
					endif;
				wp_reset_query();
				?>
            
                
                <div class="clear"></div>
            </div>
        
            <div class="what-is">
                <div class="what-is-content">
                	<?php 
					$args = array(
								'post_type' =>'page',
								'posts_per_page'=>1,
								'p'=>27
							);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) : $loop->the_post();
					?>
                    <p class="title"><?php the_title(); ?></p>
                    <div class="description"><?php the_content(); ?></div>
               		<?php
						endif; 
					?>
               </div> 
            </div>
                    
                
                
            <div class="home-content-wrapper">
            	<?php 
					$args = array(
								'post_type' =>'business',
								'order'=>'asc'
							);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
				?>            
                <div class="business-item">
                    <p class="title"><?php the_title(); ?></p>
                    <?php 
						if ( has_post_thumbnail()) 
                    		the_post_thumbnail(); 
                     ?>
                    <div class="business-content">
                       <?php the_content(); ?>
                    </div>
                    
                    <div class="clear"></div>
                </div>
                <?php 
					endwhile;
				?>                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>  
        
<?php
	get_footer();
?>