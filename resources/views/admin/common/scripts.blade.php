<script src="{!! asset('resources/views/admin/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<script src="{!! asset('resources/views/admin/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/select2/select2.full.min.js') !!}"></script>

<!-- InputMask -->
<script src="{!! asset('resources/views/admin/plugins/input-mask/jquery.inputmask.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/input-mask/jquery.inputmask.extensions.js') !!}"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{!! asset('resources/views/admin/plugins/daterangepicker/daterangepicker.js') !!}"></script>


<!-- bootstrap datepicker -->
<script src="{!! asset('resources/views/admin/plugins/datepicker/bootstrap-datepicker.js') !!}"></script>

<!-- bootstrap color picker -->
<script src="{!! asset('resources/views/admin/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}"></script>
<!-- bootstrap time picker -->
<script src="{!! asset('resources/views/admin/plugins/timepicker/bootstrap-timepicker.min.js') !!}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{!! asset('resources/views/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- iCheck 1.0.1 -->
<script src="{!! asset('resources/views/admin/plugins/iCheck/icheck.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('resources/views/admin/plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('resources/views/admin/dist/js/app.min.js') !!}"></script>
@if(Request::path() == 'admin/dashboard/last_year' or Request::path() == 'admin/dashboard/last_month' or Request::path() == 'admin/dashboard/this_month')
    <!--<script src="{!! asset('resources/views/admin/dist/js/pages/dashboard.js') !!}"></script>-->
@endif
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('resources/views/admin/js/demo.js') !!}"></script>

<script src="{!! asset('resources/views/admin/plugins/chartjs/Chart.min.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<script src="{!! asset('resources/views/admin/plugins/sparkline/jquery.sparkline.min.js') !!}"></script>

<script src="{!! asset('resources/views/admin/plugins/sparkline/jquery.sparkline.min.js') !!}"></script>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('resources/views/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>

<!-- Page script -->
<script type="text/javascript">

$(document).ready(function () {
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});
	
	$(function () {
	
		//Initialize Select2 Elements
		$(".select2").select2();
	
		//Datemask dd/mm/yyyy
		$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		//Datemask2 mm/dd/yyyy
		$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
		//Money Euro
		$("[data-mask]").inputmask();
	
		//Date range picker
		$('.reservation').daterangepicker();
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
		//Date range as a button
	/*    $('#daterange-btn').daterangepicker(
			{
			  ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			  },
			  startDate: moment().subtract(29, 'days'),
			  endDate: moment()
			},
			function (start, end) {
			  $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
		);*/
	
		//Date picker
		$('#datepicker').datepicker({
		  autoclose: true
		});
	
		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		  checkboxClass: 'icheckbox_minimal-blue',
		  radioClass: 'iradio_minimal-blue'
		});
		//Red color scheme for iCheck
		$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		  checkboxClass: 'icheckbox_minimal-red',
		  radioClass: 'iradio_minimal-red'
		});
		//Flat red color scheme for iCheck
		$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		  checkboxClass: 'icheckbox_flat-green',
		  radioClass: 'iradio_flat-green'
		});
	
		//Colorpicker
		$(".my-colorpicker1").colorpicker();
		//color picker with addon
		$(".my-colorpicker2").colorpicker();
	
		//Timepicker
		$(".timepicker").timepicker({
		  showInputs: false
		});
	  });


$(document).on('click', '.checkboxess', function(e){
      checked = $("input[type=checkbox]:checked.checkboxess").length;
		if(!checked) {
        //alert("You must check at least one checkbox.");
        return false;
      }

});

$(document).ready(function(e) {
		
	//brantree_active
	$(document).on('click', '#brantree_active', function(){
		//has-error
		if($(this).is(':checked')){
			$('.brantree_active').addClass('field-validate');
		}else{
			$('.brantree_active').parents('div.form-group').removeClass('has-error');
			$('.brantree_active').removeClass('field-validate');
		}
		
	});
	
	//brantree_active
	$(document).on('click', '#cash_on_delivery', function(){
		
		if($(this).is(':checked')){
			$('.cash_on_delivery').addClass('field-validate');
		}else{
			$('.cash_on_delivery').parents('div.form-group').removeClass('has-error');
			$('.cash_on_delivery').removeClass('field-validate');
		}
		
	});
	
	//paypal_status
	$(document).on('click', '#paypal_status', function(){
		
		if($(this).is(':checked')){
			$('.paypal_status').addClass('field-validate');
		}else{
			$('.paypal_status').parents('div.form-group').removeClass('has-error');
			$('.paypal_status').removeClass('field-validate');
		}
		
	});
	
	
	//brantree_active
	$(document).on('click', '#stripe_active', function(){
		
		if($(this).is(':checked')){
			$('.stripe_active').addClass('field-validate');
		}else{
			$('.stripe_active').parents('div.form-group').removeClass('has-error');
			$('.stripe_active').removeClass('field-validate');
		}
		
	});
	
	
	//brantree_active
	$(document).on('click', '#instamojo_active', function(){
		
		if($(this).is(':checked')){
			$('.instamojo_active').addClass('field-validate');
		}else{
			$('.instamojo_active').parents('div.form-group').removeClass('has-error');
			$('.instamojo_active').removeClass('field-validate');
		}
		
	});
	
});

	
//ajax call for add option value
$(document).on('click', '.add-value', function(e){
	$("#loader").show();
	var parentFrom = $(this).parent('.addvalue-form');
	var language_id = parentFrom.children('#language_id').val();
	var products_options_id = parentFrom.children('#products_options_id').val();
	var formData = parentFrom.serialize();
	$.ajax({
		url: '{{ URL::to("admin/addattributevalue")}}',
		type: "POST",
		data: formData,
		success: function (res) {
				$('.addError').hide();
				$('#addAttributeModal').modal('hide');
				$("#content_"+products_options_id+'_'+language_id).parent('tbody').html(res);
		},
	});
		
});

