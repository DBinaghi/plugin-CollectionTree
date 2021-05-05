jQuery(document).ready(function () {
	if (jQuery("#collection-tree").hasClass("treeExpanded")) {
		var treeClass = "expanded";
		var treeTitle = "collapse";
	} else {
		var treeClass = "collapsed";
		var treeTitle = "expand";
		jQuery("#collection-tree ul:not(:first)").hide();
	}

	jQuery("#collection-tree li").prepend("<span class='collection-tree-icon handle'></span>");

	jQuery("#collection-tree li:has(ul)")
		.children(":first-child").addClass(treeClass)
		.attr('title', treeTitle)
		.click(function(){    
			jQuery(this).toggleClass("collapsed expanded")
				.siblings("ul").toggle();
			if (treeTitle == "collapse") {
				jQuery(this).attr('title', "expand");
			} else {
				jQuery(this).attr('title', "collapse");
			}
		});       
});
