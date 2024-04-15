<?php
$output = __DIR__ . '/vendor/geekcom/phpjasper/examples'; 
$filename = 'PRF_azi.pdf';
header('Content-Description: application/pdf');
header('Content-Type: application/pdf');
header('Content-Dispostion:; Filename=' . $filename);
readfile($output . '/' . $filename);
//unlink($output . '/' . $filename);
//flush();
?>