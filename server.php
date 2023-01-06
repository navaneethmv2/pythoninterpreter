<?php
    $code = $_POST['code'];
    $input = $_POST['input'];

    $inputfilepath = "files/input.txt";
    $inputfile = fopen($inputfilepath,"w");
    fwrite($inputfile,$input);
    fclose($inputfile);

    $filename = substr(md5(mt_rand()),0,5);
    $codefilepath = "files/".$filename."."."py";
    $codefile = fopen($codefilepath,"w");
    fwrite($codefile,$code);
    fclose($codefile);

    $command = "python $codefilepath 2>&1" . "<" . "files/input.txt";

    $output =shell_exec($command);
    echo $output;

?>