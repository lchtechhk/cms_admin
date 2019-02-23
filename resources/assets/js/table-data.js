var TableData = function() {
	var runDataTable_country = function() {
		var oTable = jQuery_1_9_1('#country').DataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],
			"oLanguage" : {
				"sLengthMenu" : "Show _MENU_ Rows",
				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[0, 'desc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
			],
			// set the initial value
			"iDisplayLength" : 10,
		});
		jQuery_1_9_1('#country_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1('#country_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1('#country_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1('#country_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			runDataTable_country();
		}
	};
}();
