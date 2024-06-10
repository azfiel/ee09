<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forum o psach</title>
	<link rel="stylesheet" href="styl4.css">
</head>
<body>
	<header>
		<h1>Forum wielbicieli psów</h1>
	</header>

	<div id="lewy">
		<img src="obraz.jpg" alt="foksterier">
	</div>

	<div class="prawy">
		<h2>Zapisz się</h2>
		<form method="POST">
			login: <input type="text" name="login"><br>
			haslo: <input type="password" name="haslo"><br>
			powtorz haslo: <input type="password" name="haslo2"><br>
			<input type="submit" value="Zapisz">
		</form>

		<?php
			error_reporting(0);
			$pol=mysqli_connect('localhost','root','','psy');
			$ok=1;
			$login=$_POST['login'];
			$haslo=$_POST['haslo'];
			$haslo2=$_POST['haslo2'];

			if (empty($login) or empty($haslo) or empty($haslo2)) {
				echo "<p>wypełnij wszystkie pola</p>";
				$ok=0;
			}
			if ($haslo!=$haslo2) {
				echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
				$ok=0;
			}
			$sql=mysqli_query($pol,"SELECT login FROM uzytkownicy WHERE login='$login'");
			if (mysqli_num_rows($sql)>0) {
				echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
				$ok=0;
			}
			if ($ok==1) {
				$haslo=sha1($haslo);
				$sql2=mysqli_query($pol,"INSERT INTO uzytkownicy(login,haslo) VALUES('$login','$haslo')");
				echo "Konto zostało dodane";
			}
			mysqli_close($pol);
		?>
	</div>

	<div class="prawy">
		<h2>Zapraszamy wszystkich</h2>
		<ol>
			<li>właścicieli psów</li>
			<li>weterynarzy</li>
			<li>tych, co chcą kupić psa</li>
			<li>tych, co lubią psy</li>
		</ol>
		<a href="regulamin.html">Przeczytaj regulamin forum</a>
	</div>

	<footer>
		Stronę wykonał: 00000000000
	</footer>
</body>
</html>