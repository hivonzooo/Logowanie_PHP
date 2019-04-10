<?php
	function sprawdz_haslo() {
		if (!(isset($_POST['uzytkownik']) && isset($_POST['haslo'])))
			return FALSE;

		$u = $_POST['uzytkownik'];
		$h = $_POST['haslo'];

		echo "$u $h\n";

		$db = mysqli_connect();

		if (!$db) {
			echo "Blad\n";
			return FALSE;
		}
		if (!mysqli_select_db($db, 'logowanie')) {
			echo mysqli_error($db) . "\n";
			mysqli_close($db);
			return FALSE;
		}

		$sql = "SELECT haslo FROM logowanie WHERE uzytkownik = '$u';";

		$w = mysqli_query($db, $sql);

		if (!$w) {
			mysqli_close($db);
			return FALSE;
		}

		$r = mysqli_fetch_row($w);

		if (!$r) {
			mysqli_close($db);
			return FALSE;
		}

		if ($r[0] != $h)
			return FALSE;
		return TRUE;;
}

if (sprawdz_haslo() !== FALSE) {
	header("Location: glowna.html");
	exit();
}
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Błąd logowania</title>
	<style>
		body {
			font: 12pt serif; 
			color: black; 
			background: white;
			margin-left: 10%; 
			margin-right: 10%;
		}
		h1, h2, h3, h4, h5, h6 {
			color: #900020; 
			background: white;}
	</style>
</head>

<body>
	<p>Błąd logowania.</p>
	<p><a href="index.php">Powrót do logowania.</a></p>
</body>
</html>