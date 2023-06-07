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
            Agent Email Report
        </title>
    </head>
    <body>
		<h1>Agent Email Report</h1>
       <form action="" method="post">
        <?php
        $sql = "select Date, Agent, sum(Emails), sum(MissedEmails) from EmailCompletion where $column like '%$search%' Group by Agent "; 
if ($result = mysqli_query($conn, $sql))

?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Date</th>
   <th>Agent</th>
    <th>Emails Completed</th>
    <th>Emails Missed</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['Date']; ?> </td>
   <td><?php echo $data['Agent']; ?> </td>
   <td><?php echo $data['sum(Emails)']; ?> </td>
   <td><?php echo $data['sum(MissedEmails)']; ?> </td>
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