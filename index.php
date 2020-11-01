<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta chatset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>4eachblog掲示板</title>
	</head>

	<body>
		<?php

			mb_internal_encoding("utf8");

			$pdo = new PDO ("mysql:dbname=php_exercise; host=localhost;", "root", "mysql");

			$stmt = $pdo->query ("select * from 4each_keijiban");
			?>

		<header>
			<img src="4eachblog_logo.jpg" class="logo">
			<ul class="top-menu">
				<li>トップ</li>
				<li>プロフィール</li>
				<li>4eachについて</li>
				<li>登録フォーム</li>
				<li>問い合わせ</li>
				<li>その他</li>
			</ul>
		</header>

		<main>
			<div class="main">
				<div class="main-form">
					<h1 id="page-title">プログラミングに役立つ掲示板</h1>

					<form action="insert.php" method="POST">
						<h1>入力フォーム</h1>
						<div>
							<label>ハンドルネーム</label>
							<br>
							<input type="text" name="handlename" class="text" />
						</div>

						<div>
							<label>タイトル</label>
							<br>
							<input type="text" name="title" class="text" />
						</div>

						<div>
							<label>コメント</label>
							<br>
							<textarea name="comments"></textarea>
						</div>

						<div>
							<input type="submit" value="投稿する" class="submit" />
						</div>
					</form>
				</div>

				<div class="opinion">
					<?php

					while($row = $stmt->fetch()){
						echo "<div class='kiji'>";
							echo "<h3>".$row['title']."</h3>";
							echo "<div class='contents'>";
							echo $row['comments'];
								echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
							echo "</div>";
						echo "</div>";
					}
					?>
				</div>
			</div>

			<div class="side">
				<aside id="popular">
					<h2>人気の記事</h2>
					<ul>
						<li>PHPオススメ本</li>
						<li>PHP　MyAdminの使い方</li>
						<li>いま人気のエディタ Top5</li>
						<li>HTMLの基礎</li>
					</ul>
				</aside>
				<aside id="recommended-link">
					<h2>オススメリンク</h2>
					<ul>
						<li>インターノウス株式会社</li>
						<li>XAMPPのダウンロード</li>
						<li>Eclipseのダウンロード</li>
						<li>Bracketsのダウンロード</li>
					</ul>
				</aside>
				<aside id="catogory">
					<h2>カテゴリ</h2>
					<ul>
						<li>HTML</li>
						<li>PHP</li>
						<li>MySQL</li>
						<li>JavaScript</li>
					</ul>
				</aside>
			</div>
		</main>

		<footer>
			copyright internous | 4each blog is the one which provides A to Z about programming.
		</footer>
	</body>
</html>