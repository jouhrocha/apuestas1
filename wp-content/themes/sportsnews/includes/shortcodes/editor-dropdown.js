( function() {
    tinymce.PluginManager.add( 'flytonic_shortcodes', function( editor, url ) {
		var my_shortcodes = [ 
			{text:'Top Fantasy Sites Table', value:'Top Fantasy Sites Table'},
			{text:'Recent Posts', value:'Recent Posts'},
			{text:'Buttons', value:'Buttons'},
			{text:'Alert Boxes', value:'Alert Boxes'},
			{text:'Columns', value:'Columns'},
			
		];
        // Add a button that opens a window
        editor.addButton('flytonic_shortcodes_btn', {
            type: 'listbox',
            text: 'Flytonic ',
            icon: false,
fixedWidth: true,
style:'color:#990000;',
            onselect: function(e) {
                //editor.insertContent(this.value());
				var v = this.value();
				
				if(v == 'Buttons'){
					jQuery('#cdf_shortcode_dialog').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
				}
				
				if(v == 'Alert Boxes'){
					jQuery('#fly_boxes').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
				}
				
				if(v == 'Top Fantasy Sites Table'){
					jQuery('#bcb_editor').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
                                }

				
				if(v == 'Recent Posts'){
					jQuery('#excerpt_editor').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
				}
				
				if(v == 'Columns'){
					jQuery('#fly_columns').dialog({'dialogClass'   : 'wp-dialog', 'width': '400px'}).dialog('open');
				}

            },
            values: my_shortcodes,
            onPostRender: function() {
                // Select the second item by default
                //this.value('Some text 2');
            }
        });


    } );

} )();

