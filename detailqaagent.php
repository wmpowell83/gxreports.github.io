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
            Agent QA Report
        </title>
    </head>
    <body>
		<h1>Agent QA Detail Report</h1>
       <form action="" method="post">
        <?php
        $sql = "select Id, EvaluationDate, TeamLead, Agent, avg(OverallScore) from CalabrioData where $column like '%$search%'Group by Id"; 
if ($result = mysqli_query($conn, $sql))

?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>EvaluationDate</th>
    <th>Agent</th>
    <th>Overall Score</th>
      </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['EvaluationDate']; ?> </td>
	   <td><?php echo $data['Agent']; ?> </td>
   <td><?php echo $data['avg(OverallScore)']; ?> </td>
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