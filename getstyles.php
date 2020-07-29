<?php
$files = array();
$handle = opendir(dirname(realpath(__FILE__)).'/styles/');
    while($file = readdir($handle)){
        $file_array = array();
        if($file !== '.' && $file !== '..'){
            $file_array += ["filename" => "styles/$file"];
            $file_array += ["contents" => file_get_contents("styles/$file"];
            array_push($files, $file_array);
        }
    }

echo json_encode($filenameArray);
?>