//ajax call for add option value
$(document).on('click', '.update-value', function(e){
	$("#loader").show();
	var parentFrom = $(this).parent('.editvalue-form');
	var language_id = parentFrom.children('#language_id').val();
	var products_options_id = parentFrom.children('#products_options_id').val();
	var formData = parentFrom.serialize();
	console.log('language_id: '+language_id);
	console.log('products_options_id: '+products_options_id);
	$.ajax({
		url: '{{ URL::to("admin/updateattributevalue")}}',
		type: "POST",
		data: formData,
		success: function (res) {
				$('.addError').hide();
				
				$("#content_"+products_options_id+'_'+language_id).parent('tbody').html(res);
		},
	});
		
});


//deleteattribute
$(document).on('click', '#deleteAttribute', function(e){
	$("#loader").show();
	var parentFrom = $('#deleteValue');
	var language_id = parentFrom.children('#delete_language_id').val();
	var products_options_id = parentFrom.children('#delete_products_options_id').val();
	var formData = parentFrom.serialize();
	$.ajax({
		url: '{{ URL::to("admin/deletevalue")}}',
		type: "POST",
		data: formData,
		success: function (res) {
				$('.addError').hide();
				
				$("#content_"+products_options_id+'_'+language_id).parent('tbody').html(res);
				$('#deleteValueModal').modal('hide');
		},
	});
		
});

//ajax call for submit value
$(document).on('click', '#addDefaultAttribute', function(e){
	$("#loader").show();
	var formData = $('#adddefaultattributefrom').serialize();
	$.ajax({
		url: '{{ URL::to("admin/addnewdefaultattribute")}}',
		type: "POST",
		data: formData,
		success: function (res) {
			
			if(res.length != ''){
				$('.addError').hide();
				$('#adddefaultattributesmodal').modal('hide');
				var i;
				var showData = [];
				for (i = 0; i < res.length; ++i) {
					var j = i + 1;
					showData[i] = "<tr><td>"+j+"</td><td>"+res[i].products_options_name+"</td><td>"+res[i].products_options_values_name+"</td><td><a class='badge bg-light-blue editdefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"' products_id = '"+res[i].products_id+"' language_id ='"+res[i].language_id+"' options_id ='"+res[i].options_id+"'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a class='badge bg-red deletedefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"' products_id = '"+res[i].products_id+"' ><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>"; 

				}
				$(".contentDefaultAttribute").html(showData);
			}else{
				$('.addDefaultError').show();
			}
			
			
		},
	});
		
		
});

//onchange get zones agains country
$(document).on('change', '#entry_country_id', function(e){
		
	var zone_country_id = $(this).val();
	$.ajax({
	  url: "{{ URL::to('admin/getZones')}}",
	  dataType: 'json',
	  type: "post",
	  data: '&zone_country_id='+zone_country_id,
	  success: function(data){
		if(data.data.length>0){
			var i;
			var showData = [];
			for (i = 0; i < data.data.length; ++i) {
				showData[i] = "<option value='"+data.data[i].zone_id+"'>"+data.data[i].zone_name+"</option>"; 
			}
		}else{
			showData = "<option value=''>Select Zone</option>"; 				
		}
			$(".zoneContent").html(showData);
	  }
	});
	
});

//AddProductAttribute
$(document).on('click', '.addProductAttributeModal', function(){
	var product_id = $(this).attr('product_id');
	console.log('addProductAttributeModal -- : ' + product_id);
	$.ajax({
		url: "{{ URL::to('admin/view_addProductAttribute')}}",
		type: "POST",
		data: '&product_id='+product_id,
		success: function (data) {
			console.log("data : " + data);
			$('#productAttributeDialog').html(data); 
			$('#productAttributeDialog').modal('show');
		},
		dataType: 'html'
	});
});

//EditProductAttribute
$(document).on('click', '.editProductAttributeModal', function(){
	var product_id = $(this).attr('product_id');
	var product_attribute_id = $(this).attr('product_attribute_id');
	console.log('product_id -- : ' + product_id);
	console.log('product_attribute_id -- : ' + product_attribute_id);
	$.ajax({
		url: "{{ URL::to('admin/view_editProductAttribute')}}",
		type: "POST",
		data: '&product_id='+product_id+'&product_attribute_id='+product_attribute_id,
		success: function (data) {
			console.log("data : " + data);
			$('#productAttributeDialog').html(data); 
			$('#productAttributeDialog').modal('show');
		},
		dataType: 'html'
	});
});

// //DeleteProductAttribute
// $(document).on('click', '#deleteProductAttributeBtn', function(){
// 	var product_id = $(this).attr('product_id');
// 	var product_attribute_id = $(this).attr('product_attribute_id');
// 	$('#delete_product_attribute_id').val(product_attribute_id);
// 	$('#delete_product_id').val(product_id);
// 	console.log("delete_product_id123 : " + product_id);
// 	console.log("delete_product_attribute_id : " + product_attribute_id);
// 	$("#deleteProductAttributeModal").modal('show');
// });


//deleteProductImageModal
$(document).on('click', '.deleteProductAttributeBtn', function(){
	var product_id = $(this).attr('product_id');
	var product_attribute_id = $(this).attr('product_attribute_id');
		console.log('product_id : ' + product_id);
		console.log('product_attribute_id : ' + product_attribute_id);
		$('#delete_product_attribute_id').val(product_attribute_id);
		$('#delete_product_id').val(product_id);
		$("#deleteProductAttributeModal").modal('show');
	});

//AddProductImage
$(document).on('click', '.addProductImageModal', function(){
	var product_id = $(this).attr('product_id');
	console.log('productImageDialog -- + : ' + product_id);
	$.ajax({
		url: "{{ URL::to('admin/view_addProductImage')}}",
		type: "POST",
		data: '&product_id='+product_id,
		success: function (data) {
			console.log("data : " + data);
			$('#productImageDialog').html(data); 
			$('#productImageDialog').modal('show');
		},
		dataType: 'html'
	});
});

//editProductImage
$(document).on('click', '.editProductImageModal', function(){
	var product_id = $(this).attr('product_id');
	var product_image_id = $(this).attr('product_image_id');
	console.log('product_id -- + : ' + product_id);
	console.log('product_image_id -- + : ' + product_image_id);
	$.ajax({
		url: "{{ URL::to('admin/view_editProductImage')}}",
		type: "POST",
		data: '&product_id='+product_id+'&product_image_id='+product_image_id,
		success: function (data) {
			console.log("data : " + data);
			$('#productImageDialog').html(data); 
			$('#productImageDialog').modal('show');
		},
		dataType: 'html'
	});
});


