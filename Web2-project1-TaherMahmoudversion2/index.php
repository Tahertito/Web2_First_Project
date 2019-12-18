
<?php
$con = mysqli_connect("localhost", "taher", "taher123");

if(!$con){
    die("database error".mysqli_error($con));
}
$sql="use localStorage";
        if( !mysqli_query($con,$sql)){
            die("db".mysqli_error($con));
                echo"0";
            }
            

if(isset($_POST["Data"])){
    //echo $_POST["Data"];
    $data=json_decode($_POST["Data"],TRUE);
   print_r(($data));
  
    foreach($data as $key=>$value){ 
        //converting the value object from json string to associative array
    $val= json_decode($value,true);
    // print_r($val);

       $eventType=$val['eventType'];     
     // print_r(($val['eventTarget'])); 
     // print_r(($val['eventTarget']['location']['href']));
       $eventTime=$val['eventTime'];
      // echo json_encode($val['eventTime']);
      $eventTarget=$val['eventTarget'];
if( is_array($eventTarget)){
      //eventTarget is an array of data
      $eventTargetData=  $val['eventTarget']['location']; 
    //  // print_r($eventTargetData);
      
            $href     = $eventTargetData['href'];              
            $origin   = $eventTargetData['origin'];
            $protocol = $eventTargetData['protocol'];
            $host     = $eventTargetData['host'];
            $hostName = $eventTargetData['hostname'];
            $port     = $eventTargetData['port'];
            $pathName = $eventTargetData['pathname'];
            $search   = $eventTargetData['search'];
            $hash     = $eventTargetData['hash'];      
       
        $sql="insert into UserInterAction (eventType,href,origin,protocol,host,hostName,port,pathName,search,hash,eventTime)
         values ('".$eventType."', '".$href."', '".$origin."', '".$protocol."', '".$host."', '".$hostName."', '".$port.
         "', '".$pathName."', '".$search."', '".$hash."', '".$eventTime."')";
        if( mysqli_query($con,$sql)){
            echo"\r\n 1 array";
            }
            else{
                //die("db".mysqli_error($con));
                echo"0";
            
            }
        }
        else{
           

             $sql="insert into UserInterAction (eventType,eventValue,eventTime)
         values ('".$eventType."', '".$eventTarget."', '".$eventTime."')";
        if( mysqli_query($con,$sql)){
            echo"1 not arry \r\n";
            }
            else{
                die("db".mysqli_error($con));
                echo"0";
            
            }
        }

   }
}
else{
    echo" not reached";
}


?>

