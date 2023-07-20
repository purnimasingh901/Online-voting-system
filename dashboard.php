<?php 
session_start();
if(!isset($_SESSION['userdata']))
{
    header("location : ../");
}
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
if($_SESSION['userdata']['status']==0){
    $status = '<b style = "color : red"> not voted</b> ';
 
     }
else {
    $status = '<b style = "color : green"> voted</b> ';
}

?>
<html>
 <head><title>online voting system - dashboard</title>
 <link rel ="stylesheet " href = "../css/stylesheet.css">
</head>
<body>
<style >
#backbtn {
    padding: 5;
    background-color : #0984e3; 
    color : white;
    border: outset;
    float :left;
    margin : 10px;
}
#logoutbtn{
    padding: 5;
    background-color : #0984e3; 
    color : white;
    border: outset;
    float: right;
    margin : 10px;
}


#profile{
    background-color : white;
    width : 30%;
    padding : 20px;
    float : left;

}
#group{ background-color : white;
    width : 60%;
    padding : 20px;
float : right;

}
#votebtn{  padding: 5;
    background-color : #0984e3; 
    color : white;
    border: outset;
    float :left;


}
#mainpanel{
    padding: 10px;
}
#voted{
    padding: 5;
    background-color : green; 
    color : white;
    border: outset;
    
}

</style>

<div id = "mainsection">
<center>
       <div id = "headersection">

       <a href = "../"><button id="backbtn" > Back</button></a>
       <a href = "logout.php"><button id = "logoutbtn">Logout</button></a>
    <h1>ONLINE VOTING SYSTEM</h1>
        </div></center>
    <br><hr><br>
    <div id = "mainpanel">
             <div id = "profile">
              <center> 

                  <img src = "../uploads/<?php  echo $userdata['photo'] ?>" height ="100" width = "100"><br><br> </center>
        <b>NAME :</b> <?php       
                                echo  $userdata['name']?> <br><br>
        <b>Mobile :</b>  <?php     $userdata = $_SESSION['userdata'];  
                                echo  $userdata['mobile']?>  <br><br>
        <b>Address :</b>  <?php     $userdata = $_SESSION['userdata'];  
                                echo  $userdata['address']?> <br><br>
        <b>Status :</b>  <?php     $userdata = $_SESSION['userdata'];  
                                echo  $status?>  <br><br>
     </div>
     <div id = "group">
       <?php
        $groupsdata = $_SESSION['groupsdata'];
       if($_SESSION['groupsdata']){
           for ($i=0;$i<count($groupsdata);$i++){
               ?>
                     <div>
                     <img  style = "float : right" src = "../uploads/<?php echo $groupsdata[$i]['photo']?>"height = "100" width = "100">
                      <b> Group Name : </b> <?php     $groupsdata = $_SESSION['groupsdata'];  
                                echo  $groupsdata[$i]['name']?><br><br>
                      <b>votes : </b><?php $groupsdata = $_SESSION['groupsdata'];
                                echo $groupsdata[$i]['votes']?><br><br>
                      <form action = "../api/vote.php" method ="POST">
                     
                      <input type ="hidden" name = "gvotes" value = "<?php echo $groupsdata[$i]['votes']?>">
                      <input type ="hidden" name = "gid" value = "<?php echo $groupsdata[$i]['id']?>">
                      
                        <?php
                               if($_SESSION['userdata']['status']==0){?>
                                <input type = "submit" name = "votebtn" value = "vote" id ="votebtn">  <br><br> 
                            <?php  
                             }
                             else{
                        ?> <button disabled  type = "button" name = "votebtn" value = "vote" id = "voted">voted</button><br><br>
                              <?php
                              }
                              ?>
                            
                            </form>
                        </div>
                        <hr>           <?php
                    }     
                 }
                 else{ }
                    ?>   
             </div>
     </div>
 </div>
</body>    
</html>
  