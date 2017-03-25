<form role="search" method="get" id="search-form" class="searchform" action="<?php echo home_url( '/' ); ?>">
   <label class="searchlabel"><span class="offscreen"><?php echo _x( 'Search for:', 'label' ) ?></span><br>
     <input type="search" id="search-field" class="search-text"
     placeholder="<?php echo esc_attr_x( 'What are you looking for?...', 'placeholder' ) ?>"
     value="<?php echo get_search_query() ?>" name="s"
     title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
   </label>
<button type="submit" class="search-submit" id="search-submit" title="Search Yaletown Dog Training...">Search</button>
</form>
