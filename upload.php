<?php 
        include("includes/template/header.php");
        include("includes/template/content.php");
?>
    <?php 
        include("functions.php");
    if(!empty($_FILES['files']['name'][0])){
        $files = $_FILES['files'];
        $uploaded = array();
        $failed = array();
        $allowed = array('png','jpeg');

        foreach ($files['name'] as $position => $file_name) {

            $file_tmp = $files['tmp_name'][$position];
            $file_size = $files['size'][$position];
            $file_error = $files['error'][$position];
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            
            //check if the file type is allowed.
            if(checkIFInArray($file_ext, $allowed)) {
                    // echo '<pre>', print_r($file_name), '</pre>';
                //check if file is empty
                if (checkFiles($file_error)) {
                    //check file size
                    if (checkSize($file_size)) {

                            $file_destination = 'uploads/' . $file_name;
                            //check if file already exist
                            if (!checkDuplicate($file_destination)){
                                //check if uploaded or not
                                if (checkUpload($file_tmp, $file_destination)) {
                                    // echo '<pre>', ($file_destination), '</pre>';
                                    $uploaded[$position] = $file_destination;

                                } else {
                                    
                                    $failed[$position] = "<p> <font color=red>{$file_name} failed to upload.</font> </p>";
                                }                           
                            }else{

                                $failed[$position] = "<p> <font color=red>$file_name already exist. </font> </p>";
                            }
                    }else{

                        $failed[$position] = "<p> <font color=red>$file_name is too large. </font> </p>";
                    }

                }else {

                    $failed[$position] = "<p> <font color=red>$file_name error with code {$file_error}. </font> </p>";
                }

            }else{
                $failed[$position] = "<p> <font color=red>{$file_name} file extension '{$file_ext}' is not allowed. </font> </p>";
            }
        }
        //displaying successfully uploaded images.
        if(!empty($uploaded)){
            foreach($uploaded as $imagename){
                echo "<img src=\"$imagename\" /> <br><br>";
                echo "<p> <font color=#008080>{$file_name} successfully uploaded. </font> </p>";
            }
        }
        //notifies failed uploads.
        if (!empty($failed)) {
            echo implode(" ", $failed);
        }

    }

    ?>
<?php 
    include("includes/template/footer.php");
?>