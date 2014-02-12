jQuery(document).ready(function() {
	uls = jQuery('.products-grid');
	jQuery.each(uls, function(index, value)
	{
		setMaxProductDescHeight(value.id);
		setMaxLiHeightWP(value.id);
	})
});

setMaxLiHeightWP = function(ulID)
{
    height = 0;
	jQuery.each(jQuery("#" + ulID).children(), function(index, liItem)
	{
		height = height > jQuery(liItem).height() ? height : jQuery(liItem).height(); 
	})
	jQuery("#" + ulID).children().height(height);
	return height;
}


setMaxProductDescHeight = function(ulID)
{
    height = 0;
	jQuery.each(jQuery("#" + ulID).find('div.short-desc'), function(index, liItem)
	{
		height = height > jQuery(liItem).height() ? height : jQuery(liItem).height(); 
	})
	jQuery("#" + ulID).find('div.short-desc').height(height);
	return height;
}
