<?php 
$width = env("WIDTH"); 
$height = env("HEIGHT"); 
$path = "admin.type.editor"; ?>
@include("$path.core")
@include("$path.modal")

<div class="content" style="margin-top:75px;margin-bottom:75px;">
    
    @include("$path.urun-sec")
    @include("$path.editor-view")
    
    <div class="row">     
        @include("$path.toolbar")  
        @include("$path.script")  
        @include("$path.style")  
    </div>
    
         </div>

    </div>
    

</div>
@include("$path.footer")