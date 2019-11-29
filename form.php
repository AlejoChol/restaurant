<html>
<head>
  <link rel="stylesheet" href="format_form.css">
</head>
<body>
<?php
echo "hola";
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'rootpassword';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);  
if(! $conn ) {
   die('No se pudo conectar' . mysql_error());
} 
if(! get_magic_quotes_gpc() ) {
$Nombre = addslashes ($_POST['Nombre']);
   $Apellido = addslashes ($_POST['Apellido']);
}else {
   $Nombre = ($_POST['Nombre']);
   $Apellido = ($_POST['Apellido']);
}
$Sexo = ($_POST['Sexo']);
$Nac = ($_POST['Nac']);
$Edad = ($_POST['Edad']);
$DNI = ($_POST['DNI']);
$Curso = ($_POST['Curso']);
$sql = "INSERT INTO registro ". "(Nombre, Apellido, Sexo, 
        Nac, Edad, DNI, Curso) ". "VALUES('$Nombre','$Apellido',$Sexo, $Nac, $Edad, $DNI, $Curso)";
   
mysql_select_db('test_db');
$retval = mysql_query( $sql, $conn );
if(! $retval ) {
   die('No se pudo ingresar la informacion' . mysql_error());
}
echo "Se ha podido ingresar con exito\n";
mysql_close($conn);
?>
</body>
</html>