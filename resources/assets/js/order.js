function purchase_date_change(date_purchased){
    $('#date_purchased').val(date_purchased);
}
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

function delete_item(count){
    var id = "#"+"item_"+count
    var display_count = count + 1;
    if(confirm('Are You Sure To Remove Item : '+display_count + '?')){
        $(id).remove();
    }
    console.log("id : " + id);
}
function calculate_final_price(count){
    var product_price = $("input[name='order_product["+count+"][product_price]']").val();
    var product_quantity = $("input[name='order_product["+count+"][product_quantity]']").val();
    var final_price = product_price*product_quantity; 
    $("input[name='order_product["+count+"][final_price]']").val(final_price);
    console.log("product_price : " + product_price);
    console.log("product_quantity : " + product_quantity);

}

function check_vaildate(a){
    var id = $(a).attr('id');
    if(id){
        console.log("id : " + id);
        console.log("value : " + $(a).val());
        $( "#group_"+id ).removeClass( "has-error" );
        if($(a).hasClass('field-validate')){
            if(!$(a).val()){
                $( "#group_"+id ).addClass( "has-error" );
                return false;
            }
        }
    }    
    return null; 
}

$(function() {
    // $("#customer_id").change(function() {
    //     var customer_id = this.value;
    //     $.ajax({
    //         type: "GET",
    //         url: "/cms/admin/findAddressByCustomerId/"+customer_id,
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
    // Dialog Purchase
    $("#addPurchaseDate").click(function(){
        var is_pass = true;
        $('#form_purchase_date *').filter(':input').each(function(){
            if(check_vaildate(this) === false)is_pass = false;
        });
        if(is_pass){
            fill_purchase_date();
            $( ".close" ).click();
        }
    });

    // Dialog Customer
    $("#customer_country,#customer_city,#customer_area,#customer_district,#customer_estate,#customer_building,#customer_room").change(function() {
        var customer_address = json_customer_address();
        var full_address = 
        customer_address.customer_country+" "+
        customer_address.customer_city+" "+
        customer_address.customer_area+" "+
        customer_address.customer_district+" "+
        customer_address.customer_estate+customer_address.customer_building+customer_address.customer_room+"室";
        $('#customer_street_address').val(full_address);
        // console.log("full_address : " + full_address);
    });

    $("#customer_id").change(function() {
        var customer_id = this.value;
        var phone = $('option:selected', this).attr('phone');
        var email = $('option:selected', this).attr('email');
        customer_change(phone,email);
        $.ajax({
            type: "POST",
            url: "/cms/admin/findAddressByCustomerId",
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
            if(check_vaildate(this) === false)is_pass = false;
        });
        if(is_pass){
            fill_customer_address();
            $( ".close" ).click();
        }
        
    });

    // Dialog Shipping
    $("#addShipping").click(function(){
        var is_pass = true;
        $('#form_shipping_address *').filter(':input').each(function(){
            if(check_vaildate(this) === false)is_pass = false;
        });
        if(is_pass){
            fill_shipping_address();
            $( ".close" ).click();
        }
        
    });

    // Dialog Product
    $("#addOrderProduct").click(function(){
        var is_pass = true;
        $('#form_order_product *').filter(':input').each(function(){
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
            fill_order_product();
            $( ".close" ).click();
        }
        
    });

    // Add Order Form

    $("#add_Order").click(function(){
        var customer_address_obj = json_customer_address();
        var shipping_address_obj = json_shipping_address();
        var order_product_array = json_order_product();
        var order_obj = json_order_form();
        var json = {
            customer_address_obj : customer_address_obj,
            shipping_address_obj : shipping_address_obj,
            order_product_array :order_product_array ,
            order_obj : order_obj,
        }

        $.ajax({
            type: "POST",
            url: "/cms/admin/createOrder",
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
       
        $("#add_shipping_method").html(shipping_method);
        $("#add_shipping_cost").html(shipping_cost);

    }

    function fill_order_product(){
        var product_attribute_id = $("#product_attribute_id").val();
        var product_attribute_text = $("#product_attribute_id option:selected").text();
        var add_order_product_image = $('#add_order_product_image').attr('src');
        var add_product_name = $("#add_product_name").val();
        var product_price = $("#add_product_price").val();
        var product_quantity = $("#add_product_quantity").val();
        var final_price = $("#add_final_price").val();
        
        $("#no_any_product").remove();
        var rowCount = $('#row_order_table tr').length;
        var dispay_rowCount = rowCount+1;

        var td = "<td>"+dispay_rowCount+"<br/>"+
        "<input type='hidden' name='order_product["+rowCount+"][product_attribute_id]' value='"+product_attribute_id+"'/>"+
        "<input type='hidden' name='order_product["+rowCount+"][product_price]' value='"+product_price+"'/>"+
        "</td>";
        td += "<td>"+"<img src='"+add_order_product_image+"' width='60px'>"+"</td>";
        td += "<td>"+product_attribute_text+"</td>";
        td += "<td>"+product_price+"</td>";
        td += "<td>"+"<input oninput='calculate_final_price("+rowCount+")' name='order_product["+rowCount+"][product_quantity]' onkeypress='validate(event)' type='text' value='"+product_quantity+"'/>"+"</td>";
        td += "<td>"+"<input name='order_product["+rowCount+"][final_price]' onkeypress='validate(event)' type='text' value='"+final_price+"'/>"+"</td>";
        td += '<td>'+
        '<a title="View Order Product" class="badge bg-light-blue part_edit_product">'+
        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'+
        '<a style="margin-left:5px;"title="Delete Order Product"  onclick="delete_item('+rowCount+')" class="badge bg-red">'+
        '<i class="fa fa-trash" aria-hidden="true"></i></a>'+
        '</td>';

        $('#view_order_table').find('tbody').append("<tr id='item_"+rowCount+"'>"+td+"</tr>");

    }

    function fill_purchase_date(){
        var date_purchased = $("#date_purchased").val();
        $("#display_date_purchasede").html(date_purchased);
    }
    function json_order_product(){
        var rowCount = $('#row_order_table tr').length;
        var json_array = [];
        for(var i=0; i<rowCount; i++){
            var product_attribute_id = $("input[name='order_product["+i+"][product_attribute_id]']").val();
            var product_price = $("input[name='order_product["+i+"][product_price]']").val();
            var product_quantity = $("input[name='order_product["+i+"][product_quantity]']").val();
            var final_price = $("input[name='order_product["+i+"][final_price]']").val();

            var obj = {
                product_attribute_id:product_attribute_id,
                product_price:product_price,
                product_quantity:product_quantity,
                final_price:final_price
            };
            json_array.push(obj);
        }
        // console.log("json_array : " + JSON.stringify(json_array));
        return json_array;
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

    function json_order_form(){
        var order_status = $("#order_status").val();
       
        var order_obj = {
            order_status : order_status,
        }
        return order_obj;
    }
});

