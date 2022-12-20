<?php function issues() {
    return db("issues")->where("y",1)->get();
} ?>