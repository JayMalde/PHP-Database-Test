<?php
error_reporting(E_ERROR | E_PARSE);
//1st
$numVal =array();
for ($i = 000; $i <= 999; $i+=1) 
{
    $val="";
    $val = (string)$i;
    if($val[0]<=$val[1] && $val[1]<=$val[2]){
        $numVal[]=$i;
    }
}
sort($numVal);
// echo count($numVal);
if(count($numVal)>0)
{
    foreach ($numVal as $n) 
    {   
        echo "$n <br>";
    }
}
else{
    echo "Empty Array";
}
#2nd
$classVal=array();
function array_push_assoc($array, $key, $value){
    return $key = $value;
}
foreach($numVal as $i) 
{
    $val="";
    $val = (string)$i;
    if($val[0]==$val[1] && $val[1]==$val[2] && $val[0]==$val[2])
    {
        $classVal[$i]=array_push_assoc($classVal,$i,"triple");
    }elseif($val[0]==$val[1] || $val[1]==$val[2] || $val[0]==$val[2])
    {
        $classVal[$i]=array_push_assoc($classVal,$i,"double");
    }elseif($val[0]!=$val[1] && $val[1]!=$val[2] && $val[0]!=$val[2]){
        $classVal[$i]=array_push_assoc($classVal,$i,"single");
    }
}
foreach ($classVal as $key => $value) 
{   
    echo "$key => $value <br>";
}

#3rd
$sum=array();
foreach($numVal as $i) 
{
    $val="";
    $val = (string)$i;
    $sum =(int)$val[0]+(int)$val[1]+(int)$val[2];
    $sumVal[]=$sum%10;
}
foreach ($sumVal as $s) 
{   
    echo "$s Sum<br>";
}

//Combining into 1 multidimensional array
function create_mul_array($num,$class,$group)
{
    return array("number" => $num,"class" => $class,"group" => $group);
};
$final=array();
for($i=0;$i<count($numVal);$i+=1){
    $index = array_keys($classVal); 
    $final[]=create_mul_array($numVal[$i],$classVal[$index[$i]],$sumVal[$i]);
}

// print_r($final);

$keys = array_keys($final);
for($i = 0; $i < count($final); $i++) {
    echo $keys[$i] . "Array(<br>";
    foreach($final[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo ")<br>";
}


//4th
$con = mysqli_connect("localhost","root","","jay")or die("Database Connectivity Failed");

for($i=0;$i<count($numVal);$i+=1){
    $index = array_keys($classVal); 
    $class = $classVal[$index[$i]];
    $query = "insert into array (id,number,class,groups) values('$numVal[$i]','$numVal[$i]','$class','$sumVal[$i]')";
    if(mysqli_query($con,$query)){
        echo "<BR><h1 style='text-align:center'>Data Inserted</h1>";
    }else{
        echo "<BR><h1 style='text-align:center'>Data insertion Failed</h1>";
    }
}

?>