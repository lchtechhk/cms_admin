<?php 
    function print_selected_value($original,$db_value){
        $value = '';
        if(!empty($original) && !empty($db_value) && $original == $db_value){
            $value .= "selected";
        }
        return $value;
    }
?>