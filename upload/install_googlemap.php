<html>
<head>
<title>Installation von GoogleMap f&uuml;r ilch 1.1I</title>
<link rel="stylesheet" href="include/designs/ilchClan/style.css" type="text/css">
</head>
<body>

<form action="install_googlemap.php" method="POST" name="form">
		<table class="border" border="0" cellspacing="0" cellpadding="25" align="center">
      <tr><th class="Chead" align="center">I n s t a l l a t i o n &nbsp; v o n &nbsp; GoogleMap &nbsp; f &uuml; r &nbsp; i l c h  &nbsp; 1 . 1 I</th></tr>
      <tr>
        <td class="Cmite">
<?php
if ( empty ($_POST['step']) ) {
?>
<h2>Readme</h2>
<textarea cols="120" rows="15">
GoogleMap v2.0 f�r IlchClan 1.1:
""""""""""""""""""""""""""""""""

Beschreibung:
-------------
Stellt eine GoogleMap mit Usern anhand des im Profil eingetragenen Wohnorts und Landes dar.

Entwickelt
----------
� von ArsiRC, Andreas Pachler
  und Mairu
� auf Basis von IlchClan 1.1 I

Changelog:
----------
� Version 2.0
	- L�ngen und Breiten Grade werden in der User-Tabelle gespeichert
	- vollst�ndige Beseitigung des "Sorry, cant find city ..." Fehlers
	  wenn der angegebene Wohnort wirklich existiert
	- Im Userprofil werden die Koordinaten im Hintergrund eingetragen - Anzeige ob von GoogleMap erkannt
	- Adminmen� in dem die Koordinaten ausgerechnet werden k�nnen
� Version 1.7
	- Wenn zwei User in der selben Stadt wohnen ist dies nun
	  in der Infobox ersichtlich
	- Nun wird 5x gesucht wenn eine Stadt nicht gefunden
	  wurde und erst nach dem 5ten mal eine Fehlermeldung
	  ausgegeben wenn die Stadt nicht gefunden wird
� Version 1.5
	- behebt den Fehler "Sorry, cant find city ..."
	- es kann nun f�r User und Member eine andere Farbe f�r
	  den Pin gew�hlt werden
� Version 1.1
	- arbeitet nun auch mit dem IE fehlerfrei zusammen

Installation:
-------------
� einen neuen GoogleMap-Key von http://www.google.com/apis/maps/signup.html holen (ein kopierter Key von einer anderen Seite funktioniert nicht)
� den GoogleMap-Key in der "config.php" eintragen
� weitere Einstellungen in der Datei "config.php" anpassen
� die Datei "googlemap.php" bei Standartinstallation nicht ver�ndern!
� die H�he/Breite der GoogleMap kann im Template mittels "height" und "width" angepasst werden,
  Breite ist auf 100% eingestellt und muss normalerweise auch nicht ver�ndert werden
� alle Dateien im Ordner upload, in ihrer Ordnerstrucktur hochladen
� die Datei "install_googlemap.php" aufrufen
	- Aufruf �ber "http://www.deinedomain.xx./install_googlemap.php" um das Script zu installieren
	- nach der Installation die Datei "install_googlemap.php" sofort l�schen!!!
� im Adminbreich die Koordinaten f�r die User berechnen
� einbinden von GoogleMap in Ilch
	- Adminbereich ==>
 	  Admin/Naviagtion ==>
	  Box, Men� oder Men�punkt ==>
	  Name: Beliebig; Typ: Men�punktwahl + googlemap.php ausw�hlen; Ebene, Men� und Position nach Bedarf

Bekannte Einschr�nkungen / Fehler:
----------------------------------
� keine

Danksagungen:
-------------
Mr.Soapdown (exit)
Ilch.de
und alle die Ideen eingebracht haben

Haftungsausschluss:
-------------------
Ich �bernehme keine Haftung f�r Sch�den, die durch dieses Skript entstehen.
Benutzung ausschlie�lich AUF EIGENE GEFAHR.


Fehler bitte in das Forum auf ilch.de
</textarea><br /><br />

<input type="hidden" name="step" value="2" />
<input type="submit" value="Installieren" />
</td></tr></table>
<?php
} elseif ($_POST['step'] == 2) {
define ( 'main' , TRUE );
require_once ('include/includes/config.php');
require_once ('include/includes/loader.php');
echo '<input type="hidden" name="step" value="3" />';

db_connect();

//Usertabelle erweitern
$old = array();
$q = db_query("SHOW FULL COLUMNS FROM `prefix_user`");
while($r = db_fetch_object($q)){
    $old[] = $r->Field;
}

$update_user = '';
if (!in_array('gmapkoords',$old)) {
    $update_user .= 'ADD `gmapkoords` VARCHAR( 50 ) NOT NULL,';
}
if (in_array('postleitzahl',$old)) {
    $update_user .= ' DROP `postleitzahl`,';
}
$update_user = substr($update_user,0,-1);
if (!empty($update_user)) {
    db_query("ALTER TABLE `prefix_user` $update_user;");
}


//Modul in Modultabelle eintragen
if (db_result(db_query("SELECT COUNT(id) FROM prefix_modules WHERE url = 'googlemap'"),0) < 1) {
		db_query("INSERT INTO prefix_modules (`url`,`name`,`ashow`) VALUES ('googlemap','GoogleMaps',1)");
}

echo '<br /><br />Wenn keine Fehler aufgetreten sind, sollte die Installation ohne Probleme verlaufen sein und<br>du solltest die Datei "install_googlemap.php" nun vom Webspace l&ouml;schen.<br /><br />
Danach kannst du GoogleMap einbinden und im AdminMen� die Koordinaten bestimmen lassen.</td></tr></table>';

db_close();
}
?>
</form>
</body>
</html>