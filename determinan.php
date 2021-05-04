<?php

function determinan($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
        
    $det1 = $a*(($f*$k*$p)-($f*$l*$o)-($g*$j*$p)+($g*$l*$n)+($h*$j*$o)-($h*$k*$n));
    $det2 = $b*(($e*$k*$p)-($e*$l*$o)-($g*$i*$p)+($g*$l*$m)+($h*$i*$o)-($h*$k*$m));
    $det3 = $c*(($e*$j*$p)-($e*$l*$n)-($f*$i*$p)+($f*$l*$m)+($h*$i*$n)-($h*$j*$m));
    $det4 = $d*(($e*$j*$o)-($e*$k*$n)-($f*$i*$o)+($f*$k*$m)+($g*$i*$n)-($g*$j*$m));

    return $det1-$det2+$det3-$det4;
}

// function determinan2($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p){
    
//     echo 100000*123456789122313.0;
//     echo "<br>";
    
//     $det1 = $a*$f*$k*$p;
//     $det2 = $b*$g*$l*$m;
//     $det3 = $c*$h*$i*$n;
//     $det4 = $d*$e*$j*$o;
//     $det5 = $a*$h*$k*$n;
//     $det6 = $b*$e*$l*$o;
//     $det7 = $c*$f*$i*$p;
//     $det8 = $d*$g*$j*$m;

//     return $det1-$det2+$det3-$det4-$det5+$det6-$det7+$det8;
// }

// $deta = determinan  (10.0,180.0,50.0,-120.0,
//                     180.0,4200.0,1700.0,-2400.0,
//                     50.0,1700.0,3100.0,-600.0,
//                     -120.0,-2400.0,-600.0,3600.0);


//                     $deta2 = determinan2  (10,180,50,-120,
//                     180,4200,1700,-2400,
//                     50,1700,3100,-600,
//                     -120,-2400,-600,3600);

// echo $deta."<br>";
// echo $deta2

?>