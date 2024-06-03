<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<table style="with:100%" cellpadding="0" cellpadding="10" style="border:1px">
			<tr>
				<th>san pham</th>
				<th>gia tien</th>
				<th>so luong</th>
				<th>thanh tien</th>
			</tr>		
			<?php
				$sum = 0;
				foreach ($data['body'] as $key => $value) {
					$tong = $value['price'] * $value['qty'];
					$sum = $sum + $tong;
			?>
			<tr>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['price']; ?></td>
				<td><?php echo $value['qty']; ?></td>
				<td><?php echo $value['qty'] * $value['price']; ?></td>				
			</tr>
			<?php 
				}
			?>	
			<tr>
				<th>tong tien</th>
				<td><?php echo $sum; ?></td>
			</tr>	
	</table>
</body>
</html>