<?php 
	$totalWorkTime=$_SESSION['customer']['totalWorkTime'];		//MySQLから値持ってきて代入
	$totalRestTime=$_SESSION['customer']['totalRestTime'];

	$totalWorkTime=gmdate("H:i:s", $totalWorkTime);       //表記をhh:mm:ssに変更
	$totalRestTime=gmdate("H:i:s", $totalRestTime);
?>


<table class="cp_table">
<tr>
<th>累積作業時間</th>
<td><?php echo "$totalWorkTime"; ?></td>
</tr>
<tr>
<th>累積休憩時間</th>
<td><?php echo "$totalRestTime"; ?></td>
</tr>
</table>

<style>
.cp_table *, .cp_table *:before, .cp_table *:after {
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}
.cp_table {
	width: 100%;
	border-collapse: collapse;
}
.cp_table th, .cp_table  td {
	padding: 10px;
	border: 1px solid #dddddd;
}
.cp_table th {
	width: 30%;
	text-align: left;
	background: #f4f4f4;
}
@media only screen and (max-width:480px) {
	.cp_table {
		margin: 0;
	}
	.cp_table th, .cp_table td {
		width: 100%;
		display: block;
		border-top: none;
	}
	.cp_table tr:first-child th {
		border-top: 1px solid #dddddd;
	}
}
</style>