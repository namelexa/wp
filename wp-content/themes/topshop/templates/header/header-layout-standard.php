<?php global $woocommerce; ?>

<?php if( get_theme_mod( 'topshop-show-header-top-bar', false ) ) : ?>

    <div class="site-top-bar border-bottom">
        <div class="site-container">

            <div class="site-top-bar-left">

                <?php wp_nav_menu( array( 'theme_location' => 'top-bar', 'fallback_cb' => false, 'depth'  => 1 ) ); ?>

            </div>
            <div class="site-top-bar-right">

                <?php if ( topshop_is_woocommerce_activated() ) : ?>
                    <div class="site-top-bar-left-text"><?php echo wp_kses_post( get_theme_mod( 'topshop-header-info-text', 'Call Us: 082 444 BOOM' ) ) ?></div>
                <?php endif; ?>



            </div>
            <div class="clearboth"></div>



        </div>

    </div>

<?php endif; ?>

<div class="site-container">

    <div class="site-header-left">

        <?php if( get_header_image() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-img" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" class="pc_logo"/><img src="http://farmally.ru/wp-content/themes/topshop/images/footer_logo.svg" alt="farmally" class="is_mobile"></a>
        <?php else : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        <?php endif; ?>

    </div><!-- .site-branding -->

    <div class="site-header-right">
        <?php if( get_theme_mod( 'topshop-header-search', false ) ) : ?>
            <div class="search_icon">
                <img src="http://farmally.ru/wp-content/uploads/2019/03/search.svg" alt="Search">
            </div>
            <div class="header-registration">
                <a href="/my-account/">
                    <img src="http://farmally.ru/wp-content/uploads/2019/03/login.svg" alt="">
                </a>
            </div>
            <?php dynamic_sidebar( 'header_widget' ); ?>
            <div class="search-block">

                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
        <?php if ( topshop_is_woocommerce_activated() ) : ?>
            <?php if ( !get_theme_mod( 'topshop-header-remove-acc' ) ) : ?>
                <?php if ( is_user_logged_in() ) { ?>
                    <div class="site-header-right-link"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','topshop'); ?>"><?php _e('My Account','topshop'); ?></a></div>
                <?php } else { ?>
                    <div class="site-header-right-link"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','topshop'); ?>"><?php _e('Sign In / Register','topshop'); ?></a></div>
                <?php } ?>
            <?php endif; ?>
            <?php if ( !get_theme_mod( 'topshop-header-remove-cart' ) ) : ?>
                <div class="header-cart header_cart_img">
                    <a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="Открыть корзину">
                        <span class="header-cart-amount">
                            <?php echo sprintf( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'topshop' ),
                                $woocommerce->cart->cart_contents_count ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
                        </span>
                        <span class="header-cart-checkout <?php echo ( $woocommerce->cart->cart_contents_count > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
                            <i class="fa fa-shopping-cart"></i>
                        </span>
                    </a>
                </div>
            <?php endif; ?>
            <?php /* if( get_theme_mod( 'topshop-header-search', false ) ) : ?>
                    <i class="fa fa-search search-btn"></i>
                <?php endif; */?>
        <?php else : ?>

            <div class="site-top-bar-left-text"><?php echo wp_kses_post( get_theme_mod( 'topshop-header-info-text', 'Call Us: 082 444 BOOM' ) ) ?></div>

        <?php endif; ?>

    </div>
<!--    <span class="header-menu-button"><i class="fa fa-bars"></i><span>--><?php //_e( 'Menu', 'topshop' ); ?><!--</span></span>-->
    <div class="clearboth"></div>

</div>

<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'topshop-sticky-header' ) ) ? sanitize_html_class( 'header-stick' ) : ''; ?>" role="navigation">
    <span class="header-menu-button"><i class="fa fa-bars"></i><span><?php _e( 'Menu', 'topshop' ); ?></span></span>
    <div id="main-menu" class="main-menu-container">
        <span class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></span>
        <div class="site-container">
            <div class="mobile_menu_header">
                <div class="mobile_contacts">
                    <p>
                        <span>Тел:</span>
                        <a href="tel:79258759783"><span>+7 925 875-97-83</span></a>
                    </p>
                    <p>
                        <span>Режим работы:</span>
                        <span>
                            Ежедневно <br>
                            с 9 до 19:00
                        </span>
                    </p>
                </div>
                <div class="search-block mobile">
                    <?php get_search_form(); ?>
                </div>
            </div>

            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            <div class="clearboth"></div>
            <div class="header-registration mobile">
                <a href="/my-account/" >
                    <img src="http://farmally.ru/wp-content/uploads/2019/03/login.svg" alt=""> Личный кабинет
                </a>
            </div>
        </div>
    </div>
</nav><!-- #site-navigation -->