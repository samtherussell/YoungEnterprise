
stepcarousel.setup({
	galleryid : 'mygallery', //id of carousel DIV
	beltclass : 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass : 'panel', //class of panel DIVs each holding content
	autostep : {
		enable : true,
		moveby : 1,
		pause : 3000
	},
	panelbehavior : {
		speed : 500,
		wraparound : true,
		wrapbehavior : 'slide',
		persist : true
	},
	defaultbuttons : {
		enable : true,
		moveby : 1,
		leftnav : [ 'slider/media/left.png', -10, 150 ],
		rightnav : [ 'slider/media/right.png', -20, 150 ]
	},
	statusvars : [ 'statusA', 'statusB', 'statusC' ], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype : [ 'inline' ]
//content setting ['inline'] or ['ajax', 'path_to_external_file']
});