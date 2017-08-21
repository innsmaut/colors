<?php

function map($fname){
    $h = fopen($fname, 'r');
    $res=array();
    while($r=fgetcsv($h)){
        $res[$r[0]] = $r[1];
    }
    return $res;
}

function getRange($val, $map){
    if (strpos($val, '-') === false){
        $val = $map[$val];
    }
    return explode('-', $val);
}

$hMap = map('hue.csv');
$sMap = map('sat.csv');
$lMap = map('lig.csv');

$cols = array();

$h = fopen('base.csv', 'r');
while($r=fgetcsv($h)){
    if(empty($r[1]) && empty($r[2])){
        $key = $r[0];
        $cols[$key] = array();
        fgetcsv($h);
    }else{
        $r[0] = getRange($r[0], $hMap);
        $r[1] = getRange($r[1], $sMap);
        $r[2] = getRange($r[2], $lMap);
        $cols[$key][] = $r;
    }
}

file_put_contents('colormap.txt', serialize($cols));