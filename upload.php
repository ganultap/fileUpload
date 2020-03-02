<?php 
        include("includes/template/header.php");
?>

<div class="container mt-5">
    <div class="card border-light shadow-lg text-white">
        <h1 class="card-header text-center bg-info">Uploaded files</h1>
        <div class="card-body col-sm-12 col-lg-4 mr-auto ml-auto small text-dark">

            <?php 
        include("functions.php");
         // echo '<pre>', print_r($_FILES), '</pre>';
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
            // echo $file_tmp, '<br>';
            if(checkIFInArray($file_ext, $allowed)) {
                    // echo '<pre>', print_r($file_name), '</pre>';
                if (checkFiles($file_error)) {
                    
                    if (checkSize($file_size)) {

                            $file_destination = 'uploads/' . $file_name;

                            if (!checkDuplicate($file_destination)){

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

        if(!empty($uploaded)){
            foreach($uploaded as $imagename){
                echo "<img src=\"$imagename\" /> <br><br>";
                echo "<p> <font color=green>{$file_name} successfully uploaded. </font> </p>";
            }
        }
            
        if (!empty($failed)) {
            echo implode(" ", $failed);
        }

    }


    
   ?>
        </div>
        <div class="card-footer text-center small bg-info">
            Copyright &copy 2020
        </div>
    </div>
</div>



<?php 
    
    include("includes/template/footer.php");
?>