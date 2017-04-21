<?php
    include('config.php');
/* Multiple files Upload */
global $fupload ;

if(isset($_POST["submit"])) {
    $f_name= $_REQUEST['fname'];
    $l_name= $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $passw = md5($_REQUEST['passwrd']);
    $gend= $_REQUEST['gender'];
    $city= $_REQUEST['city'];
    
    $total = count($_FILES['fileToUpload']['name']);

    $file_type =  array('PNG','png','jpg' ,'jpeg');
    $files = $_FILES['fileToUpload']['name'];       // get the file from the html page
    $pic = time().rand(000,999). $files;            // create a random numbers in front of the upload files
        $path="./uploads/".$pic;                    // path to upload
        $temp=$_FILES['fileToUpload']['tmp_name'];  // select the temporary path
    $ext = pathinfo($files, PATHINFO_EXTENSION);    // Get the extension of the file
    if(!in_array($ext,$file_type) ) {
        //echo 'error';
    } else {
    //    echo 'Correct file';
          $upload = move_uploaded_file($temp,$path);
        if($upload){
            //echo "<script> windows.location.href='index.php' </script>";
            $query="INSERT INTO `user_linktutor` (`usr_id`, `first_name`, `last_name`, `email`, `password`,`gender`,`city`, `image_path`) VALUES ('', '".$f_name."', '".$l_name."', '".$email."', '".$passw."','".$gend."','".$city."', '".$path."');";
            mysql_query($query);
            header('Location: profile.php');
        }
    }
    // Loop through each file
    /*for($i=0; $i<$total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['fileToUpload']['tmp_name'][$i];
      
      $files = $_FILES['fileToUpload']['name'];
      $ext = pathinfo($files[$i], PATHINFO_EXTENSION);
      
      //Make sure we have a filepath
      if(in_array($ext,$file_type)){
      if ($tmpFilePath != ""){
        //Setup our new file path

//        $newFilePath = "./uploads/" . $_FILES['fileToUpload']['name'][$i];
//          if (!file_exists('path/to/directory')) {
//                mkdir('path/to/directory', 0777, true);
//            }
          if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }
        $newFilePath = "./uploads/" . time().rand(000,999). $files [$i];
        $db_path[] =  $newFilePath;
        
        //Upload the file into the temp dir
        $fupload = move_uploaded_file($tmpFilePath, $newFilePath);
//        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
//            echo 'File Uploaded Successfully';
//          //Handle other code here
//
//        }       
            }
        }
    }
    //print_r($db_path);
    $multiplepics = json_encode($db_path);*/
    
    /*if($fupload){
        $query="INSERT INTO `user_linktutor` (`usr_id`, `first_name`, `last_name`, `email`, `password`,`gender`,`city`, `image_path`) VALUES ('', '".$f_name."', '".$l_name."', '".$email."', '".$passw."','".$gend."','".$city."', '".$path."');";
        mysql_query($query);
        echo 'File Uploaded Successfully';
    }
    else {
        echo "File Extension Not Supported";
    }*/
}

/* Single file Upload */
/*if(isset($_POST["submit"])) {
    $file_type =  array('pdf','doc' ,'xlsx');       // this array is used to put the reqd file extention to check while upload
    $files = $_FILES['fileToUpload']['name'];       // get the file from the html page
    $pic = time().rand(000,999). $files;            // create a random numbers in front of the upload files
    //print_r($pic);    die();
        $path="./uploads/".$pic;                    // path to upload
        //echo basename($path) ."<br/>";        
//        echo basename($path,".jpg");
        $temp=$_FILES['fileToUpload']['tmp_name'];  // select the temporary path
    $ext = pathinfo($files, PATHINFO_EXTENSION);    // Get the extension of the file
    if(!in_array($ext,$file_type) ) {
        echo 'error';
    } else {
    //    echo 'Correct file';
          $upload = move_uploaded_file($temp,$path);
        if($upload){
            echo "<script> windows.location.href='index.php' </script>";
        }
    }
}*/

/*
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //print_r($check) ; die;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}*/
?>