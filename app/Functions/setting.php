<?php function setting($key,$strip_tags=false) {
    $setting = db("settings")->where("title",$key)->first();
    if($setting) {
        if($strip_tags) {
            $setting->html = strip_tags($setting->html);
        }
    
        return $setting->html;
    } else {
        return $key . " Not found";
    }
    
} ?>