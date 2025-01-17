<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Newsup
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'news-hunt' ); ?></a>
    <div class="wrapper" id="custom-background-css">
        <header class="mg-headwidget">
            <!--==================== TOP BAR ====================-->

            <?php do_action('newshunt_action_header_section');  ?>
            <div class="clearfix"></div>
            <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
            if ( has_header_image() ) {
              $background_image = get_header_image();
            } ?>
            <div class="mg-nav-widget-area-back" style='background-image: url("<?php echo esc_url( $background_image ); ?>" );'>
            <?php $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); ?>
            <div class="overlay">
              <div class="inner" <?php if($remove_header_image_overlay == false) { 
            $newsup_header_overlay_color = get_theme_mod('newsup_header_overlay_color','rgba(32,47,91,0.4)');?> style="background-color:<?php echo esc_attr($newsup_header_overlay_color);?>;" <?php } ?>> 
                <div class="container-fluid">
                    <div class="mg-nav-widget-area">
                        <div class="row align-items-center">
                          <?php $newsup_center_logo_title = get_theme_mod('newsup_center_logo_title',false);
                            if($newsup_center_logo_title == false ) { ?>
                            <div class="col-md-3 col-sm-4 text-center-xs">
                              <?php } else { ?>
                                <div class="col-12 text-center mx-auto ">
                              <?php } ?>
                                <div class="navbar-header">
                                <?php the_custom_logo(); 
                                if (display_header_text()) : ?>
                                <div class="site-branding-text">
                                <?php if (is_front_page() || is_home()) { ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                               <?php } else { ?>
                                <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                                <?php } ?>
                                <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                                </div>
                              <?php endif; ?>
                                </div>
                            </div>
                           <?php do_action('newsup_action_banner_advertisement'); ?>

                        </div>
                    </div>
                </div>
              </div>
              </div>
          </div>
    <div class="mg-menu-full">
      <nav class="navbar navbar-expand-lg navbar-wp">
        <div class="container-fluid flex-row">
          
                <!-- Right nav -->
                    <div class="m-header align-items-center">
                        <?php $home_url = home_url(); ?>
                        <a class="mobilehomebtn" href="<?php echo esc_url($home_url); ?>"><span class="fas fa-home"></span></a>
                        
                        <div class="dropdown ml-auto show mg-search-box pr-3">
                            <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fas fa-search"></i>
                            </a>

                            <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                        <?php get_search_form(); ?>
                      </div>
                        </div>
                        <!-- navbar-toggle -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wp" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation','news-hunt'); ?>">
                          <i class="fas fa-bars"></i>
                        </button>
                        <!-- /navbar-toggle -->
                    </div>
                    <!-- /Right nav --> 
          
                  <div class="collapse navbar-collapse" id="navbar-wp">
                    <div class="d-md-block">
                  <?php wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'  => 'nav-collapse collapse',
                        'menu_class' => 'nav navbar-nav mr-auto',
                        'fallback_cb' => 'newsup_fallback_page_menu',
                        'walker' => new newsup_nav_walker()
                      ) ); 
                    ?>
                </div>    
                  </div>

                <!-- Right nav -->
                    <div class="d-none d-lg-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                        <div class="dropdown show mg-search-box pr-2">
                            <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fas fa-search"></i>
                            </a> 
                            <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                <!-- /Right nav -->  
          </div>
      </nav> <!-- /Navigation -->
    </div>
</header>
<div class="clearfix"></div>
<?php  if (is_front_page() || is_home()) { ?>
<?php $show_popular_tags_title = newsup_get_option('show_popular_tags_title');
 $select_popular_tags_mode = newsup_get_option('select_popular_tags_mode');
 $number_of_popular_tags = newsup_get_option('number_of_popular_tags');
 newsup_list_popular_taxonomies($select_popular_tags_mode, $show_popular_tags_title, $number_of_popular_tags); ?>
 <?php } ?>
 <?php do_action('newsup_action_banner_exclusive_posts'); 
 do_action('newshunt_action_front_page_main_section_1'); ?>