function testing(){
    console.log("testing");
}

// Order part_customer_address
$(document).on('click', '.part_customer_address', function(){
	$('#dialog_customer_address').modal('show');
});

function customer_change(phone,email){
    // $("#customer_address_id").attr('disabled', false);
    $("#customer_telephone").attr('disabled', false);
    $("#email").attr('disabled', false);

    $('#customer_telephone').val(phone);
    $('#email').val(email);

    $('#customer_company').val("");
    $('#customer_street_address').val("");
}

function address_change(company_name,address){
    $('#customer_company').val(company_name);
    $('#customer_street_address').val(address);

}

$(function() {
    // $("#customer_id").change(function() {
    //     var customer_id = this.value;
    //     $.ajax({
    //         type: "GET",
    //         url: "/admin/admin/findAddressByCustomerId/"+customer_id,
    //         // data: {customer_id:customer_id},
    //         success: function( bolUpdated ) { 
    //             if( bolUpdated ) { 
    //                 alert('OK');
    //             }   
    //         },  
    //         fail: function() {
    //             alert('NO');
    //         }   
    //     });
    // });

    $("#customer_id").change(function() {
        var customer_id = this.value;
        var phone = $('option:selected', this).attr('phone');
        var email = $('option:selected', this).attr('email');
        customer_change(phone,email);
        $.ajax({
            type: "POST",
            url: "/admin/admin/findAddressByCustomerId",
            data: {customer_id:customer_id},
            success: function(msg) { 
                // console.log("msg : " + JSON.stringify(msg));
                if(msg) { 
                    $("#customer_address_id").attr('disabled', false);
                    $('#customer_company').val("");
                    $('#customer_street_address').val("");

                    $("#customer_address_id")
                    .find('option')
                    .remove()
                    .end()
                    msg.forEach(element => {
                        var address_id = element.id
                        var company = element.company
                        var address_ch = element.address_ch
                        var address_en = element.address_en
                        var is_default = element.is_default
         
                        if(is_default == 'active'){
                            $('#customer_address_id')
                            .append($('<option>')
                            .val(address_id)
                            .text(address_ch)
                            .attr("company_name", company)
                            .attr("address_ch", address_ch)
                            .attr("selected", "selected"));
                            
                            $("#customer_company").attr('disabled', false);
                            $("#customer_street_address").attr('disabled', false);
                            $('#customer_company').val(company);
                            $('#customer_street_address').val(address_ch);
                        }else {
                            $('#customer_address_id')
                            .append($('<option>')
                            .val(address_id)
                            .text(address_ch)
                            .attr("company_name", company)
                            .attr("address_ch", address_ch));
                        }
                    });

                }   
            },  
            fail: function(msg) {
                alert('NO');
            }   
        });
    });

    $("#customer_address_id").change(function() {
        var address_id = this.value;
        var company_name = $('option:selected', this).attr('company_name');
        var address_ch = $('option:selected', this).attr('address_ch');
        $('#customer_company').val(company_name);
        $('#customer_street_address').val(address_ch);
    });
    
    $("#addCustomer").click(function(){
        var is_pass = true;
        $('#form_customer_address *').filter(':input').each(function(){
            var id = $(this).attr('id');
            if(id){
                // console.log("id : " + id);
                // console.log("value : " + $(this).val());
                $( "#group_"+id ).removeClass( "has-error" );
                if($(this).hasClass('field-validate')){
                    if(!$(this).val()){
                        $( "#group_"+id ).addClass( "has-error" );
                        is_pass = false;
                    }
                }
            }            
        });
        if(is_pass){
            fill_customer_address();
        }
        
    });

    function fill_customer_address(){
        var customer_id = $("#customer_id").val();
        var customer_id_text = $("#customer_id option:selected").text();
        var customer_company = $("#customer_company").val();

        var customer_address_id = $("#customer_address_id").val();
        var customer_address_id_text = $("#customer_address_id option:selected").text();
        var customer_street_address = $("#customer_street_address").val();
        var customer_telephone = $("#customer_telephone").val();
        var email = $("#email").val();
        console.log("customer_address_id : " + customer_address_id);
        console.log("customer_address_id_text : " + customer_address_id_text);
        $("#add_customer_name").html(customer_id_text);
        $("#add_company_name").html(customer_company);
        $("#add_customer_street_address").html(customer_street_address);
        $("#add_customer_telephone").html(customer_telephone);
        $("#add_email").html(email);

    }
});

