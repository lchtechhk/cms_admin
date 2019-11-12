<?php 
    // function print_selected_value($original,$db_value){
    //     $value = '';
    //     if(!empty($original) && !empty($db_value) && $original == $db_value){
    //         $value .= "selected";
    //     }
    //     return $value;
    // }
    function testing(){
        error_log("testing function");
        return "testing";
    }
    function print_value($operation,$data){
        $value = '';
        if($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable'){
            $value .= $data;
        }
        return $value;
    }
    function print_radio_value($operation,$data,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable') && !empty($data) && !empty($selected_value) && $data == $selected_value){
            $value .= "checked";
        }
        return $value;
    }

    function print_selected_value($operation,$data,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable') && !empty($data) && !empty($selected_value) && $data == $selected_value){
            $value .= "selected";
        }
        return $value;
    }
    function print_checkbox($operation,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'listing' || $operation == 'changeable') && !empty($selected_value) && $selected_value == 'reject'){
            $value .= "checked";
        }
        return $value;
    }

    function is_readonly($operation,$value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable') && !empty($value)){
            $value .= "readonly";
        }
        return $value;
    }

    function is_disabled($operation,$data){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view_edit' || $operation == 'listing' || $operation == 'changeable') && !empty($data)){
            $value .= "disabled";
        }
        return $value;
    }

?>