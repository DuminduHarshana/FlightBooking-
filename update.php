<?php

session_start();
include_once 'config.php';
$result = mysqli_query($conn,"SELECT * FROM users");
?>
<!DOCTYPE html>
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
<link rel="stylesheet" href="style2.css">
<title>Update User data</title>
</head>
<body>
	<nav>
      <ul id="menu">
        <li id="menu_active"><a href="index.html"><span><span>Home</span></span></a></li>
        <li id="menu_active"><a href="update.php"><span><span>View Profile and Update details</span></span></a></li>
        <li class="menu_active"><a href="contacts.html"><span><span>Contacts</span></span></a></li>
        <li> <a href="index.html?logout='1'";>logout</a> </li>
      </ul>
    </nav><br><br><br><br><br><br><br><br><br>
<table class="tblSaveForm" border="0" cellpadding="10" cellspacing="0" width="500" align="center">
<tr>
<td>id</td>
<td>Username</td>
<td>Email</td>
<td>Password</td>
<td>Action</td>
</tr>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["password"]; ?></td>
<td><a href="updateprocess.php?id=<?php echo $row["id"]; ?>">Update</a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>