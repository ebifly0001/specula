<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BisLab Server</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>登録者リスト</h1>
	<?php
	try {
		$dsn = 'mysql:dbname=server;host=localhost';
		$user = 'root';
		$password = '';
		$dbh = new PDO($dsn, $user, $password); //データベースに接続
		$dbh->query('SET NAMES utf8'); //文字コードのための設定

		// データベースserver_tableからすべてのデータを取り出し、番号の昇順にならべる
		$sql = "SELECT num, name, status FROM server_table WHERE 1 ORDER BY num";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$dbh = null; //データベースから切断
		print "<table border=1 cellpadding=5>";
		print "<tr>";
		printf("<th> サーバー名 </th>");
		printf("<th> 登録名 </th>");
		printf("<th> 編集 </th>");
		printf("<th> 削除 </th>");
		print "</tr>";

		if(isset($_GET["name"])){
			$dbh = new PDO($dsn, $user, $password); //データベースに接続
			$dbh->query('SET NAMES utf8'); //文字コードのための設定

			$name = $_GET["name"];
			$status = 1;
			
			#$sql = "UPDATE server_table SET status = :status WHERE name = $name";
			$sql = "UPDATE server_table SET status = :status WHERE name = :name";
			$res = $dbh->prepare($sql);
			$params = array(':status'=>$status, ':name'=>$name);
			$res->execute($params);
			$dbh = null; //データベースから切断
		}

		while (true) {
			$rec = $stmt->fetch(PDO::FETCH_BOTH); //データベースからデータを1つずつ取り出す
			if ($rec == false) break; //データを取り出せなくなったらループ脱出
			print "<tr>";
			printf("<td> %s </td>", $rec["num"]);
			if ($rec["status"]==1) { //サーバー利用時は色を変える
				printf("<td style='background-color: #78FF94;'> %s </td>", $rec["name"]);
			} else {
				printf("<td> %s </td>", $rec["name"]);
			}
			printf("<td><input type=\"button\" value=\"編集\" onClick=\"location.href='edit.php?name=%s'\"></td>", $rec["name"]);
			printf("<td><input type=\"button\" value=\"削除\" onClick=\"location.href='delete.php?name=%s'\"></td>", $rec["name"]);
			print "</tr>";
		}
		print "</table>";
	} catch (Exception $e) {
		print 'サーバが停止しておりますので暫くお待ちください。';
		exit();
	}
	?>

	<br>
	<input type="button" value="新規登録" onClick="location.href='register.php'">
	<input type="button" value="使用状況" onClick="location.href='status.php'">

</body>

</html>