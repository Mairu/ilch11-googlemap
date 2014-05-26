GoogleMap v2.2a für IlchClan 1.1:
""""""""""""""""""""""""""""""""

Beschreibung:
-------------
Stellt eine GoogleMap mit Usern anhand des im Profil eingetragenen Wohnorts und Landes dar.

Entwickelt
----------
° von ArsiRC, Andreas Pachler
  und Mairu
° auf Basis von IlchClan 1.1 J <- geht nicht mit älteren Versionen

Changelog:
----------
° Version 2.2a 
	- Hinzufügen von Optionen für Automatischen Zoom in der config.php -> also anpassen und vorm Überschreiben auch darauf achten seinen Key nicht zu verlieren ;)
	- Fehler behoben bei Problemen von Usern mit gleichem Wohnort
	geänderte Dateien: include/contents/googlemap.php +  include/contents/googlemap/config.php
° Version 2.2
	- Hinzufügen der Parameter für Gruppen (?googlemap-gID) und User (?googlemap-uID) um die Karte für einzelne User/Gruppen aufzurufen
	- Laden (der Karte) etwas geändert, keine Anzeige mehr von "User werden geladen" innerhalb der Karte
	- Karte wird nicht mehr automatisch zentriert
	- Hinweis zum Ändern der Profilanzeige, damit man die Map aus dem Profil aufrufen kann hinzugefügt, bei Installationsanleitung
	- "GOOGLE_MAP_LEADERPIN_COLOR", kann nun auch auf False gesetzt sein
	(bei Update von 2.1 kein Aufruf von install_googlemap.php notwendig)
° Version 2.1b
	- Fix für Adminbereich, da Auswahl von Einträge nicht funktionierte, wenn es nur einen User in der Liste gab
° Version 2.1a für Ilch 1.1J und höher
	- Anpassungen, da alte Version nicht funktionierte
° Version 2.1 für Ilch 1.1J
	- Kompatibilität mit IE gewährleitet (Script am Ende der HTML Datei)
° Version 2.0
	- Längen und Breiten Grade werden in der User-Tabelle gespeichert
	- vollständige Beseitigung des "Sorry, cant find city ..." Fehlers
	  wenn der angegebene Wohnort wirklich existiert
	- Im Userprofil werden die Koordinaten im Hintergrund eingetragen - Anzeige ob von GoogleMap erkannt
	- Adminmenü in dem die Koordinaten ausgerechnet werden können
° Version 1.7
	- Wenn zwei User in der selben Stadt wohnen ist dies nun
	  in der Infobox ersichtlich
	- Nun wird 5x gesucht wenn eine Stadt nicht gefunden
	  wurde und erst nach dem 5ten mal eine Fehlermeldung
	  ausgegeben wenn die Stadt nicht gefunden wird
° Version 1.5
	- behebt den Fehler "Sorry, cant find city ..."
	- es kann nun für User und Member eine andere Farbe für
	  den Pin gewählt werden
° Version 1.1
	- arbeitet nun auch mit dem IE fehlerfrei zusammen

Installation:
-------------
° einen neuen GoogleMap-Key von http://www.google.com/apis/maps/signup.html holen (ein kopierter Key von einer anderen Seite funktioniert nicht bzw. nur bei localhost)
° den GoogleMap-Key in der "config.php" eintragen
° weitere Einstellungen in der Datei "config.php" anpassen
° die Datei "googlemap.php" bei Standardinstallation nicht verändern!
° die Höhe/Breite der GoogleMap kann im Template mittels "height" und "width" angepasst werden,
  Breite ist auf 100% eingestellt und muss normalerweise auch nicht verändert werden, bei Problemen im IE keine Prozentangaben verwenden
° alle Dateien im Ordner upload, in ihrer Ordnerstrucktur hochladen (ggf. nur Änderungen übernehmen mit WinMerge etc. falls profil_edit schon geändert)
° die Datei "install_googlemap.php" aufrufen
	- Aufruf über "http://www.deinedomain.xx./install_googlemap.php" um das Script zu installieren
	- nach der Installation die Datei "install_googlemap.php" sofort löschen!!!
° einbinden von GoogleMap in Ilch
	- Adminbereich ==>
 	  Admin/Naviagtion ==>
	  Box, Menü oder Menüpunkt ==>
	  Name: Beliebig; Typ: Menüpunktwahl + googlemap.php auswählen; Ebene, Menü und Position nach Bedarf
° Wenn nun noch Fehler im IE kommen, muss fehlt deinem Design (include/desings/XXX/index.htm) wahrscheinlich ein DOCTYPE, den du nun einfügen solltest
  -> http://de.selfhtml.org/html/allgemein/grundgeruest.htm bzw. http://de.selfhtml.org/html/allgemein/grundgeruest.htm#dokumenttyp
  dabei kann unter Umständen hilfreich sein, diesen wirklich nur für die Googlemap zu verwenden (falls sonstige Probleme mit dem Designs auftreten),
  dafür die design.ini (falls nicht vorhanden eine leere Datei mit diesem Namen im include/desings/XXX Ordner erstellen und folgende Zeile)
  googlemap = "index_gmap.htm"
  einfügen und dann die index_gmap.htm mit dem Inhalt der index.htm erstellen und halt den Doctype mit einfügen
  (http://www.easypagez.com/maps/ieworking.html)
	  
° Optional - Einfügen eines Links bei den Userdetails
  - dafür die folgende Datei bearbeiten, include/includes/func/profilefields.php
	und darin folgende Funktion einfügen, z.B. ganz am Ende über ?> für wen es anders zu kompliziert ist
	
	function profilefields_show_spez_wohnort($value, $uid){
		global $lang;
		return ( profilefields_show_echo_standart( $lang['hometown'], empty($value) ? '' : $value . ' <a href="?googlemap-u'.$uid.'">(Googlemap)</a>'));
	}

° Optional - im extras Ordner ist noch eine googlemap.php (für include/contents/googlemap.php) die mit Avataranzeige auf der Karte ist

° Optional - folgenden Code in der include/contents/googlemap.php einfügen, und zwar über </script> am Ende der Datei
	
	GEvent.addListener(marker[userindex], 'mouseover', function(){ marker[userindex].openInfoWindow(html_text[userindex]); });

Bekannte Einschränkungen / Fehler:
----------------------------------
° keine

Danksagungen:
-------------
Mr.Soapdown (exit)
Ilch.de
und alle die Ideen eingebracht haben

Haftungsausschluss:
-------------------
Ich übernehme keine Haftung für Schäden, die durch dieses Skript entstehen.
Benutzung ausschließlich AUF EIGENE GEFAHR.

Fehler bitte in das Forum auf ilch.de