// Order part_customer_address
$(document).on('click', '.part_customer_address', function(){
	$('#dialog_customer_address').modal('show');
});

// Order part_shipping_address
$(document).on('click', '.part_shipping_address', function(){
	$('#dialog_shipping_address').modal('show');
});

// Order part_date_purchased
$(document).on('click', '.part_date_purchased', function(){
	$('#dialog_date_purchased').modal('show');
});

// Order part_add_product
$(document).on('click', '.part_add_product', function(){
	$('#dialog_add_product').modal('show');
});

// Order part_edit_product
$(document).on('click', '.part_edit_product', function(){
	// $('#dialog_edit_product').modal('show');
	var order_product = $(this).attr('order_product');
	// console.log('order_product -- + : ' + order_product);
	$.ajax({
		url: "{{ URL::to('admin/part_edit_product')}}",
		type: "POST",
		data: '&order_product='+order_product,
		success: function (data) {
			// console.log("data : " + data);
			$('#dialog_edit_product').html(data); 
			$('#dialog_edit_product').modal('show');
		},
		error:function (error){
			console.log("error : " + JSON.stringify(error));
		},
		dataType: 'html'
	});

});
//AddAddress
$(document).on('click', '.addAddressModal', function(){
	var customer_id = $(this).attr('customer_id');
	console.log('addAddressModal -- customer_id : ' + customer_id);
	$.ajax({
		url: "{{ URL::to('admin/view_addAddressBook')}}",
		type: "POST",
		data: '&customer_id='+customer_id,
		success: function (data) {
			// console.log(data);
			$('#addressDialog').html(data); 
			$('#addressDialog').modal('show');
		},
		dataType: 'html'
	});
});

//editAddressModal
$(document).on('click', '.editAddressModal', function(){
	var customer_id = $(this).attr('customer_id');
	var id = $(this).attr('id');
	console.log('customer_id  : ' + customer_id );
	console.log('id  : ' + id );

	$.ajax({
		url: "{{ URL::to('admin/view_editAddressBook')}}",
		type: "POST",
		data: '&customer_id='+customer_id+'&id='+id,
		success: function (data) {
			// console.log(JSON.stringify(data));
			console.log(data);
			// $('.editContent').html(data); 
			// $('#editAddressModal').modal('show');
			$('#addressDialog').html(data); 
			$('#addressDialog').modal('show');
		},
		dataType: 'html'
	});
});
	
	
		
//editproductattributemodal
$(document).on('click', '.editproductattributemodal', function(){
	var products_id = $(this).attr('products_id');
	var products_attributes_id = $(this).attr('products_attributes_id');
	var language_id = $(this).attr('language_id');	
	var options_id = $(this).attr('options_id');
	$.ajax({
		url: '{{ URL::to("admin/editproductattribute")}}',
		type: "POST",
		data: '&products_id='+products_id+'&products_attributes_id='+products_attributes_id+'&language_id='+language_id+'&options_id='+options_id,
		success: function (data) {
			$('.editContent').html(data); 
			$('#editproductattributemodal').modal('show');
		},
		dataType: 'html'
	});
});

//editdefaultattributemodal
$(document).on('click', '.editdefaultattributemodal', function(){
	var products_id = $(this).attr('products_id');
	var products_attributes_id = $(this).attr('products_attributes_id');
	var language_id = $(this).attr('language_id');
	var options_id = $(this).attr('options_id');
	$.ajax({
		url: "{{ URL::to('admin/editdefaultattribute')}}",
		type: "POST",
		data: '&products_id='+products_id+'&products_attributes_id='+products_attributes_id+'&language_id='+language_id+'&options_id='+options_id,
		success: function (data) {
			$('.editDefaultContent').html(data); 
			$('#editdefaultattributemodal').modal('show');
		},
		dataType: 'html'
	});
});

