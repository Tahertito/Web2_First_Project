<?php

//$con=new mysqli("localhost","taher","taher123");
$con = mysqli_connect("localhost", "taher", "taher123");

if(!$con){
    die("database error".mysqli_error($con));
}
if( mysqli_query($con,"create database if not exists localStorage")){
echo"created \r\n ";
}
else{
    die("database error".mysqli_error($con));

}
$sql="use localStorage;";
if( mysqli_query($con,$sql)){
    echo"db used \r\n";
    }
    else{
        die("db".mysqli_error($con));
    
    }
    // $sql="drop table  UserInterAction;";
    // if( mysqli_query($con,$sql)){
    //     echo"UserInterAction droped";
    //     }
    //     else{
    //         die("UserInterAction".mysqli_error($con));
        
    //     }
$sql="  create table  if not exists UserInterAction(
 id int primary key AUTO_INCREMENT,
eventType    VARCHAR(100),
eventValue    varchar(100),
href         VARCHAR(100),
origin       VARCHAR(100),
protocol     VARCHAR(100),
host         VARCHAR(100),
hostName     VARCHAR(100),
port         VARCHAR(100),
pathName     VARCHAR(100),
search       VARCHAR(100),
hash         VARCHAR(100),
eventTime    VARCHAR(100)
);";
if (mysqli_query($con,$sql)){
    echo"table created";
    }
    else{
        die("table error".mysqli_error($con));
    
    }
    
    $sql="insert into UserInterAction (eventType,eventValue,eventTime)
    values ('"."eventType"."', '"."eventTarget"."', '"."eventTime"."')";
   if( mysqli_query($con,$sql)){
       echo"1 not arry \r\n";
       }
       else{
           die("db".mysqli_error($con));
           echo"0";
       
       }

?>