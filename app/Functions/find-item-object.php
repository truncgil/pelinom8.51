<?php function findItemObject($text, $column, $object) {
        $array = @json_decode(json_encode($object));
        $find = array_search($text, array_column($array, $column));
        if(!$find) {
            return false;
        } else {
            return $object[$find];
        }
        
} ?>