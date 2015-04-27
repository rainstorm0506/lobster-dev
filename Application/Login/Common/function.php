<?php
function login($result=null){
    if($result){
        session('userinfo',$result);
    }else{
        return session('userinfo');
    }
}

