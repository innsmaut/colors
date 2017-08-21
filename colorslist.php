<?php

$colormap = unserialize(file_get_contents('colormap.txt'));

$colors = array();
for($h=0;$h<361;$h++){
    for($s=0;$s<101;$s++){
        for($l=0;$l<101;$l++){
            $key = $h.'-'.$s.'-'.$l;
            $colors[$key] = '';
        }
    }
}

foreach ($colormap as $color=>$ranges){
    foreach ($ranges as $range){
        $hue=$range[0];
        $sat=$range[1];
        $lig=$range[2];
        for($h=$hue[0];$h<$hue[1]+1;$h++){
            for($s=$sat[0];$s<$sat[1]+1;$s++){
                for($l=$lig[0];$l<$lig[1]+1;$l++){
                    $key = $h.'-'.$s.'-'.$l;
                    if (strpos($colors[$key], $color) === false){
                        if ($colors[$key] !== '') $colors[$key] .= ',';
                        $colors[$key] .= $color;
                    }
                }
            }
        }
    }
}

file_put_contents('colorslist.txt', serialize($colors));
