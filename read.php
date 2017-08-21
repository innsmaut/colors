<?php

$map = unserialize(file_get_contents('colorslist.txt'));

$counter = 0;
$empty = array();
foreach ($map as $key=>$field){
    if (empty($field)) $empty[]=$key;
}

$res = array();
foreach ($empty as $k=>$v){
    $v=explode('-',$v);
    if(!isset($res[$v[0]])) $res[$v[0]]=array();
    if(!isset($res[$v[0]][$v[1]])) $res[$v[0]][$v[1]]=array();
    $res[$v[0]][$v[1]][] = $v[2];
}
foreach ($res as $h){
    $hnew = array();
    foreach ($h as $s=>$l){
        $key = $l[0].'-'.$l[count($l)-1];
    }
}
$test=1;