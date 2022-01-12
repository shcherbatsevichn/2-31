<?php error_reporting(-1);
// Вычислить значение многочлена и всех его 
//производных в заданной точке x (коэффициенты хранятся в массивах).  
$A = [3, 7, 9, 5];
$x =2;
for($n = 0; $n <count($A); $n++){
    $res += $A[$n]*($x ** $n);
}
$fstpr = get_pr($A, $x);

echo("Значение многочлена".$res."<br>"); 
echo("Его производные в точке х = {$x}:<br>");
$m = 1; 
for($l = 0; $l < count($fstpr); $l++){
    echo("{$m}-я производная =".$fstpr[$l]);
    echo("<br>");
    $m++;
}


function get_pr($array, $x){
    $arr =[];
    $n = 0;
    $arres = [];
    if(count($array) == 1){
        return $arres;
    }
    for($i = 1; $i < count($array); $i++){
        if($n == count($array)){
            break;
        }
        $arr[$n] = $array[$i];
        $n++;
    }
    
    for($i = 0; $i < count($array)-1; $i++){
        $arr[$i] = $arr[$i] *($i+1);
    }
    $res = 0;
    for($n = 0; $n < count($arr); $n++){
        $res += $arr[$n]*($x ** $n);
    }
    $arres = array_merge($arres, [$res]);
    return array_merge($arres, get_pr($arr, $x));
}



