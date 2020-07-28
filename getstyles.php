<?php
$filenameArray = array();
$handle = opendir(dirname(realpath(__FILE__)).'/styles/');
    while($file = readdir($handle)){
        if($file !== '.' && $file !== '..'){
            array_push($filenameArray, "styles/$file");
        }
    }

echo json_encode($filenameArray);
?> 
