function testing(){
    console.log("testing");
}

// Order part_customer_address
$(document).on('click', '.part_customer_address', function(){
	$('#dialog_customer_address').modal('show');
});

$(function() {
    $("#customer_id").change(function() {
        var customer_id = this.value;
        $.ajax({
            type: "GET",
            url: "/admin/admin/findAddressByCustomerId?customer_id=1",
            // data: {customer_id: customer_id},
            success: function( bolUpdated ) { 
                if( bolUpdated ) { 
                    alert('OK');
                }   
            },  
            fail: function() {
                alert('NO');
            }   
        });
    });

});

