<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Persons Page</title>
</head>

<body>
    <h2>List Of Persons</h2>
    <hr noshade>
    <?php

# Open the database
@ $db = new mysqli('64.119.131.183', 'CCHUNGCHMELI', 'S03472187', 'cchungchmeli');
if ($db->connect_error) {
  echo "could not connect: " . $db->connect_error;
  exit();
}

$query = "select * from person";

 $resultSet = $db->query($query);
 $numRows = $resultSet->num_rows;

 #if ($numRows < 1 ) echo  "<p> No persons were found in database</p>";

$tableHeader= <<<EOD
 <table border="1" style="width:100%" cellpadding="10">
 <col bgcolor="#66CCFF" >
     <tr bgcolor="#FAD354" align="left">
      <th > Login ID </th>  
      <th> First Name </th>
      <th> Last Name </th>    
      <th> Picture Url</th>  
      <th> Biography </th>  
    </tr>
EOD;

if ($numRows != 0) {

  echo $tableHeader;

  while ($row = $resultSet->fetch_assoc()) {

  echo 

  "<tr>" .
  "<td>" . $row['LoginID']."</td>".
  "<td>" .  $row['FirstName']."</td>".
  "<td>" . $row['LastName']."</td>".
  "<td>" . $row['picUrl']."</td>".
  "<td>" .  $row['Bio']."</td>";

  }

echo "</table><br><hr>";

}

else {
  # Here we do not want to display table details if person table is empty
  echo "No records for persons were found";
}

echo "<h3>Today's Date Section</h3>";

 $todayDate = date("l F jS", time());
 $dayOfYear = date("z",time()) + 1;
 $year = date("Y",time());

echo $todayDate." is the $dayOfYear"."th day of $year<br><br><hr>";
echo "<h3>User Date Input Section</h3>";
?>

        <form action="persons.php" method="POST">
            <table bgcolor="#FAD354" cellpadding="10">
                <tr>
                    <td>Enter Date in mm/dd/yyyy format</td>
                    <td>
                        <INPUT type="text" name="userDateInput">
                    </td>
                </tr>
                <tr>
                    <td>
                        <INPUT type="submit" name="submit" value="Submit">
                    </td>
                    <tr>
            </table>
        </form>
        <br>
        <br>


        <?php

$dateIn; 
if(isset($_POST['userDateInput'])){
    $dateIn = $_POST['userDateInput'];


#function to return warnings in red
function print_warning($val) {


return "<font color=\"red\">$val</font>";
}    

#Checking invalid user inputs
if ($dateIn=="") echo print_warning("Empty Input. Please enter date!");   


if (strlen($dateIn) != 10 
        or substr($dateIn,2,1) != '/' 
          or substr($dateIn, 5,1) != '/') {
            echo print_warning("Please enter date in mm/dd/yyyy format"); }


            
else {            

$month = substr($dateIn,0,2) ;
$day = substr($dateIn,3,2) ;
$year = substr($dateIn,6,4);

$date=date_create($year."-".$month."-".$day);

#day of year start at 0 so we have to add 1
$yearDay = date_format($date,"z") + 1; 

#defining function to get correct suffix given a date as parameter
function getSuffix($someDate) 
{
  #getting the last letter
  $num = substr($someDate, -1);

  switch($num){

  case 1: return "st";
           break;
  case 2: return "nd";
          break;
  case 3: return "rd";
          break;
  default: return "th";
          break; }               
}


#checking date validity
if (checkdate($month, $day, $year)) 
  echo date_format($date,"F j, Y")." is the ".$yearDay.getSuffix($yearDay)." day of ".date_format($date,"Y");
  else echo "Date is invalid"; }
        
}
  
?>

</body>

</html>