//udpate address
$(document).on('click', '#updateAddress', function(e){
		$("#loader").show();
		var formData = $('#editAddressFrom').serialize();
		$.ajax({
			url: "{{ URL::to('admin/updateAddress')}}",
			type: "POST",
			data: formData,
			success: function (res) {
				
				if(res.length != ''){
					$('.addError').hide();
					$('#editAddressModal').modal('hide');
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
					
					var j = i + 1;
					showData[i] = "<tr><td>"+j+"</td><td><strong>Company:</strong> "+res[i].entry_company+"<br><strong>First Name:</strong> "+res[i].entry_firstname+"<br><strong>Last Name:</strong> "+res[i].entry_lastname+"</td><td><strong>Street:</strong> "+res[i].entry_street_address+"<br><strong>Suburb:</strong> "+res[i].entry_suburb+"<br><strong>Postcode:</strong> "+res[i].entry_postcode+"<br><strong>City:</strong> "+res[i].entry_city+"<br><strong>State:</strong> "+res[i].entry_state+"<br><strong>Zone:</strong> "+res[i].zone_name+"<br><strong>Country:</strong> "+res[i].countries_name+"</td><td><a class='badge bg-light-blue editAddressModal' customers_id = '"+res[i].customers_id+"' address_book_id = '"+res[i].address_book_id+"' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a><a customers_id = '"+res[i].customers_id+"' address_book_id = '"+res[i].address_book_id+"' class='badge bg-red deleteAddressModal'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>"; 

					}
					$(".contentAttribute").html(showData);
					
				}else{
					$('.addError').show();
				}


			},
		});
		
	});
	
	
	$(document).on('click', '#updateDefaultAttribute', function(e){
		$("#loader").show();
		var formData = $('#editDefaultAttributeFrom').serialize();
		$.ajax({
			url: "{{ URL::to('admin/updatedefaultattribute')}}",
			type: "POST",
			data: formData,
			success: function (res) {
				
				if(res.length != ''){
					$('.addError').hide();
					$('#editdefaultattributemodal').modal('hide');
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
						var j = i + 1;
						showData[i] = "<tr><td>"+j+"</td><td>"+res[i].products_options_name+"</td><td>"+res[i].products_options_values_name+"</td><td><a class='badge bg-light-blue editdefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"' products_id = '"+res[i].products_id+"' language_id ='"+res[i].language_id+"' options_id ='"+res[i].options_id+"'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a class='badge bg-red deletedefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"' products_id = '"+res[i].products_id+"' ><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";
					}
					$(".contentDefaultAttribute").html(showData);
				}else{
					$('.addError').show();
				}


			},
		});
		
	});
	
	
	//deleteAddressModal
	$(document).on('click', '#deleteSliderId', function(){
		var sliders_id = $(this).attr('sliders_id');
		$('#sliders_id').val(sliders_id);
		$('#deleteSliderModal').modal('show');
	});
	
	//deleteAddressModal
	$(document).on('click', '.deleteAddressModal', function(){
		var customer_id = $(this).attr('customer_id');
		var id = $(this).attr('id');
		console.log('customer_id : ' + customer_id)
		console.log('id : ' + id)

		$('#delete_customer_id').val(customer_id);
		$('#delete_id').val(id);
		$('#deleteAddressModal').modal('show');
	});
		

	//deletedefaultattributemodal
	$(document).on('click', '.deletedefaultattributemodal', function(){
		var products_id = $(this).attr('products_id');
		var products_attributes_id = $(this).attr('products_attributes_id');
		$.ajax({
			url: "{{ URL::to('admin/deletedefaultattributemodal')}}",
			type: "POST",
			data: '&products_id='+products_id+'&products_attributes_id='+products_attributes_id,
			success: function (data) {
				$('.deleteDefaultEmbed').html(data); 
				$('#deletedefaultattributemodal').modal('show');
			},
			dataType: 'html'
		});
	});
	
	//deleteOption
	$(document).on('click', '.deleteOption', function(){
		$("#loader").show();
		var option_id = $(this).attr('option_id');
		$.ajax({
			url: "{{ URL::to('admin/checkattributeassociate')}}",
			type: "POST",
			data: '&option_id='+option_id,
			success: function (res) {
				if(res.length != ''){
					$('.addError').hide();
					$("#assciate-products").html(res);
					$('#productListModal').modal('show');
				}else{
					$('#option_id').val(option_id);
					$('#productListModal').modal('hide');
					$('#deleteattributeModal').modal('show');
					$(".contentAttribute").html(res);
				}
			},
		});
	});
	
	// delete-value
	$(document).on('click', '.delete-value', function(){
		$("#loader").show();
		var value_id = $(this).attr('value_id');
		var delete_products_options_id = $(this).attr('option_id');
		var delete_language_id = $(this).attr('language_id');
		//alert(delete_language_id);
		$.ajax({
			url: "{{ URL::to('admin/checkvalueassociate')}}",
			type: "POST",
			data: '&value_id='+value_id,
			success: function (res) {
				//$('.deleteEmbed').html(res); 
				//alert(res);
				if(res.length != ''){
					$('.addError').hide();
					$("#assciate-products-value").html(res);
					$('#productListModalValue').modal('show');
				}else{
					$('#value_id').val(value_id);
					$('#delete_products_options_id').val(delete_products_options_id);
					$('#delete_language_id').val(delete_language_id);
					$('#productListModalValue').modal('hide');
					$('#deleteValueModal').modal('show');
					$(".contentAttribute").html(res);
				}
			},
		});
	});
	
	//deletedefaultattributemodal
	$(document).on('click', '#deleteDefaultAttribute', function(){
		$("#loader").show();
		var formData = $('#deletedefaultattributeform').serialize();
		console.log(formData);
		$.ajax({
			url: "{{ URL::to('admin/deletedefaultattribute')}}",
			type: "POST",
			data: formData,
			success: function (res) {
				//$('.deleteEmbed').html(res); 
				//alert(res);
				if(res.length != ''){
					$('.addError').hide();
					$('#deletedefaultattributemodal').modal('hide');
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
						var j = i + 1;
						showData[i] = "<tr><td>"+j+"</td><td>"+res[i].products_options_name+"</td><td>"+res[i].products_options_values_name+"</td><td><a class='badge bg-light-blue editdefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"'  products_id = '"+res[i].products_id+"' language_id ='"+res[i].language_id+"' options_id ='"+res[i].options_id+"'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a class='badge bg-red deletedefaultattributemodal' products_attributes_id = '"+res[i].products_attributes_id+"' products_id = '"+res[i].products_id+"' ><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>"; 
					}
					
					$(".contentDefaultAttribute").html(showData);
				}else{
					
					$('#deletedefaultattributemodal').modal('hide');
					$('.addDefaultError').show();
					$(".contentDefaultAttribute").html(res);
				}
			},
		});
	});
		
	//ajax call for submit value
	$(document).on('click', '#addImage', function(e){
		$("#loader").show();
		var formData = new FormData($('#addImageFrom')[0]);
		$.ajax({
			url: '{{ URL::to("admin/addnewproductimage")}}',
			type: "POST",
			data: formData,
			success: function (res) {
				if(res.length != ''){
					$('.addError').hide();
					$('#addImagesModal').modal('hide');
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
						var j = i + 1;
						showData[i] = "<tr><td>"+j+"</td><td><img src={{asset('').'/'}}"+res[i].image+" alt='' width=' 100px'></td><td>"+res[i].htmlcontent+"</td> <td><a products_id = '"+res[i].products_id+"' class='badge bg-light-blue editProductImagesModal' id = '"+res[i].id+"' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a class='badge bg-red deleteProductImagesModal' id = '"+res[i].id+"' products_id = '"+res[i].products_id+"' ><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>"; 
					}
					$(".contentImages").html(showData);
				}else{
					$('.addError').show();
				}


			},
			cache: false,
			contentType: false,
			processData: false
		});
		
		
	});
	
	//website_themes
	$(document).on('click', '.website_themes', function(){
		//$('.applied_message').attr('hidden','hidden');
		var theme_id = $(this).val();
		$.ajax({
			url: '{{ URL::to("admin/updateWebTheme")}}',
			type: "POST",
			data: '&theme_id='+theme_id,
			success: function (data) {
				if(data=='success'){
					$('.applied_message').removeAttr('hidden');
				}
			},
			dataType: 'html'
		});
	});
	
	
	//editproductimagesmodal
	$(document).on('click', '.editProductImagesModal', function(){
		var id = $(this).attr('id');
		var products_id = $(this).attr('products_id');
		$.ajax({
			url: '{{ URL::to("admin/editproductimage")}}',
			type: "POST",
			data: '&products_id='+products_id+'&id='+id,
			success: function (data) {
				$('.editImageContent').html(data); 
				$('#editProductImagesModal').modal('show');
			},
			dataType: 'html'
		});
	});
	
		
	$(document).on('click', '#updateProductImage', function(e){
		$("#loader").show();
		var formData = new FormData($('#editImageFrom')[0]);
		$.ajax({
			url: "{{ URL::to('admin/updateproductimage')}}",
			type: "POST",
			data: formData,
			success: function (res) {
				if(res.length != ''){
					$('.addError').hide();
					$('#editProductImagesModal').modal('hide');
					var i;
					var showData = [];
					for (i = 0; i < res.length; ++i) {
						var j = i + 1;
						showData[i] = "<tr><td>"+j+"</td><td><img src={{asset('').'/'}}"+res[i].image+" alt='' width=' 100px'></td><td>"+res[i].htmlcontent+"</td> <td><a products_id = '"+res[i].products_id+"' class='badge bg-light-blue editProductImagesModal' id = '"+res[i].id+"' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a class='badge bg-red deleteProductImagesModal' id = '"+res[i].id+"' products_id = '"+res[i].products_id+"' ><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";

					}
					$(".contentImages").html(showData);
				}else{
					$('.addError').show();
				}


			},
			cache: false,
			contentType: false,
			processData: false
		});
		
	});	
		
	$("#sendNotificaionForm").submit(function(){
		$('.not-sent').addClass('hide');
		$('.sent-push').addClass('hide');
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url: "{{ URL::to('admin/notifyUser')}}",
			type: "POST",
			data: formData,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			success: function (res) {
				$('.sent-push').addClass('hide');
				$('.not-sent').addClass('hide');
				if($.trim(res) == '1'){
					$('.sent-push').removeClass('hide');
				}else{
					$('.not-sent').removeClass('hide');
				}
			},
		});
		
		return false;
			
	});
	
	//send-notificaion
	$(document).on('click', '#single-notificaion', function(){
		$('.not-sent').addClass('hide');
		$('.sent-push').addClass('hide');
		var formData = new FormData($('#sendNotificaionForm')[0]);
		
		$.ajax({
			url: "{{ URL::to('admin/notifyUser')}}",
			type: "POST",
			data: formData,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			success: function (res) {
				$('.sent-push').addClass('hide');
				$('.not-sent').addClass('hide');
				if($.trim(res) == '1'){
					$('.sent-push').removeClass('hide');
				}else{
					$('.not-sent').removeClass('hide');
				}
			},
		});
		
		return false;
			
	});
	
		
	//send push Notification
	$(document).on('click', '#sendd-notificaion', function(){
		$('.not-sent').addClass('hide');
		$('.sent-push').addClass('hide');
		var title = $('#title').val();
		var message = $('#message').val();
		
		var form = $('#sendNotificaionForm')[0]; // You need to use standard javascript object here
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url: "{{ URL::to('admin/notifyUser')}}",
			type: "POST",
			data: formData,
			//contentType: true,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			success: function (res) {
				$('.sent-push').addClass('hide');
				$('.not-sent').addClass('hide');
				if($.trim(res) == '1'){
					$('.sent-push').removeClass('hide');
				}else{
					$('.not-sent').removeClass('hide');
				}
			},
		});
				
	});

	//deleteProductImageModal
	$(document).on('click', '.deleteProductImageModal', function(){
		var product_id = $(this).attr('product_id');
		var product_image_id = $(this).attr('product_image_id');
		console.log('product_id : ' + product_id);
		console.log('product_image_id : ' + product_image_id);
		$('#delete_product_id').val(product_id);
		$('#delete_product_image_id').val(product_image_id);
		$("#deleteProductImageModal").modal('show');
	});
	
	//ajax call for notification pop
	$(document).on('click', '#notification-popup', function(){
		var customers_id = $(this).attr('customers_id');
		$.ajax({
			url: '{{ URL::to("admin/customerNotification")}}',
			type: "POST",
			data: '&customers_id='+customers_id,
			success: function (data) {
				$('.notificationContent').html(data); 
				$('#notificationModal').modal('show');
			},
			dataType: 'html'
		});
	});
	
	//get products for coupon
	$(document).on('focus', '.couponProdcuts input', function(){
		var products = $(this).attr('products_id');
		$.ajax({
			url: "{{URL::to('admin/couponProducts')}}",
			type: "POST",
			data: '',
			success: function (data) {
			},
			dataType: 'html'
		});
	});
	
	//call function on window load
	@if(Request::path() == 'admin/editproduct/*')
		getSubCategory();
	@endif
	//special product
	showSpecial();
			
	//deleteproductmodal
	$(document).on('click', '#deleteProductId', function(){
		var product_id = $(this).attr('product_id');
		$('#product_id').val(product_id);
		$("#deleteProductModal").modal('show');
	});
		
	//deleteCustomerModal
	$(document).on('click', '#deleteCustomerFrom', function(){
		var customer_id = $(this).attr('customer_id');
		$('#delete_customer_id').val(customer_id);
		$("#deleteCustomerModal").modal('show');
	});

	//deleteUserModal
	$(document).on('click', '#deleteUserFrom', function(){
		var user_id = $(this).attr('user_id');
		$('#delete_user_id').val(user_id);
		$("#deleteUserModal").modal('show');
	});

	//deleteUserModal
	$(document).on('click', '#deleteCompanyFrom', function(){
		var company_id = $(this).attr('company_id');
		$('#delete_company_id').val(company_id);
		$("#deleteCompanyModal").modal('show');
	});
	
	//manufacturerModal
	$(document).on('click', '#manufacturerFrom', function(){
		var manufacturers_id = $(this).attr('manufacturers_id');
		$('#manufacturers_id').val(manufacturers_id);
		$("#manufacturerModal").modal('show');
	});
	
	//deleteManufacturerModal
	$(document).on('click', '#deleteManufacturerId', function(){
		var manufacturer_id = $(this).attr('manufacturer_id');
		console.log('deleteManufacturerModal : ' + manufacturer_id);
		$('#manufacturer_id').val(manufacturer_id);
		$("#deleteManufacturerModal").modal('show');
	});

	//deleteOrderProduct
	$(document).on('click', '#deleteOrderProductbtn', function(){
		var order_product_id = $(this).attr('order_product_id');
		var order_id = $(this).attr('order_id');
		console.log('order_id : ' + order_id);
		console.log('order_product_id : ' + order_product_id);

		$('#delete_order_id').val(order_id);
		$('#order_product_id').val(order_product_id);
		$("#deleteOrderProduct").modal('show');
	});

	//deleteProductOptionValueModal
	$(document).on('click', '#deleteProductOptionValueId', function(){
		var product_option_value_id = $(this).attr('product_option_value_id');
		console.log('product_option_value_id : ' + product_option_value_id);
		$('#product_option_value_id').val(product_option_value_id);
		$("#deleteProductOptionValueModal").modal('show');
	});

	//deleteProductOptionModal
	$(document).on('click', '#deleteProductOptionId', function(){
		var product_option_id = $(this).attr('product_option_id');
		console.log('product_option_id : ' + product_option_id);
		$('#product_option_id').val(product_option_id);
		$("#deleteProductOptionModal").modal('show');
	});
	
	//deleteCountrytModal
	$(document).on('click', '#deleteCategoryId', function(){
		var category_id = $(this).attr('category_id');
		console.log('deleteCategoryModal : ' + category_id);
		$('#category_id').val(category_id);
		$("#deleteCategoryModal").modal('show');
	});
	//deleteCountrytModal
	$(document).on('click', '#deleteSubCategoryId', function(){
		var sub_category_id = $(this).attr('sub_category_id');
		console.log('deleteSubCategoryModal : ' + sub_category_id);
		$('#sub_category_id').val(sub_category_id);
		$("#deleteSubCategoryModal").modal('show');
	});
	//deleteCountrytModal
	$(document).on('click', '#deleteCountryId', function(){
		var countries_id = $(this).attr('countries_id');
		$('#countries_id').val(countries_id);
		$("#deleteCountryModal").modal('show');
	});
	//deleteCityModel
	$(document).on('click', '#deleteCityId', function(){
		var cities_id = $(this).attr('cities_id');
		$('#cities_id').val(cities_id);
		$("#deleteCityModal").modal('show');
	});
	// deleteAreaModal
	$(document).on('click', '#deleteAreaId', function(){
		var area_id = $(this).attr('area_id');
		$('#area_id').val(area_id);
		$("#deleteAreaModal").modal('show');
	});

	//deleteDistrictModal
	$(document).on('click', '#deleteDistrictId', function(){
		var district_id = $(this).attr('district_id');
		$('#district_id').val(district_id);
		$("#deleteDistrictModal").modal('show');
	});

	//deleteZoneModal
	$(document).on('click', '#deleteZoneId', function(){
		var zone_id = $(this).attr('zone_id');
		$('#zone_id').val(zone_id);
		$("#deleteZoneModal").modal('show');
	});
	
	//deleteTaxClassModal
	$(document).on('click', '#deleteTaxClassId', function(){
		var tax_class_id = $(this).attr('tax_class_id');
		$('#tax_class_id').val(tax_class_id);
		$("#deleteTaxClassModal").modal('show');
	});
	
	//deleteTaxRateModal
	$(document).on('click', '#deleteTaxRateId', function(){
		var tax_rates_id = $(this).attr('tax_rates_id');
		$('#tax_rates_id').val(tax_rates_id);
		$("#deleteTaxRateModal").modal('show');
	});
	
	//deleteOrderStatusModal
	$(document).on('click', '#deleteOrderStatusId', function(){
		var orders_status_id = $(this).attr('orders_status_id');
		$('#orders_status_id').val(orders_status_id);
		$("#deleteOrderStatusModal").modal('show');
	});
	
	
	//deletelanguageModal
	$(document).on('click', '#deleteLanguageId', function(){
		var languages_id = $(this).attr('languages_id');
		$('#languages_id').val(languages_id);
		$("#deleteLanguagesModal").modal('show');
	});
	
	//deleteTaxRateModal
	$(document).on('click', '#deleteCoupans_id', function(){
		var coupans_id = $(this).attr('coupans_id');
		$('#coupans_id').val(coupans_id);
		$("#deleteCoupanModal").modal('show');
	});
	
	//deleteTaxClassModal
	$(document).on('click', '#deleteBannerId', function(){
		var banners_id = $(this).attr('banners_id');
		$('#banners_id').val(banners_id);
		$("#deleteBannerModal").modal('show');
	});
	
	//deleteNewsCategoryModal
	$(document).on('click', '#deleteNewsCategroyId', function(){
		var id = $(this).attr('category_id');
		$('#id').val(id);
		$("#deleteNewsCategoryModal").modal('show');
	});
	
	//deleteNewsModal
	$(document).on('click', '#deleteNewsId', function(){
		var id = $(this).attr('news_id');
		$('#id').val(id);
		$("#deleteNewsModal").modal('show');
	});
	
	//deletePageModal
	$(document).on('click', '#deletePageId', function(){
		var id = $(this).attr('page_id');
		$('#id').val(id);
		$("#deletePageModal").modal('show');
	});
	
	//deleteOrderModal
	$(document).on('click', '#deleteOrderId', function(){
		var order_id = $(this).attr('order_id');
		$('#order_id').val(order_id);
		$("#deleteOrderModal").modal('show');
	});
	
	
	//edit option value
	$(document).on('click', '.edit-value', function(){
		var value = $(this).attr('value');
		$(".form-p-"+value).hide();
		$(".form-content-"+value).show();
	});
	
	//cancel option value
	$(document).on('click', '.cancel-value', function(){
		var value = $(this).attr('value');
		$(".form-content-"+value).hide();
		$(".form-p-"+value).show();
	});
	
	//deleteUnitModal
	$(document).on('click', '#deleteUnitsId', function(){
		var unit_id = $(this).attr('unit_id');
		$('#unit_id').val(unit_id);
		$("#deleteUnitModal").modal('show');
	});
	 
	//getRange
	$(document).on('click', '.getRange', function(){
		var dateRange = $('.dateRange').val();
		if(dateRange != ''){
			$('.dateRange').parent('.input-group').removeClass('has-error');
			dateRange = dateRange.replace(/-/g , "_");
			dateRange = dateRange.replace(/\//g , "-");
			dateRange = dateRange.replace(/ /g , "");
			window.location="{{URL::to('admin/dashboard/dateRange=')}}"+dateRange;
		}else{
			$('.dateRange').parent('.input-group').addClass('has-error');
		}
	});
	
	//default_method
	$(document).on('click', '.default_method', function(){
		var shipping_id = $(this).attr('shipping_id');
		$.ajax({
			url: '{{ URL::to("admin/defaultShippingMethod")}}',
			type: "POST",
			data: '&shipping_id='+shipping_id,
			success: function (data) {
				$('.default-div').removeClass('hidden');
			},
		});
	});
	
	//product options language
	$(document).on('change', '.language_id', function(){
		var language_id = $(this).val();
		getOptions(language_id);
	});
	
	//product options option with language id
	$(document).on('change', '.default-option-id', function(){
		var option_id = $(this).val();
		getOptionsValue(option_id);
	});
	
	//product options language
	$(document).on('change', '.edit_language_id', function(){
		var language_id = $(this).val();
		getEditOptions(language_id);
	});
	
	//product options option with language id
	$(document).on('change', '.edit-default-option-id', function(){
		var option_id = $(this).val();
		getEditOptionsValue(option_id);
	});
	
	//product options language
	$(document).on('change', '.additional_language_id', function(){
		var language_id = $(this).val();
		getAdditionalOptions(language_id);
	});
	
	//product options option with language id
	$(document).on('change', '.additional-option-id', function(){
		var option_id = $(this).val();
		getAdditionalOptionsValue(option_id);
	});
	
	//product options language
	$(document).on('change', '.edit_additional_language_id', function(){
		var language_id = $(this).val();
		getEditAdditionalOptions(language_id);
	});
	
	//product options option with language id
	$(document).on('change', '.edit-additional-option-id', function(){
		var option_id = $(this).val();
		getEditAdditionalOptionsValue(option_id);
	});
	
	
	//default_language
	$(document).on('click', '.default_language', function(){
		var languages_id = $(this).val();
		$.ajax({
			url: '{{ URL::to("admin/defaultLanguage")}}',
			type: "POST",
			data: '&languages_id='+languages_id,
			success: function (data) {
				location.reload(); 
			},
		});
	});
	
	
});
	
