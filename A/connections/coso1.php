<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "mysql2.000webhost.com";
$db = "a4696266_agenda";
$usuario = "a4696266_rotsen";
$contra = "12452magicad";
$coso1 = mysql_pconnect($host, $usuario, $contra) or trigger_error(mysql_error(),E_USER_ERROR); 
?>