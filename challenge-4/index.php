<?php

$input = ["insurance.txt" => "Company A", "letter.docx" => "Company A", "Contract.docx" => "Company
B"];

function groupByOwnersService($data){

    $arr = [];
    foreach ($data as $key => $value) {
        $arr[$value][] = $key;
    }
    
    return $arr;
}

echo('<pre>');print_r( groupByOwnersService($input) );