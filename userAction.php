<?php
require_once 'DB.php';

if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'add'){
           $name = $_POST['name'];
           $email = $_POST['email'];
          
           $mobile = $_POST['mobile'];
            $password = $_POST['password'];
      $sql = "INSERT INTO users(name,email,password,mobile) VALUES('$name','$email','$password','$mobile')";
      if($connect->query($sql) === TRUE){
          echo 'ok';
      }else{
            echo "Error: " . $sql . "<br>" . $connect->error;
      }
      
       $connect->close();
         
    }elseif($_POST['action_type'] == 'user_login'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $connect->query($sql);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            session_start();
            //setting sessions
            $_SESSION['id'] = $row['id'];
           echo 'ok';
            
        }else{
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
        
        $connect->close();
    }elseif($_POST['action_type'] == 'edit'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        
        session_start();
        $sql = "UPDATE users SET name='$name', email='$email' ,mobile='$mobile', password='$password' WHERE id=".$_SESSION['id']."  ";
        if($connect->query($sql) === TRUE){
            echo 'ok';
        }else{
            echo 'Error ' . $sql . '<br>' .$connect->error;
        }
    }elseif($_POST['action_type'] == 'delete'){
        session_start();
        $sql = "DELETE FROM users WHERE id=".$_SESSION['id']." ";
        if($connect->query($sql) === TRUE){
            echo 'deleted';
        }else{
            echo "Error " .$sql. "<br>" .$connect->error;
        }
    }
}



