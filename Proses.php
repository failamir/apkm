<?php 
$batas = '40';
$file = 'storage/app/public/2/Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx';
$file2 = 'storage/app/public/1/Contoh-Data-ICE-On-Going.xlsx';
$date = date('dmYhsi');
var_dump($date);
// $batas = 'andri';
// $file = 'cantik';
// $command = "python3 tes.py $batas $file";
// $command = "python3 tes.py '$batas' '$file'";
// echo $command;
// $output = shell_exec($command);
// $proses = shell_exec("python3 Proses.py '$batas' '$file' '$file2'", $out, $ret);
// exec("python ProsesH.py '$batas' '$file' '$date'", $out, $ret);
exec("python3 Proses.py '$batas' '$file' '$file2' '$date'", $out, $ret);
// exec("python3 ProsesOngoing.py '$file2' '$date'", $out, $ret);
// var_dump($proses);
// exec($command , $out,$ret );
//echo $out;
// $a =  '40';
// $b = 'storage/app/public/2/Data-LMS-+-Nilai---ICEI-Rev-21.03.2021-(1).xlsx';
// // var_dump($a);
// // var_dump($b);
// $date = date('dmYhsi');

// $andri=exec("python3 app/Http/Controllers/Api/V1/Admin/Proses.py '$a' '$b' '$date'", $out, $ret);
// var_dump($andri);
/*Loop through each line of data returned*/
foreach ($out as $line){
    print "$line\n";
}
// $string = file_get_contents($date . '.json');
// var_dump($ret);
// $json_a = json_decode($string, true);
// var_dump($json_a);
// if ($json_a === null) {
//     // deal with error...
// }

// foreach ($json_a as $d) {
//     var_dump($d);
// }
// $string = 'Example String\n'; 
// $pyout = shell_exec("python tes.py 'fail' 'andri'");
// echo $pyout;
// echo "python tes.py 'fail' 'andri'";

// var_dump($output);