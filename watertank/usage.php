<?php

include("db_con.php");

$result = mysqli_query($conn,"select year(date_time) as year, month(date_time) as month, ROUND(sum(sensor5),3) as total_usage from logs1 group by year(date_time), month(date_time)");
$row = mysqli_fetch_array($result);
$total = $row["total_usage"];
$english_format_number = number_format($total, 2, '.', '');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
	/*** Table Styles **/

.table-fill {
    background: white;
    border-radius: 3px;
    border-collapse: collapse;
    height: 320px;
    margin: auto;
    max-width: 600px;
    padding: 5px;
    width: 100%;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    animation: float 5s infinite;
}

th {
    color: #D5DDE5;
    ;
    background: #1b1e24;
    border-bottom: 4px solid #9ea7af;
    border-right: 1px solid #343a45;
    font-size: 23px;
    font-weight: 100;
    padding: 24px;
    text-align: left;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    vertical-align: middle;
}

th:first-child {
    border-top-left-radius: 3px;
}

th:last-child {
    border-top-right-radius: 3px;
    border-right: none;
}

tr {
    border-top: 1px solid #C1C3D1;
    border-bottom: 1px solid #C1C3D1;
    color: #666B85;
    font-size: 16px;
    font-weight: normal;
    text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}

tr:hover td {
    background: #4E5066;
    color: #FFFFFF;
    border-top: 1px solid #22262e;
}

tr:first-child {
    border-top: none;
}

tr:last-child {
    border-bottom: none;
}

tr:nth-child(odd) td {
    background: #EBEBEB;
}

tr:nth-child(odd):hover td {
    background: #4E5066;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 3px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 3px;
}

td {
    background: #FFFFFF;
    padding: 20px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 18px;
    text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    border-right: 1px solid #C1C3D1;
}

td:last-child {
    border-right: 0px;
}

th.text-left {
    text-align: left;
}

th.text-center {
    text-align: center;
}

th.text-right {
    text-align: right;
}

td.text-left {
    text-align: left;
}

td.text-center {
    text-align: center;
}

td.text-right {
    text-align: right;
}
</style>

</head>
<body>


<table class="table-fill">
	<thead>
		<tr>
		<th class="text-left">Year</th>
		<th class="text-left">Month</th>
		<th class="text-left">Total Usage ( Litres )</th>
		</tr>
	</thead>
	<tbody class="table-hover">
<tr>

<?php
include("db_con.php");
include_once 'db_params_wt.php';
include_once '../util/db_query.php';
include_once 'util_functions_wt.php';

	$i=0;
	while($row = mysqli_fetch_array($result)) {
	$monthNum  = $row["month"];
	$dateObj   = DateTime::createFromFormat('!m', $monthNum);
	$monthName = $dateObj->format('F');
?>
			  <tr>
				<td><?php echo $row["year"]; ?></td>
				<td><?php echo $monthName; ?></td>
				<td><?php echo $row["total_usage"]; ?></td>
			  </tr>
			  <?php
$i++;
}
?>
			</tbody>
  </table>
</div>

</body>
</html>