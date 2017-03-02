<?php
if( !function_exists('hasError') ){
    function hasError($filed,$errors){
        if($errors->any()){
            return " has-error";
        }
    }
}
if( !function_exists('helpBlock') ){
    function helpBlock($field, $errors){
        if($errors->any()){
            $erro = $errors->first($field);
            return "<span class=\"help-block\">
                    <strong>$erro</strong>
                </span>";
        }
    }
}