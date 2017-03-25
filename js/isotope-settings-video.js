jQuery(function ($) {

  var $container = $('#video-list');
  $container.isotope({
      itemSelector: '.item',
      layoutMode: 'masonry'
  });

  var $optionSets = $('#filters'),
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
	var $this = $(this);

	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('#filters');
	$optionSets.find('.selected').removeClass('selected');
	$this.addClass('selected');

	var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });

	return false;
	});

});
