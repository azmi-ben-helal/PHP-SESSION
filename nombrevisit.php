<?php
/**
 * Created by PhpStorm.
 * User: MIRA
 * Date: 12/11/2018
 * Time: 22:53
 */

session_start();

if (key_exists('raz', $_POST)) {
	session_destroy();
    header("Location: nombrevisit.php", true, 303);
    die;
}

if (key_exists('visites', $_SESSION) && key_exists('heure', $_SESSION)) {

	$_SESSION['visites']++;
	$message = 'Vous avez visité cette page '.$_SESSION['visites'].' fois depuis '.$_SESSION['heure'].'.';
} else {
	$_SESSION['visites'] = 0;
	$_SESSION['heure'] = date("H:i:s");
	$message = 'C’est votre première visite ! Bienvenue.';
}

?>
<!DOCTYPE html>
<html >
<head>
	<title>Compteur de visites</title>
	<meta charset="UTF-8" />
</head>
<body>
	<h1>Compteur de visites</h1>
	<p><?php echo $message; ?></p>
	<p><form method="POST">
        <button name="raz">Retour à zéro</button>
    </form></p>
</body>
</html>
