<?php 
    function order_print_value($operation,$data){
        $value = '';
        if(check_operation($operation)){
            $value .= $data;
        }
        return $value;
    }
    function order_print_selected_value($operation,$data,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable') && !empty($data) && !empty($selected_value) && $data == $selected_value){
            $value .= "selected";
        }
        return $value;
    }
    function order_print_checkbox($operation,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'listing' || $operation == 'changeable') && !empty($selected_value) && $selected_value == 'reject'){
            $value .= "checked";
        }
        return $value;
    }
    // function check_operation($operation){
    //     return $operation == 'part_customer_address' || $operation == 'part_edit_product'|| $operation == 'edit' || 
    //     $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable';
    // }
?>