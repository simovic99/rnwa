<?php
// get the q parameter from URL
$s = $_REQUEST["s"];
$hint = "";

// lookup all hints from array if $q is different from "" 
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);
    /*
	foreach($a as $name) {
        if (stristr($s, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
	
	*/
	

/**********************************************************/
$db = mysqli_connect("localhost","root","Admin321");

if($db) {

$result = mysqli_select_db($db, "rnwa") or die("Do�lo je do problema prilikom odabira baze...");
$sql="SELECT EMP_ID,FIRST_NAME,LAST_NAME,TITLE  FROM employee where FIRST_NAME LIKE '%$s%' OR LAST_NAME LIKE '%$s%'";

$result2 = mysqli_query($db, $sql) or die("Do�lo je do problema prilikom izvrsavanja upita...");
$n=mysqli_num_rows($result2);



  
 
if ($n > 0){
    
  

 
  echo "<table id='customers'>
  <tr>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Titula</th>
  </tr>";
  //you can add thead tag here if you want your table to have column headers
   while($rowitem = mysqli_fetch_array($result2)) {
      echo "<tr>";
      echo "<td>" . $rowitem['FIRST_NAME'] . "</td>";
      echo "<td>" . $rowitem['LAST_NAME'] . "</td>";
      echo "<td>" . $rowitem['TITLE'] . "</td>";
      
      echo "</tr>";
  }
  }
else {
//echo "No patern rows returned<br>";
}	
}
else {
echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/
	
}

// Output "no suggestion" if no hint was found or output correct values 

?>