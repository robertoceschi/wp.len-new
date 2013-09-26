<?php
/**
 * Search-Form Template
 *
 *
 *
 */
?>

<form class="form-wrapper cf" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'lenlenlikes' ); ?>" />
    <button type="submit" class="submit" name="submit" id="searchsubmit">Search</button>
</form>

