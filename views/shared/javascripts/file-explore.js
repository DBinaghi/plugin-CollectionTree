jQuery(document).ready(function () {
	init();

	function init() {
		var startStatus = (jQuery("#collection-tree").hasClass("treeExpanded") ? "expanded" : "collapsed");

		if (startStatus == "collapsed") {
			jQuery("#collection-tree ul:not(:first)").hide();
		}		

		jQuery("#collection-tree li").prepend("<span class='collection-tree-icon handle'></span>");

		jQuery("#collection-tree li:has(ul)")
			.children(":first-child").addClass(startStatus)
			.click(function(){    
				jQuery(this).toggleClass("collapsed expanded")
					.siblings("ul").toggle();
			});       
	}
});
