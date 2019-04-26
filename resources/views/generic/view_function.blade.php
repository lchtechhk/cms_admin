<?php 
    function print_selected_value($original,$db_value){
        $value = '';
        if(!empty($original) && !empty($db_value) && $original == $db_value){
            $value .= "selected";
        }
        return $value;
    }
    function print_value($operation,$data){
        $value = '';
        if($operation == 'edit' || $operation == 'view' || $operation == 'changeable'){
            $value .= $data;
        }
        return $value;
    }
    function print_selected_value($operation,$data,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view' || $operation == 'changeable') && !empty($data) && !empty($selected_value) && $data == $selected_value){
            $value .= "selected";
        }
        return $value;
    }
    function print_checkbox($operation,$selected_value){
        $value = '';
        if( ($operation == 'edit' || $operation == 'view' || $operation == 'changeable') && !empty($selected_value) && $selected_value == 'reject'){
            $value .= "checked";
        }
        return $value;
    }
?>