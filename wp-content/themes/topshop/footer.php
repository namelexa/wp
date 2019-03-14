<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package topshop
 */
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer <?php echo ( get_theme_mod( 'topshop-footer-switch-bottombar' ) ) ? sanitize_html_class( 'site-footer-bottom-bar-switch' ) : ''; ?>" role="contentinfo">
	
    <div class="site-footer-widgets">
        <div class="site-container">
            <div class="footer_sidebar_1">
                <ul>
                    <?php dynamic_sidebar( 'topshop-site-footer' ); ?>
                </ul>
            </div>
            <div class="footer_sidebar_2">
                <ul>
                    <?php dynamic_sidebar( 'topshop-site-footer2' ); ?>
                </ul>
            </div>
            <div class="footer_sidebar_3">
                <ul>
                    <?php dynamic_sidebar( 'topshop-site-footer3' ); ?>
                </ul>
            </div>
<!--            <div class="clearboth"></div>-->
            
			<?php printf( __( '</div></div><div class="site-footer-bottom-bar"><div class="site-container"><div class="site-footer-bottom-bar-left"> %1$s  %2$s', 'topshop' ), 'Farmally', '</div><div class="site-footer-bottom-bar-right">' ); ?>
            
            <?php _e( 'Все права защищены ', 'topshop' ); ?><a href="<?php echo esc_url( __( 'http://farmally/', 'topshop' ) ); ?>"><?php printf( __( '%s', 'topshop' ), 'Farmally' ); ?></a>
            
	        </div>
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
</footer> <!-- .site-footer -->
</div>  <!-- #page -->
<?php wp_footer(); ?>
</body>
<script>
    jQuery(function($) {

        (function quantityProducts() {
            var $quantityArrowMinus = $(".quantity-arrow-minus");
            var $quantityArrowPlus = $(".quantity-arrow-plus");
            var $quantityNum = $(".quantity-num");

            $quantityArrowMinus.click(quantityMinus);
            $quantityArrowPlus.click(quantityPlus);

            function quantityMinus() {
                if ($quantityNum.val() > 1) {
                    $quantityNum.val(+$quantityNum.val() - 1);
                }
            }

            function quantityPlus() {
                $quantityNum.val(+$quantityNum.val() + 1);
            }
        })();

    });
    jQuery( function( $ ) {

        $( document ).on( 'change', 'input.qty', function() {

            var item_hash = $( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
            var item_quantity = $( this ).val();
            var currentVal = parseFloat(item_quantity);

            function qty_cart() {

                $.ajax({
                    type: 'POST',
                    url: cart_qty_ajax.ajax_url,
                    data: {
                        action: 'qty_cart',
                        hash: item_hash,
                        quantity: currentVal
                    },
                    success: function(data) {
                        $( '.view-cart-popup' ).html(data);
                    }
                });

            }

            qty_cart();

        });

    });
</script>
</html>