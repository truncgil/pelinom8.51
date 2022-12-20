<?php 
function mailtemp($mail,$name,$data="") {
    $temp = db("mail_templates")->where("title",$name)->first();
    $html = $temp->html;
    $subject = $temp->title2;
    if(is_array($data)) {
        foreach($data AS $a => $d) {
            $html = str_replace("{".$a."}",$d,$html);
            $subject = str_replace("{".$a."}",$d,$subject);
        }
    }
    
    @mailsend($mail,$subject,$html);
}

?>