function getOptions(languages_id) {
	$.ajax({
		url: '{{ URL::to("admin/getOptions")}}',
		type: "POST",
		data: '&languages_id='+languages_id,
		success: function (data) {
			$('.default-option-id').html(data);
		},
	});
}

	
function getOptionsValue(option_id) {
	var language_id = $('.language_id').val();
	$.ajax({
		url: '{{ URL::to("admin/getOptionsValue")}}',
		type: "POST",
		data: '&option_id='+option_id+'&language_id='+language_id,
		success: function (data) {
			$('.products_options_values_id').html(data);
		},
	});
}

function getEditOptions(languages_id) {
	$.ajax({
		url: '{{ URL::to("admin/getOptions")}}',
		type: "POST",
		data: '&languages_id='+languages_id,
		success: function (data) {
			$('.edit-default-option-id').html(data);
		},
	});
}

	
function getEditOptionsValue(option_id) {
	
	var language_id = $('.edit_language_id').val();
	$.ajax({
		url: '{{ URL::to("admin/getOptionsValue")}}',
		type: "POST",
		data: '&option_id='+option_id+'&language_id='+language_id,
		success: function (data) {
			$('.edit-products_options_values_id').html(data);
		},
	});
}

function getAdditionalOptions(languages_id) {
	$.ajax({
		url: '{{ URL::to("admin/getOptions")}}',
		type: "POST",
		data: '&languages_id='+languages_id,
		success: function (data) {
			$('.additional-option-id').html(data);
		},
	});
}

	
function getAdditionalOptionsValue(option_id) {
	
	var language_id = $('.additional_language_id').val();
	$.ajax({
		url: '{{ URL::to("admin/getOptionsValue")}}',
		type: "POST",
		data: '&option_id='+option_id+'&language_id='+language_id,
		success: function (data) {
			$('.additional_products_options_values_id').html(data);
		},
	});
}

