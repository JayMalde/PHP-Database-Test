<?php
error_reporting(E_ERROR | E_PARSE);
$con = mysqli_connect("localhost","root","","jay")or die("Database Connectivity Failed");
$query = "select * from array";
$result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0){
        echo "<br><table border=1 align=center style='font-size:28px'><tr><th colspan='3'>Array Table</th></tr><tr><th>number</th><th>class</th><th>group</th></tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['number']."</td><td>".$row['class']."</td><td>".$row['groups']."</td></tr>";
        }
        echo "</table>";
    }else{
        echo "<br>0 Records in Row".mysqli_error($con);
    }
?>
