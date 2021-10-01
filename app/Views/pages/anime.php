<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách anime đang xem</title>
</head>
<body>
	<?php echo $content; ?>
	<table>
		<thead>
			<tr>
				<th>Tên</th>
				<th>Xem xong thì nhớ xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($all as $row): ?>
			<tr>
				<td><a href="<?= $row['link']; ?>"><?= $row['name']; ?></a></td>
				<td><a href="/anime/delete/<?= $row['name']; ?>/<?= $row['anime_id']; ?>">Xóa</a></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	<br>
	<form action="/anime/add" method="post">
		<label>Tên</label>
		<input type="text" name="anime_name">
		<label>Link</label>
		<input type="text" name="anime_link">
		<button type="submit">Thêm</button>
	</form>
</body>
</html>