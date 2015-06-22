$(document).ready(function() {
	jQuery('toggle').hide();
	jQuery('a#toggler').click(function()
		{
			jQuery('#toggle').toggle(400);
			return true;
	});
});