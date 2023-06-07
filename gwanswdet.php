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
            Answer Rate Detail
        </title>
    </head>
    <body>
		<h1>Answer Rate Detail</h1>
       <form action="" method="post">
        <?php
        $query = "select * from AnswerRate where $column like '%$search%'";
$result = mysqli_query($conn, $query);
?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Month</th>
    <th>Date</th>
    <th>GW Answer Rate</th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $data['Month']; ?> </td>
   <td><?php echo $data['Date']; ?> </td>
   <td><?php echo $data['GWAnswerRate']; ?> </td>
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