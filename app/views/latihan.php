<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table style="border: 1px solid;">
	<?php foreach ($bobot as $b ) { ?>
	<tr style="border: 1px solid;">
		<td style="border: 1px solid;"><?php echo $b ['nama_kriteria']; ?></td>
		<td style="border: 1px solid;"><?php echo $b ['bobot_kriteria']; ?></td>
		<td style="border: 1px solid;"><?php echo $b ['ket_kriteria']; ?></td>
	</tr>
		<?php } ?>
</table>


</body>
</html>