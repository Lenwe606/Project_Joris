<?php
/**
 * The template for displaying search forms
 *
 * @package Mokka
 * @since 	Mokka 1.0
 */
?>
<form class="navbar-search navbar-form" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <div class="form-group">
        <input type="text" name="s" id="s" placeholder="<?php _e("Search", 'favethemes' ); ?>" class="form-control">
    </div>
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
