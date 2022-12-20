<?php function isAdmin($u) {
    if($u->level=="Admin") {
        return true;
    } else {
        return false;
    }
} ?>