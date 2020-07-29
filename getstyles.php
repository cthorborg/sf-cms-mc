<?php
$files = array();
$result = array();
$handle = opendir(dirname(realpath(__FILE__)).'/styles/');
    while($file = readdir($handle)){
        $data = array();
        if($file !== '.' && $file !== '..'){
            $data["filename"] = "styles/$file";
            $data["contents"] = file_get_contents("styles/$file");
            $result["files"][]=$data;
        }
    }

echo json_encode($result);
?>
