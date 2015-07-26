<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Formulario = "localhost";
$database_Formulario = "cmo_culturadamulher";
$username_Formulario = "root";
$password_Formulario = "123";
$Formulario = mysqli_connect($hostname_Formulario, $username_Formulario, $password_Formulario) or trigger_error(mysql_error(),E_USER_ERROR);
?>
