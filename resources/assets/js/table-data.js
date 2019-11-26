var TableData = function() {
	var runDataTable_staff = function() {
		var id = '#staff';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_view_order_comment = function() {
		var id = '#view_order_comment';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_view_order_table = function() {
		var id = '#view_order_table';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	
	var runDataTable_product_option_value = function() {
		var id = '#productOptionValue';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_product_option = function() {
		var id = '#productOption';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_product_image = function() {
		var id = '#product_image';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_order = function() {
		var id = '#order';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_manufacturer = function() {
		var id = '#manufacturer';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_subcategory = function() {
		var id = '#subcategory';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_category = function() {
		var id = '#category';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_customer_address = function() {
		var id = '#customer_address';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_customers = function() {
		var id = '#customers';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_zone = function() {
		var id = '#zone';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_district = function() {
		var id = '#district';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_area = function() {
		var id = '#area';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_city = function() {
		var id = '#city';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt(jQuery_1_9_1(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	var runDataTable_country = function() {
		var id = '#country';
		var oTable = jQuery_1_9_1(id).DataTable({
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
		jQuery_1_9_1(id+'_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
		// modify table search input
		jQuery_1_9_1(id+'_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		// jQuery_1_9_1(id+'_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		jQuery_1_9_1(id+'_column_toggler input[type="checkbox"]').change(function() {
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
			runDataTable_city();
			runDataTable_area();
			runDataTable_district();
			runDataTable_zone();
			runDataTable_customers();
			runDataTable_customer_address();
			runDataTable_category();
			runDataTable_subcategory();
			runDataTable_manufacturer();
			runDataTable_order();
			runDataTable_product_image();
			runDataTable_product_option();
			runDataTable_product_option_value();
			runDataTable_staff();
			runDataTable_view_order_table();
			runDataTable_view_order_comment();
		}
	};
}();
