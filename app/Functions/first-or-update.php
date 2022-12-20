<?php 
/**
 * Try catch kullanarak ekler veya günceller
 */
function firstOrUpdate($data, $table,$where,$debug=false) {

    try {
        $data['created_at'] = simdi();
        $id = db($table)->insertGetId($data);
        return $id;
    } catch (\Throwable $th) {
        
        if($debug) {
            print2($th);
        }
        
        
        db($table)->where($where)->update($data);
        return "update";
    }
    
} ?>