<?php 
/**
 * Try catch kullanarak index değerine göre yoksa ekler
 */
function firstOrCreate($data, $table, $debug=false) {

    try {
        $data['created_at'] = simdi();
        $id = db($table)->insertGetId($data);
        return $id;
    } catch (\Throwable $th) {
        if($debug) {
            dump($th);
        }
    }
    
} ?>