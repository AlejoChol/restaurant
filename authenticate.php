<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'poli_uno';
$DATABASE_PASS = 'poli1';
$DATABASE_NAME = 'poli_dos';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['username'], $_POST['password']) ) {
	die ('Por favor llene el nombre de usuario y la contraseña!');
}

if ($stmt = $con->prepare('SELECT id, password FROM admins WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	if (password_verify($_POST['password'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		header('Location: show_database.php');
	} else {
		echo 'Contraseña incorrecta!';
	}
} else {
	echo 'Nombre de usuario incorrecto!';
}
$stmt->close();
?>