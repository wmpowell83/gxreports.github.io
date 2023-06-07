<?php
$search = $_POST['search'];
$column = $_POST['column'];

$servername = "localhost";
$username = "wmpowell";
$password = "Crush7322";
$db = "gxreporting";

   $conn = new mysqli($servername, $username, $password, $db);
   if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
?>
<html>
    <head>
        <title>
            Agent Phone Report by Month
        </title>
    </head>
    <body>
		<h1>Agent Phone Report Sorted by Month</h1>
       <form action="" method="post">
        <?php
        $sql = "select Month, TeamLead, Agent, avg(AverageWrap), avg(MissedPct), avg(AnswerRate) from PhoneStats where $column like '%$search%' Group by Month order by Month"; 
if ($result = mysqli_query($conn, $sql))

?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Month</th>
    <th>Agent</th>
    <th>Avg Wrap Time</th>
	 <th>Avg Missed Percent</th>
	 <th>Avg Answer Rate</th>  
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['Month']; ?> </td>
   <td><?php echo $data['Agent']; ?> </td>
   <td><?php echo $data['avg(AverageWrap)']; ?> </td>
   <td><?php echo $data['avg(MissedPct)']; ?> </td>
   <td><?php echo $data['avg(AnswerRate)']; ?> </td>
     <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
 </table
 
    </body>
</html>