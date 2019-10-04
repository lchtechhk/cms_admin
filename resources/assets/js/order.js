function testing(){
    console.log("testing");
}

$(function() {
    console.log( "ready!" );
});

// Order part_customer_address
$(document).on('click', '.part_customer_address', function(){
	$('#dialog_customer_address').modal('show');
});
