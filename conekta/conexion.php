
<?php
$link = mysql_connect('localhost', 'equilzeg_bd', '8$0H.~p_M!6$')
    or die('No se pudo conectar: ' . mysql_error());

mysql_select_db('equilzeg_vacuna2020',$link) or die('No se pudo seleccionar la base de datos');
mysql_query("SET NAMES 'utf8'");

?>