function getEditAdditionalOptions(languages_id) {
	$.ajax({
		url: '{{ URL::to("admin/getOptions")}}',
		type: "POST",
		data: '&languages_id='+languages_id,
		success: function (data) {
			$('.edit-additional-option-id').html(data);
		},
	});
}

	
function getEditAdditionalOptionsValue(option_id) {
	
	var language_id = $('.edit_additional_language_id').val();
	$.ajax({
		url: '{{ URL::to("admin/getOptionsValue")}}',
		type: "POST",
		data: '&option_id='+option_id+'&language_id='+language_id,
		success: function (data) {
			$('.edit-additional-products_options_values_id').html(data);
		},
	});
}





//getSubCategory
function getSubCategory() {
	/*
	@if(Request::path() == 'admin/addProduct')
	 	var getCategories =	'{{ URL::to("admin/getajaxcategories")}}';
	 
	@else*/
		var getCategories = '{{ URL::to("admin/getajaxcategories")}}';
	/*@endif*/
	
	var category_id = $('#category_id').val();
	if(category_id != ''){
		$.ajax({
			url: getCategories,
			type: "POST",
			data: '&category_id='+category_id,
			success: function (data) {
				if(data.length != ''){
					var i;
					var showData = [];
					for (i = 0; i < data.length; ++i) {
						showData[i] = "<option value='"+data[i].id+"'>"+data[i].name+"</option>";
					}
					$("#sub_category_id").html(showData);
				}else{
					$("#sub_category_id").html("<option value=''>Please Select</option>");
				}
			},
		});
	}
}

