<?php 
	get_header(); 
?>              
        <div class="home-content contact-content">
            <div class="home-content-wrapper">
                <div class="contact-left">
                	<?php
						if(have_posts()) : while(have_posts()) : the_post();
					?>
                    <div class="blog-item">
                        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                        <div class="date">
                            <span><?php the_time('l,F jS,Y'); ?> at <?php the_time('g:i a'); ?></span>
                            <span><a><?php comments_popup_link('no comment','1 comment','% comments'); ?></a></span>
                        </div>
                        <div class="blog-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                	<?php 
						endwhile;
						endif;
					?>
                </div>
                
                
                <div class="contact-right">
                   	<!--search-box-->
                   	<?php get_search_form(); ?>
                    <!--End-search-box-->
                    <br /><br />
                    
                    <p class="title">Latest videos from Geeky</p>
                    <div class="sidebar-video">
                     <?php 
						$args = array(
									'post_type' =>'video',
									'posts_per_page'=>1,
								);
							$loop = new WP_Query( $args );
							if ( $loop->have_posts() ) : $loop->the_post();
								$type_video=get_post_meta($post->ID,'type-video', true);
								if($type_video=="vimeo"){
									$link_video=get_post_meta($post->ID, 'link-video', true);
									$cut_string=explode("/",$link_video);
									$str_length=sizeof($cut_string);
									$id_video=$cut_string[$str_length-1];
									$link_embed='http://player.vimeo.com/video/'.$id_video;
								}else if($type_video=="youtube"){
											$link_video=get_post_meta($post->ID, 'link-video', true);
											$url_string = parse_url($link_video, PHP_URL_QUERY);
  											 parse_str($url_string, $args);
  											 $id_video=isset($args['v']) ? $args['v'] : false;
											$link_embed='http://www.youtube.com/embed/'. $id_video;
									   }
								
					?>
                    <iframe src="<?php echo $link_embed; ?>" width="345" height="195" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                     <?php
					 	endif; 
					 ?>
                    </div>
                    <br /><br />
                    <p class="title">Recent posts</p>
                    <div class="recent-post">
                        <ul>
                        	<?php
								query_posts('post_type=post&posts_per_page=5');
								if(have_posts()) : while(have_posts()) : the_post();
							?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php
							 	endwhile;endif;
								wp_reset_query(); 
							?>
                        </ul>
                    </div>
                    <br /><br />
                    <p class="title">Recent tweets</p>
                   	<ul class="tweets-list">
                    	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('twitter-area')): ?>
						<?php endif;?>
                    </ul>
                </div>
                
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>       
            
    </div>
    
<?php get_footer(); ?>
<style>
.blog-item{
	border-bottom:none !important;
}
</style>