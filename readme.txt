GoogleMap v2.2a f�r IlchClan 1.1:
""""""""""""""""""""""""""""""""

Beschreibung:
-------------
Stellt eine GoogleMap mit Usern anhand des im Profil eingetragenen Wohnorts und Landes dar.

Entwickelt
----------
� von ArsiRC, Andreas Pachler
  und Mairu
� auf Basis von IlchClan 1.1 J <- geht nicht mit �lteren Versionen

Changelog:
----------
� Version 2.2a 
	- Hinzuf�gen von Optionen f�r Automatischen Zoom in der config.php -> also anpassen und vorm �berschreiben auch darauf achten seinen Key nicht zu verlieren ;)
	- Fehler behoben bei Problemen von Usern mit gleichem Wohnort
	ge�nderte Dateien: include/contents/googlemap.php +  include/contents/googlemap/config.php
� Version 2.2
	- Hinzuf�gen der Parameter f�r Gruppen (?googlemap-gID) und User (?googlemap-uID) um die Karte f�r einzelne User/Gruppen aufzurufen
	- Laden (der Karte) etwas ge�ndert, keine Anzeige mehr von "User werden geladen" innerhalb der Karte
	- Karte wird nicht mehr automatisch zentriert
	- Hinweis zum �ndern der Profilanzeige, damit man die Map aus dem Profil aufrufen kann hinzugef�gt, bei Installationsanleitung
	- "GOOGLE_MAP_LEADERPIN_COLOR", kann nun auch auf False gesetzt sein
	(bei Update von 2.1 kein Aufruf von install_googlemap.php notwendig)
� Version 2.1b
	- Fix f�r Adminbereich, da Auswahl von Eintr�ge nicht funktionierte, wenn es nur einen User in der Liste gab
� Version 2.1a f�r Ilch 1.1J und h�her
	- Anpassungen, da alte Version nicht funktionierte
� Version 2.1 f�r Ilch 1.1J
	- Kompatibilit�t mit IE gew�hrleitet (Script am Ende der HTML Datei)
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
� einen neuen GoogleMap-Key von http://www.google.com/apis/maps/signup.html holen (ein kopierter Key von einer anderen Seite funktioniert nicht bzw. nur bei localhost)
� den GoogleMap-Key in der "config.php" eintragen
� weitere Einstellungen in der Datei "config.php" anpassen
� die Datei "googlemap.php" bei Standardinstallation nicht ver�ndern!
� die H�he/Breite der GoogleMap kann im Template mittels "height" und "width" angepasst werden,
  Breite ist auf 100% eingestellt und muss normalerweise auch nicht ver�ndert werden, bei Problemen im IE keine Prozentangaben verwenden
� alle Dateien im Ordner upload, in ihrer Ordnerstrucktur hochladen (ggf. nur �nderungen �bernehmen mit WinMerge etc. falls profil_edit schon ge�ndert)
� die Datei "install_googlemap.php" aufrufen
	- Aufruf �ber "http://www.deinedomain.xx./install_googlemap.php" um das Script zu installieren
	- nach der Installation die Datei "install_googlemap.php" sofort l�schen!!!
� einbinden von GoogleMap in Ilch
	- Adminbereich ==>
 	  Admin/Naviagtion ==>
	  Box, Men� oder Men�punkt ==>
	  Name: Beliebig; Typ: Men�punktwahl + googlemap.php ausw�hlen; Ebene, Men� und Position nach Bedarf
� Wenn nun noch Fehler im IE kommen, muss fehlt deinem Design (include/desings/XXX/index.htm) wahrscheinlich ein DOCTYPE, den du nun einf�gen solltest
  -> http://de.selfhtml.org/html/allgemein/grundgeruest.htm bzw. http://de.selfhtml.org/html/allgemein/grundgeruest.htm#dokumenttyp
  dabei kann unter Umst�nden hilfreich sein, diesen wirklich nur f�r die Googlemap zu verwenden (falls sonstige Probleme mit dem Designs auftreten),
  daf�r die design.ini (falls nicht vorhanden eine leere Datei mit diesem Namen im include/desings/XXX Ordner erstellen und folgende Zeile)
  googlemap = "index_gmap.htm"
  einf�gen und dann die index_gmap.htm mit dem Inhalt der index.htm erstellen und halt den Doctype mit einf�gen
  (http://www.easypagez.com/maps/ieworking.html)
	  
� Optional - Einf�gen eines Links bei den Userdetails
  - daf�r die folgende Datei bearbeiten, include/includes/func/profilefields.php
	und darin folgende Funktion einf�gen, z.B. ganz am Ende �ber ?> f�r wen es anders zu kompliziert ist
	
	function profilefields_show_spez_wohnort($value, $uid){
		global $lang;
		return ( profilefields_show_echo_standart( $lang['hometown'], empty($value) ? '' : $value . ' <a href="?googlemap-u'.$uid.'">(Googlemap)</a>'));
	}

� Optional - im extras Ordner ist noch eine googlemap.php (f�r include/contents/googlemap.php) die mit Avataranzeige auf der Karte ist

� Optional - folgenden Code in der include/contents/googlemap.php einf�gen, und zwar �ber </script> am Ende der Datei
	
	GEvent.addListener(marker[userindex], 'mouseover', function(){ marker[userindex].openInfoWindow(html_text[userindex]); });

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