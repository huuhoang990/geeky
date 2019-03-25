<!DOCTYPE HTML>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html class="smooth_slider_fouc" dir="ltr" lang="en-US"><!--<![endif]-->
<head>
	<title><?php bloginfo('home'); ?></title>
    <meta charset="utf-8"/>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type');?>;" />
	<meta name="author" content="Dang Phuoc Loc" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?> " />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>  
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-bg">
                <div class="header-content">
                    <a href="<?php bloginfo('home'); ?>" class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>
                   <!--top-menu-->
                   <?php include(TEMPLATEPATH.'/top-menu.php'); ?>
                   <!--End-top-menu-->
                    <div class="video">
                        <div class="video-handler">
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
                    <iframe src="<?php echo $link_embed; ?>" width="425" height="240" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                     <?php
					 	endif; 
					 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>