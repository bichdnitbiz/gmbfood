<!-- SECTION POPUP -->
<div id="search-popup" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="content-search">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e('Close X','yoga')?></button>
            <h4><?php esc_html_e('Search anytime by typing','yoga')?></h4>
            <form action="<?php echo esc_url(home_url( '/' ));?>" method="get" class="popup-search">
                <i class="icon-search"></i>
                <input name="s" value="" placeholder="<?php esc_html_e('Search for...', 'yoga'); ?>" type="text">
                <button type="submit" class="search-submit-popup"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'yoga' ); ?></span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>