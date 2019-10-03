<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   
    $query = "SELECT * FROM `flights` WHERE CONCAT(`Destination`,`Depature`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `flights`WHERE (`Depature`)LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "registration");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
	
</style>	
	<title>Search results</title>
</head>


<body>
	<table>
<tr>				 <th>Depature</th>
                    <th>CallSign</th>
                    <th>Destination</th>
                    <th>Duration</th>
                    <th>Price</th>
                </tr>

                 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                	<td><?php echo $row['Depature'];?></td>
                    <td><?php echo $row['FlightCallSign'];?></td>
                    <td><?php echo $row['Destination'];?></td>
                    <td><?php echo $row['Duration'];?></td>
                    <td><?php echo $row['Price'];?></td>
                </tr>
                <?php endwhile;?>
    </table>
</body>
</html>
 
                