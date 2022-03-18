<?php

function get_inst(){
$ci =  & get_instance();
return $ci;
}

function glq(){
    echo get_inst()->db->last_query();
    exit;
}

function dd($array,$exit=TRUE){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    $exit ? exit : '';
}

function auth(){
    return get_inst()->session->userdata('user');
}