//showSpecial
function showSpecial() {
	if($('#special_status').val() == 'active'){
		$(".special-container").show();
		$(".special-container input#expiry_date").addClass("field-validate");
		$(".special-container input#special_price").addClass("number-validate");
		
	}else{
		$(".special-container").hide();
		$(".special-container input#expiry_date").removeClass("field-validate");
		$(".special-container input#special_price").removeClass("number-validate");
	}
}

	
$(function () {
	$('.datepicker').datepicker({
	  autoclose: true,
	  format: 'yyyy-mm-dd'
	});

});


function banner_type(){
	var type = $(this).val();
	if(type=='category'){
		$('.categoryContent').show();
		$('.productContent').hide();
	}else if(type=='product'){
		$('.categoryContent').hide();
		$('.productContent').show();
	}else{
		$('.categoryContent').hide();
		$('.productContent').hide();	
	}
}
$(document).on('change','.choseOption',function(){
	
	var content = $(this).attr('content');
	var choseOption = $(this).val();
	console.log(choseOption);
	
	if(choseOption == 'new'){
		$('.field-validate_'+content).addClass('field-validate');
		$('.newAttribute_'+content).show();
		$('.oldAttribute_'+content).hide();
	}else if(choseOption == 'old'){	
		$('.field-validate_'+content).removeClass('field-validate');
		$('.newAttribute_'+content).hide();
		$('.oldAttribute_'+content).show();
	}
	
});


