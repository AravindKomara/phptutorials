<?php
if(isset($_FILES['image'])){
    $errors = array();
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $filetmp = $_FILES['image']['tmp_name'];
    $filetype = $_FILES['image']['type'];
    
    $filext = strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png");
    
    if(in_array($filext,$extensions)=== FALSE){
        $errors[] = "only jpeg, jpg, png files are alloweed";
    }
    
    if($filesize > 2097152){
         $errors[] = "filesize excatly 2 MB";
    }
    
    if(empty($errors) === true){
        move_uploaded_file($filetmp,"./images/".$filename);
        echo 'success';
    }else{
        print_r($errors);
    }
    
    
}

?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
       
			
      </form>
      
   </body>
</html>