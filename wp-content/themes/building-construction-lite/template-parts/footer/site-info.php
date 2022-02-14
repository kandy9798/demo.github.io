<?php
/**
 * Displays footer site info
 *
 * @subpackage Building Construction Lite
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
	<p><?php
        echo esc_html( get_theme_mod( 'construction_firm_footer_text' ) );
        printf(
            /* translators: %s: Building WordPress Theme. */
            '<p class="mb-0"> %s</p>',
            esc_html__( 'Building WordPress Theme', 'building-construction-lite' )
        );
	?></p>
</div>