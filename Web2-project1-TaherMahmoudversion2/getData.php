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
           
$sql="select * from  UserInterAction";
$result = mysqli_query($con,$sql);
if (false !== $result) {
    echo " num of rows:";
    echo mysqli_num_rows($result);
    
    echo "<br>";      

    while($row = $result->fetch_assoc()) {
        echo "<br>";      
    
        echo json_encode($row);
        echo "<br>";      


    }
}

 else {
    echo mysqli_error($con);
}

    //   if(mysqli_query($con,"truncate table UserInterAction")){
    //       echo "truncated";
    //   }
    //   else{
    //       echo"not truncated";
    //   }

        mysqli_close($con);
?>