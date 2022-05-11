<?php
function validate(...$params){
    foreach ($params as $item){
        if(!(isset($item)) and  !(strlen($item))){
            return false;
        }
    }
    return true;
}


