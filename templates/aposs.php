<?php include("../includes/header.php"); ?>

<div id="ht-section">
<div id="results-name">APOSS 2013 Results</div>
<form method="post">
<b>Hallticket Number :</b> <input class="hbox" type="text" name="hnumber">
<input class="submit" type="submit" name="treasure" value="Submit"></input>
</form>
<span>Ex: 1219222115</span>
</div>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

$hallticket = $_POST["hnumber"];
$sql = "SELECT * FROM aposs where htlno='$hallticket' ";

mysql_select_db('results');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
    die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "Hallticket  : {$row['htlno']}    <br> ".
         "Name        : {$row['name']}     <br> ".
         "Father Name : {$row['fname']}    <br> ".
         "Total Marks : {$row['tmarks']}   <br> ".
         "Result      : {$row['result']}   <br> ".
         "Grade       : {$row['grade']}    <br> ".
         
         "--------------------------------<br>";

echo '<table class="result-output">
<tr><td class="tname">Hallticket Number : </td><td>'.$row['htlno'].' </td></tr>
<tr><td class="tname">Name :              </td><td>'.$row['name'].'  </td></tr>
<tr><td class="tname">Father Name:        </td><td>'.$row['fname'].' </td></tr>
<tr><td class="tname">Total Marks :       </td><td>'.$row['tmarks'].'</td></tr>
<tr><td class="tname">Result:             </td><td>'.$row['result'].'</td></tr>
<tr><td class="tname">Grade :             </td><td>'.$row['grade'].' </td></tr>
</table>';
} 
echo "Fetched data successfully\n";
mysql_close($conn);
$hallticket="";
?>
<div id="note"><b>Disclaimer</b> : The Examination Results published in this WebSite is only for the immediate Information to the Examinees and does not constitute to be a Legal Document. While all efforts have been made to make the Information available on this WebSite as Authentic as possible, We are not responsible for any InAdvertent Error that may have crept in the Examination Results being published in this WebSite and for any loss to anybody or anything caused by any ShortComing, Defect or InAccuracy of the Information on this WebSite.</div>
<?php include("../includes/footer.php"); ?>

</div>
</body>
</html>
