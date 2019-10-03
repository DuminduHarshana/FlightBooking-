<?php
include_once 'config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE users set userid='" . $_POST['id'] . "email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
	<link rel="stylesheet"  href="flightcs.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <meta charset="utf-8">
<link rel="stylesheet" href="css/newstyle.css" type="text/css" media="all">
<title>Update User Data</title>
<link rel="stylesheet"  href="style2.css">
</head>
<body>
	<nav>
      <ul id="menu">
        <li id="menu_active"><a href="index.html"><span><span>Home</span></span></a></li>
        <li id="menu_active"><a href="update.php"><span><span>View Profile and Update details</span></span></a></li>
        <li class="menu_active"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
        <li> <a href="index.html?logout='1'";>logout</a> </li>
        <li><a href="retrive.php">User List</a></li>
      </ul><br><br><br><br><br><br><br><br><br>
      <form name="frmUser" method="post" action="" style="width: 30%;
	margin: 0px auto;
	padding: 100px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
	font-family:Arial;
	font-size:17px;">
<div><?php if(isset($message)) { echo $message; } ?>
Username: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="username"  value="<?php echo $row['username']; ?>">
<br>
Email:<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
<br>
Password:<br>
<input type="password" name="password" class="txtField" value="<?php echo $row['password']; ?>">

<input type="submit" name="submit" value="Submit" class="buttom">

</form>
</body>
</html>