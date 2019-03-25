<?php get_header(); ?>        
        <div class="top-content">
        	<?php 
				$args = array(
							'post_type' =>'page',
							'posts_per_page'=>1,
							'p'=>7
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
        
        <div class="social">
            <div class="social-content">
                <div class="see-on">
                    <p>As See On</p>                
                </div>
                <ul class="social-list">
                    <?php $ws_options = get_option( 'ws_theme_options' ); ?>
                    <li>
                        <a href="http://<?php echo $ws_options['facebook'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png"/></a>
                        <p>facebook</p>
                    </li>
                    <li>
                        <a href="http://<?php echo $ws_options['twitter'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png"/></a>
                        <p>twitter</p>
                    </li>
                    <li>
                        <a href="http://<?php echo $ws_options['googleplus'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/googleplus.png"/></a>
                        <p>googleplus</p>
                    </li>
                    <li>
                        <a href="http://<?php echo $ws_options['youtube'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/youtube.png"/></a>
                        <p>youtube</p>
                    </li>
                    <li>
                        <a href="http://<?php echo $ws_options['yahoo'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/yahoo.png"/></a>
                        <p>yahoo!</p>
                    </li>
                    <li>
                        <a href="http://<?php echo $ws_options['bing'];?>"><img src="<?php bloginfo('template_directory'); ?>/images/bing.png"/></a>
                        <p>bing!</p>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="message">
        	<?php 
				$args = array(
							'post_type' =>'page',
							'posts_per_page'=>1,
							'p'=>57
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : $loop->the_post();
			?>
                <div class="msg-1">“<?php the_title(); ?>”</div>
                <div class="msg-2"><?php the_content(); ?></div>
        	<?php 
				endif;
			?>
        </div>
        
        <div class="home-content">
            <div class="home-content-wrapper">
                <div class="item">Geeky Start Up in association with Experts Online combines effective Online Marketing training with business theory from the very best. Our NEVER SEEN BEFORE video content will put you face to face with scores of the most creative, articulate and successful luminaries in the Business world. </div>
                <div class="item item-right item-bg">
                    <div class="piece-1"></div>
                    <div class="piece-2"></div>
                    <img src="images/avatar.png" />
                    <div class="item-text">
                        <p>“If you are setting up a company, you want to try and find a brand that can work on a global basis.”</p>
                        <div>- Richard Branson</div>
                    </div>
                </div>
                <div class="item item-bg">
                    <div class="piece-1"></div>
                    <div class="piece-2"></div>
                    <img src="images/avatar.png" />
                    <div class="item-text">
                        <p>“If you are setting up a company, you want to try and find a brand that can work on a global basis.”</p>
                        <div>- Richard Branson</div>
                    </div>
                </div>
                <div class="item item-right">Geeky Start Up in association with Experts Online combines effective Online Marketing training with business theory from the very best. Our NEVER SEEN BEFORE video content will put you face to face with scores of the most creative, articulate and successful luminaries in the Business world. </div>
                <div class="item">Geeky Start Up in association with Experts Online combines effective Online Marketing training with business theory from the very best. Our NEVER SEEN BEFORE video content will put you face to face with scores of the most creative, articulate and successful luminaries in the Business world. </div>
                <div class="item item-right item-bg">
                    <div class="piece-1"></div>
                    <div class="piece-2"></div>
                    <img src="<?php bloginfo('template_directory'); ?>/images/avatar.png" />
                    <div class="item-text">
                        <p>“If you are setting up a company, you want to try and find a brand that can work on a global basis.”</p>
                        <div>- Richard Branson</div>
                    </div>
                </div>
                
                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="bottom-content">
        	<?php 
				$args = array(
							'post_type' =>'page',
							'posts_per_page'=>1,
							'p'=>61
						);
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) : $loop->the_post();
			?>
            <div class="bottom-content-message"><?php the_content(); ?></div>
            <a href="<?php the_permalink(); ?>" class="bottom-content-button">Click here</a>
            <?php
				endif; 
			?>
        </div>        
    </div>
<?php get_footer(); ?>