<?php

//$con=new mysqli("localhost","taher","taher123");

$con = mysqli_connect("localhost", "taher", "taher123");

if(!$con){
    die("database error".mysqli_error($con));
}
$sql="use localStorage";
        if( !mysqli_query($con,$sql)){
            die("db".mysqli_error($con));
                //echo"1";
            }
           


      if(mysqli_query($con,"truncate table UserInterAction")){
          echo "truncated";
      }
      else{
          echo"not truncated";
      }

        mysqli_close($con);
?>