$(document).on('change', '#bannerType', function(e){
	var type = $(this).val();
	if(type=='category'){
		$('.categoryContent').show();
		$('.productContent').hide();
	}else if(type=='product'){
		$('.categoryContent').hide();
		$('.productContent').show();
	}else{
		$('.categoryContent').hide();
		$('.productContent').hide();	
	}
	
});


$(document).on('click', '.notifyTo', function(e){
	
	if($(this).is(':checked')){
		$('.device_id > input').attr('disabled', true);
	}else{
		$('.device_id > input').removeAttr('disabled');
	}
});


//validate form
$(document).on('submit', '.form-validate', function(e){
	var error = "";
	
	//to validate text field
	$(".field-validate").each(function() {
		
		if(this.value == '') {
			$(this).closest(".form-group").addClass('has-error');
			//$(this).next(".error-content").removeClass('hidden');
			error = "has error";
		}else{
			$(this).closest(".form-group").removeClass('has-error');
			//$(this).next(".error-content").addClass('hidden');
		}
	});
	
	$(".number-validate").each(function() {
		if(this.value == '' || isNaN(this.value)) {
			$(this).closest(".form-group").addClass('has-error');
			//$(this).next(".error-content").removeClass('hidden');
			error = "has error";
		}else{
			$(this).closest(".form-group").removeClass('has-error');
			//$(this).next(".error-content").addClass('hidden');
		}
	});
	
	//
	$(".email-validate").each(function() {
		var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		if(this.value != '' && validEmail.test(this.value)) {
			$(this).closest(".form-group").removeClass('has-error');
			//$(this).next(".error-content").addClass('hidden');
			
		}else{
			$(this).closest(".form-group").addClass('has-error');
			//$(this).next(".error-content").removeClass('hidden');
			error = "has error";
		}
	});
	
	if(error=="has error"){
    	return false;
	}
	
});

//focus form field
$(document).on('keyup change', '.field-validate', function(e){
	
	if(this.value == '') {
		$(this).closest(".form-group").addClass('has-error');
		//$(this).next(".error-content").removeClass('hidden');
	}else{
		$(this).closest(".form-group").removeClass('has-error');
		//$(this).next(".error-content").addClass('hidden');
	}
	
});

//focus form field
$(document).on('keyup', '.number-validate', function(e){
	
	if(this.value == '' || isNaN(this.value)) {
		$(this).closest(".form-group").addClass('has-error');
		//$(this).next(".error-content").removeClass('hidden');
	}else{
		$(this).closest(".form-group").removeClass('has-error');
		//$(this).next(".error-content").addClass('hidden');
	}
	
});

$(document).on('keyup focusout', '.email-validate', function(e){
	var validEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if(this.value != '' && validEmail.test(this.value)) {
		$(this).closest(".form-group").removeClass('has-error');
		//$(this).next(".error-content").addClass('hidden');
		
	}else{
		$(this).closest(".form-group").addClass('has-error');
		//$(this).next(".error-content").removeClass('hidden');
		error = "has error";
	}
});

//change default notifcation 
$(document).on('change', '#default_notification', function(e){
	var value = $(this).val();
	if(value=='fcm'){
		$('.onesignal_content').hide();
		$('.fcm_content').show();
	}else if(value=='onesignal'){
		$('.fcm_content').hide();
		$('.onesignal_content').show();
		
	}
});


//ajax call for submit value
$(document).on('click', '#generate-key', function(e){
	$("#loader").show();
	$('#generateSuccessfully').attr('hidden', 'hidden')
	$.ajax({
		url: '{{ URL::to("admin/generateKey")}}',
		type: "GET",
		async: false,
		success: function (res) {
			$("#loader").hide();
			$('#generateSuccessfully').removeAttr('hidden');
			$('#consumer_key').val(res.consumerKey);				
			$("#consumer_secret").val(res.consumerSecret);
		},
	});
});

//show password div
	function validatePasswordForm(){
		var password = document.forms["updateAdminPassword"]["password"].value;
		var re_password = document.forms["updateAdminPassword"]["re_password"].value;
		var err = '';
		if (password == null || password == "" || password.length < 6) {
			  $('#password').closest('.col-sm-10').addClass('has-error');
			  $('#password').focus();
			  err = "Password must be filled and of more than 6 characters! \n";
			  $('#password').next('.error-content').html(err).show();
			  return false;
		}else{
			 $('#password').closest('.col-sm-10').removeClass('has-error');
			 $('#password').next('.error-content').hide();
			 
			  if (re_password == null || re_password == '' ) {
					 err  = "Please re enter password! \n";
					 document.getElementById("re_password").focus();
					 $('#re_password').parent('.col-sm-10').addClass('has-error');
					 $('#re_password').next('.error-content').html(err).show();
					 return false;
			 }else{
				 if (re_password != password) {
					 err  = "Both passwords must be matched! \n";
					 document.getElementById("re_password").focus()
					 $('#re_password').parent('.col-sm-10').addClass('has-error');
					 $('#re_password').next('.error-content').html(err).show();
					return false;
				 }else{
					return true;
				
				}
			 }
		}
}

$(document).on('click','#change-passowrd', function(){
	if($(this).is(':checked')){
		$('#password').addClass('field-validate');
	}else{
		$('#password').parents('div.form-group').removeClass('has-error');
		$('#password').removeClass('field-validate');
	}
});


	
</script>