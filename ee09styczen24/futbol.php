<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta lang="pl-PL">
	<title>Rozgrywki futbolowe</title>
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>

	<header>
		<h2>Światowe rozgrywki piłkarskie</h2>
		<img src="obraz1.jpg" alt="boisko">
	</header>



	<div id="mecze">
		<?php
			$pol=mysqli_connect("localhost","root","","egzamin");
			$sql=mysqli_query($pol,"SELECT zespol1,zespol2,wynik,data_rozgrywki FROM rozgrywka WHERE zespol1='EVG'");
			while ($row=mysqli_fetch_array($sql)) {
				echo "<div class=informacja>
				<h3>$row[zespol1] - $row[zespol2]</h3>
				<h4>$row[wynik]</h4>
				<p>w dniu: $row[data_rozgrywki]</p>
				</div>";
			}
		?>
	</div>


	<div id="glowny">
		<h2>Reprezentacja Polski</h2>
	</div>


	<div id="lewy">
		<p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
		<form method="POST">
			<input type="number" name="numer">
			<input type="submit" value="Sprawdź">
		</form>
		<ul>
			<?php
				$numer=$_POST['numer'];
				if (!empty($numer)) {
					$sql2=mysqli_query($pol,"SELECT imie,nazwisko FROM zawodnik WHERE pozycja_id=$numer");
					while ($row=mysqli_fetch_array($sql2)) {
						echo "<li>$row[imie] $row[nazwisko]</li>";
					}
				}
				mysqli_close($pol);
			?>
		</ul>
	</div>


	<div id="prawy">
		<img src="zad1.png" alt="piłkarz">
		<p>Autor: 00000000000</p>
	</div>


</body>
</html>