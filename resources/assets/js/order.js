function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
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
                console.log("msg : " + JSON.stringify(msg));
                if(msg) { 
                    $("#customer_address_id").attr('disabled', false);
                    $("#customer_country").attr('disabled', false);
                    $("#customer_city").attr('disabled', false);
                    $("#customer_area").attr('disabled', false);
                    $("#customer_district").attr('disabled', false);
                    $("#customer_estate").attr('disabled', false);
                    $("#customer_building").attr('disabled', false);
                    $("#customer_room").attr('disabled', false);

                    $('#customer_company').val("");

                    $("#customer_address_id")
                    .find('option')
                    .remove()
                    .end()
                    msg.forEach(element => {
                        var address_id = element.id
                        var company = element.company
                        var country_name = element.country_name
                        var city_name = element.city_name
                        var area_name = element.area_name
                        var district_name = element.district_name
                        var estate = element.estate
                        var building = element.building
                        var room = element.room
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
                            .attr("customer_country", country_name)
                            .attr("customer_city", city_name)
                            .attr("customer_area", area_name)
                            .attr("customer_district", district_name)
                            .attr("customer_estate", estate)
                            .attr("customer_building", building)
                            .attr("customer_room", room)
                            .attr("selected", "selected"));
                            
                            $('#customer_street_address').val(address_ch);
                            $("#customer_company").attr('disabled', false);
                            $('#customer_company').val(company);
                            $('#customer_country').val(country_name);
                            $('#customer_city').val(city_name);
                            $('#customer_area').val(area_name);
                            $('#customer_district').val(district_name);
                            $('#customer_estate').val(estate);
                            $('#customer_building').val(building);
                            $('#customer_room').val(room);


                        }else {
                            $('#customer_address_id')
                            .append($('<option>')
                            .val(address_id)
                            .text(address_ch)
                            .attr("company_name", company)
                            .attr("address_ch", address_ch)
                            .attr("customer_country", country_name)
                            .attr("customer_city", city_name)
                            .attr("customer_area", area_name)
                            .attr("customer_district", district_name)
                            .attr("customer_estate", estate)
                            .attr("customer_building", building)
                            .attr("customer_room", room));
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
        var address_ch = $('option:selected', this).attr('address_ch');
        var company_name = $('option:selected', this).attr('company_name');
        var country_name = $('option:selected', this).attr('customer_country');
        var city_name = $('option:selected', this).attr('customer_city');
        var area_name = $('option:selected', this).attr('customer_area');
        var district_name = $('option:selected', this).attr('customer_district');
        var estate = $('option:selected', this).attr('customer_estate');
        var building = $('option:selected', this).attr('customer_building');
        var room = $('option:selected', this).attr('customer_room');
        $('#customer_company').val(company_name);
        $('#customer_country').val(country_name);
        $('#customer_city').val(city_name);
        $('#customer_area').val(area_name);
        $('#customer_district').val(district_name);
        $('#customer_estate').val(estate);
        $('#customer_building').val(building);
        $('#customer_room').val(room);
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
            $( ".close" ).click();
        }
        
    });

    $("#addShipping").click(function(){
        var is_pass = true;
        $('#form_shipping_address *').filter(':input').each(function(){
            var id = $(this).attr('id');
            if(id){
                console.log("id : " + id);
                console.log("value : " + $(this).val());
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
            fill_shipping_address();
            $( ".close" ).click();
        }
        
    });

    $("#add_Order").click(function(){
        var customer_address_obj = json_customer_address();
        var shipping_address_obj = json_shipping_address();

        var json = {
            customer_address_obj : customer_address_obj,
            shipping_address_obj : shipping_address_obj
        }

        $.ajax({
            type: "POST",
            url: "/admin/admin/createOrder",
            data: json,
            success: function(msg) { 
                console.log("msg : " + JSON.stringify(msg));
                if(msg) { 
  
                }   
            },  
            fail: function(msg) {
                alert('NO');
            }   
        });

        console.log("json : " + JSON.stringify(json));

    });

    function fill_customer_address(){
        var customer_id = $("#customer_id").val();
        var customer_id_text = $("#customer_id option:selected").text();
        var customer_company = $("#customer_company").val();
        var customer_address_id = $("#customer_address_id").val();
        var customer_street_address = $("#customer_street_address").val();

        var customer_telephone = $("#customer_telephone").val();
        var email = $("#email").val();
        $("#add_customer_name").html(customer_id_text);
        $("#add_company_name").html(customer_company);
        $("#add_customer_street_address").html(customer_street_address);
        $("#add_customer_telephone").html(customer_telephone);
        $("#add_email").html(email);

    }

    function fill_shipping_address(){
        var shipping_method = $("#shipping_method").val();
        var shipping_cost = $("#shipping_cost").val();
       
        console.log("shipping_method : " + shipping_method);
        console.log("shipping_cost : " + shipping_cost);
        $("#add_shipping_method").html(shipping_method);
        $("#add_shipping_cost").html(shipping_cost);

    }

    function json_customer_address(){
        var customer_id = $("#customer_id").val();
        var customer_id_text = $("#customer_id option:selected").text();
        var customer_company = $("#customer_company").val();
        var customer_address_id = $("#customer_address_id").val();
        var customer_street_address = $("#customer_street_address").val();

        var customer_country = $('#customer_country').val();
        var customer_city = $('#customer_city').val();
        var customer_area = $('#customer_area').val();
        var customer_district = $('#customer_district').val();
        var customer_estate = $('#customer_estate').val();
        var customer_building = $('#customer_building').val();
        var customer_room = $('#customer_room').val();

        var customer_telephone = $("#customer_telephone").val();
        var email = $("#email").val();

        var customer_address = {
                customer_id : customer_id,
                customer_name : customer_id_text,
                customer_company:customer_company,
                customer_address_id:customer_address_id,
                customer_street_address:customer_street_address,
                
                customer_street_address:customer_street_address,
                customer_country:customer_country,
                customer_city:customer_city,
                customer_area:customer_area,
                customer_district:customer_district,
                customer_estate:customer_estate,
                customer_building:customer_building,
                customer_room:customer_room,

                customer_telephone:customer_telephone,
                email:email};
        return customer_address;
        
    }

    function json_shipping_address(){
        var shipping_method = $("#shipping_method").val();
        var shipping_cost = $("#shipping_cost").val();
       
        var shipping_address = {
            shipping_method : shipping_method,
            shipping_cost : shipping_cost,
        }
        return shipping_address;

    }
});

