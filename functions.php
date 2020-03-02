<?php 
    function checkSize($file_size){
        return ($file_size <= 10000000) ? true : false;
    }

    function checkFiles($file_error){
        return ($file_error === 0) ? true : false;
    }

    function checkUpload($file_tmp, $file_destination){
        return (move_uploaded_file($file_tmp, $file_destination)) ? true : false;
    }

    function checkIFInArray($file_ext, $allowed){
        return (in_array($file_ext, $allowed)) ? true : false;
    }

    function checkDuplicate($file_destination){
        return (file_exists($file_destination)) ? true : false;
    }

?>