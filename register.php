<?php

include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$address = $_POST['address'];
$AAdhar= $_POST['AAdhar'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($password==$cpassword)
         { 
       move_uploaded_file($tmp_name,"../uploads/$image");
         $insert = mysqli_query($connect , "INSERT INTO user(name , mobile,password , address,AAdhar,photo
         ,role,status,votes) VALUES('$name','$mobile','$password','$address','$AAdhar','$image','$role',0,0)");


              if($insert){
                echo'
                <script>
                  alert("registration successfull");
                   window.location ="../";
          
              </script>
          ';
                  }
          else{
            echo'
            <script>
              alert("some error occur ");
               window.location :"../routes/register.html";
      
          </script>
      ';
      
          }
          
          
          
                }

else{
    echo'
      <script>
        alert("password and cpassword does not match");
         window.location ="../routes/register.html";

    </script>
';








}

?>