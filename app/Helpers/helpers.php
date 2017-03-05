<?php
if( !function_exists('hasError') ){
    function hasError($field,$errors){
        if($errors->has($field)){
            return " has-error";
        }
    }
}
if( !function_exists('helpBlock') ){
    function helpBlock($field, $errors){
        if($errors->has($field)){
            $erro = $errors->first($field);
            return "<span class=\"help-block\">
                    <strong>$erro</strong>
                </span>";
        }
    }
}