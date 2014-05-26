<?php

defined ('main') or die ('no direct access');
require_once("googlemap/config.php");

$title = $allgAr['title'] . ' :: Googlemap';
$hmenu = 'Googlemap';
$design = new design ($title , $hmenu);
$design->header();

$tpl = new tpl ('googlemap.htm');
$tpl->out(0);

ob_start();

?>

<script src="http://maps.google.com/maps?hl=de&file=api&amp;v=2&amp;key=<?php echo GOOGLE_MAP_KEY; ?>" type="text/javascript"></script>
<script type="text/javascript">
	var iconmember = new GIcon();
	iconmember.shadow = "include/contents/googlemap/images/mm_20_shadow.png";
	iconmember.iconSize = new GSize(12, 20);
	iconmember.shadowSize = new GSize(22, 20);
	iconmember.iconAnchor = new GPoint(6, 20);
	iconmember.infoWindowAnchor = new GPoint(5, 1);

<?php
switch (strtoupper(GOOGLE_MAP_MEMBERPIN_COLOR)) {
    case "BLUE" : echo 'iconmember.image = "include/contents/googlemap/images/mm_20_blue.png";';
        break;
    case "GREEN" : echo 'iconmember.image = "include/contents/googlemap/images/mm_20_green.png";';
        break;
    case "YELLOW" : echo 'iconmember.image = "include/contents/googlemap/images/mm_20_yellow.png";';
        break;
    default : echo 'iconmember.image = "include/contents/googlemap/images/mm_20_blue.png";';
        break;
}

?>

	var iconuser = new GIcon();
	iconuser.shadow = "include/contents/googlemap/images/mm_20_shadow.png";
	iconuser.iconSize = new GSize(12, 20);
	iconuser.shadowSize = new GSize(22, 20);
	iconuser.iconAnchor = new GPoint(6, 20);
	iconuser.infoWindowAnchor = new GPoint(5, 1);

<?php
switch (strtoupper(GOOGLE_MAP_USERPIN_COLOR)) {
    case "BLUE" : echo 'iconuser.image = "include/contents/googlemap/images/mm_20_blue.png";';
        break;
    case "GREEN" : echo 'iconuser.image = "include/contents/googlemap/images/mm_20_green.png";';
        break;
    case "YELLOW" : echo 'iconuser.image = "include/contents/googlemap/images/mm_20_yellow.png";';
        break;
    default : echo 'iconuser.image = "include/contents/googlemap/images/mm_20_green.png";';
        break;
}

switch (strtoupper(GOOGLE_MAP_LEADERPIN_COLOR)) {
    case "TRUE" : echo 'var iconleader = new GIcon();';
        echo 'iconleader.image = "include/contents/googlemap/images/mm_20_red.png";';
        echo 'iconleader.shadow = "include/contents/googlemap/images/mm_20_shadow.png";';
        echo 'iconleader.iconSize = new GSize(12, 20);';
        echo 'iconleader.shadowSize = new GSize(22, 20);';
        echo 'iconleader.iconAnchor = new GPoint(6, 20);';
        echo 'iconleader.infoWindowAnchor = new GPoint(5, 1);';
        break;
    default : echo 'var iconleader = iconuser;';
        break;
}

?>

	var map = new GMap2(document.getElementById("map"));

	map.addControl(new GLargeMapControl());
	map.addControl(new GMapTypeControl());

	map.enableDoubleClickZoom();

<?php
switch (strtoupper(GOOGLE_MAP_REGION)) {
    case "EUROPE" : echo 'map.setCenter(new GLatLng(48.8, 8.5),     4);';
        break;
    case "NORTH AMERICA" : echo 'map.setCenter(new GLatLng(45.0, -97.0),   3);';
        break;
    case "SOUTH AMERICA" : echo 'map.setCenter(new GLatLng(-14.8, -61.2),  3);';
        break;
    case "NORTH AFRICA" : echo 'map.setCenter(new GLatLng(25.4, 8.4),     4);';
        break;
    case "SOUTH AFRICA" : echo 'map.setCenter(new GLatLng(-29.0, 23.7),   5);';
        break;
    case "NORTH EUROPE" : echo 'map.setCenter(new GLatLng(62.6, 15.4),    4);';
        break;
    case "EAST EUROPE" : echo 'map.setCenter(new GLatLng(51.9, 31.8),    4);';
        break;
    case "GERMANY" : echo 'map.setCenter(new GLatLng(51.1, 10.1),    5);';
        break;
    case "FRANCE" : echo 'map.setCenter(new GLatLng(47.2, 2.4),     5);';
        break;
    case "SPAIN" : echo 'map.setCenter(new GLatLng(40.3, -4.0),    5);';
        break;
    case "UNITED KINGDOM" : echo 'map.setCenter(new GLatLng(54.0, -4.3),    5);';
        break;
    case "DENMARK" : echo 'map.setCenter(new GLatLng(56.1, 9.2),     6);';
        break;
    case "SWEDEN" : echo 'map.setCenter(new GLatLng(63.2, 16.3),    4);';
        break;
    case "NORWAY" : echo 'map.setCenter(new GLatLng(65.6, 13.1),    4);';
        break;
    case "FINLAND" : echo 'map.setCenter(new GLatLng(65.1, 26.6),    4);';
        break;
    case "NETHERLANDS" : echo 'map.setCenter(new GLatLng(52.3, 5.4),     7);';
        break;
    case "BELGIUM" : echo 'map.setCenter(new GLatLng(50.7, 4.5),     7);';
        break;
    case "SUISSE" : echo 'map.setCenter(new GLatLng(46.8, 8.2),     7);';
        break;
    case "AUSTRIA" : echo 'map.setCenter(new GLatLng(47.7, 14.1),    7);';
        break;
    case "POLAND" : echo 'map.setCenter(new GLatLng(52.1, 19.3),    6);';
        break;
    case "ITALY" : echo 'map.setCenter(new GLatLng(42.6, 12.7),    5);';
        break;
    case "TURKEY" : echo 'map.setCenter(new GLatLng(39.0, 34.9),    6);';
        break;
    case "BRAZIL" : echo 'map.setCenter(new GLatLng(-12.0, -53.1),  4);';
        break;
    case "ARGENTINA" : echo 'map.setCenter(new GLatLng(-34.3, -65.7),  3);';
        break;
    case "RUSSIA" : echo 'map.setCenter(new GLatLng(65.7, 98.8),    3);';
        break;
    case "ASIA" : echo 'map.setCenter(new GLatLng(20.4, 95.6),    3);';
        break;
    case "CHINA" : echo 'map.setCenter(new GLatLng(36.2, 104.0),   4);';
        break;
    case "JAPAN" : echo 'map.setCenter(new GLatLng(36.2, 136.8),   5);';
        break;
    case "SOUTH KOREA" : echo 'map.setCenter(new GLatLng(36.6, 127.8),   6);';
        break;
    case "AUSTRALIA" : echo 'map.setCenter(new GLatLng(-26.1, 134.8),  4);';
        break;
    case "CANADA" : echo 'map.setCenter(new GLatLng(60.0, -97.0),   3);';
        break;
    case "WORLD" : echo 'map.setCenter(new GLatLng(25.0, 8.5),     2);';
        break;
    default : echo 'map.setCenter(new GLatLng(47.7, 14.1),    7);';
        break;
}

switch (strtoupper(GOOGLE_MAP_TYPE)) {
    case "SATELLITE" : echo 'map.setMapType(G_SATELLITE_MAP);';
        break;
    case "MAP" : echo 'map.setMapType(G_NORMAL_MAP);';
        break;
    default: case "HYBRID": echo 'map.setMapType(G_HYBRID_MAP);';
        break;
}

?>

	var user = new Array();
	var bounds = new GLatLngBounds();
	var marker = new Array();
	var html_text = new Array();

<?php
$where = '';
if ($menu->getA(1) == 'u') {
	$where .= ' AND a.id = ' . $menu->getE(1) . ' ';
} elseif ($menu->getA(1) == 'g') {
	$where .= ' AND b.gid = ' . $menu->getE(1) . ' ';
}

$db = db_query("SELECT a.id, a.name, a.staat, a.gmapkoords, a.wohnort, MIN(b.fid) AS fid, a.avatar
				FROM prefix_user a
				LEFT JOIN prefix_groupusers b ON a.id = b.uid
				WHERE a.name <> '' AND a.wohnort <> '' AND a.gmapkoords <> '' $where
				GROUP BY a.id, a.name, a.staat, a.gmapkoords, a.wohnort");
$i = 0;
while ($rowdata = db_fetch_assoc($db)) {
    $search_pattern = array("/[^A-Za-z0-9\[\]*.,=()!\"$%&^`´':;ß²³#+~_\-|<>\/@{}äöüÄÖÜ ]/");
    $replace_pattern = array("");
    $rowdata['name'] = preg_replace($search_pattern, $replace_pattern, $rowdata['name']);
    $search_pattern = "/.gif/";
    $replace_pattern = "";
    $rowdata['staat'] = preg_replace($search_pattern, $replace_pattern, $rowdata['staat']);
    $pinicon = 1;
    if ($rowdata['fid'] >= 1 AND $rowdata['fid'] <= 2) {
        $pinicon = 3;
    } elseif ($rowdata['fid'] > 2) {
        $pinicon = 2;
    }

    echo "\nuser[" . $i . "] = new Object();\n";
    echo "user[" . $i . "]['id'] = " . $rowdata['id'] . ";\n";
    echo "user[" . $i . "]['pinicon'] = " . $pinicon . ";\n";
    echo "user[" . $i . "]['name'] = '" . $rowdata['name'] . "';\n";
    echo "user[" . $i . "]['city'] = '" . $rowdata['wohnort'] . "';\n";
    echo "user[" . $i . "]['country'] = '" . $rowdata['staat'] . "';\n";
    echo "user[" . $i . "]['latlng'] = new GLatLng" . $rowdata['gmapkoords'] . ";\n";
    echo "user[" . $i . "]['avatar'] = '" . (file_exists($rowdata['avatar']) ? $rowdata['avatar'] : '') . "';\n";
    $i++;
}
if ($i == 0) {
	echo 'map.openInfoWindow(map.getCenter(), document.createTextNode("Keine Einträge für Karte gefunden."));';
}
?>

function createMarker(userindex, maxindex) {
	var addmarker = 0;
	var act_latlng = ""+user[userindex]['latlng'];
    var avatar = '';
    if (user[userindex]['avatar'] != '') {
      avatar = '<tr><td colspan="2"><img src="' + user[userindex]['avatar'] + '" border="0" style="max-width:64px;" /></td></tr>';
    }
    html_text[userindex] = '<table border=0 style="text-align:left;"><tr><td colspan="2" align="left" style="border-bottom:1px solid black;"><a href="index.php?user-details-'+user[userindex]['id']+'" style="color:blue;font-weight:bold;text-decoration:none;"><small>'+user[userindex]['name']+'</small></a></td></tr>'+
                           '<tr><td><small><span style="color: black;">Location</span></small></td><td><small><span style="color: black;">'+user[userindex]['city']+', '+user[userindex]['country']+'</span><small></td></tr>'+
                           avatar + '</table>';
	if (user[userindex]['pinicon'] == 2) {
		marker[userindex] = new GMarker(user[userindex]['latlng'], iconmember);
	} else if (user[userindex]['pinicon'] == 3) {
		marker[userindex] = new GMarker(user[userindex]['latlng'], iconleader);
	} else {
		marker[userindex] = new GMarker(user[userindex]['latlng'], iconuser);
	}
	for (var i = 0; i < marker.length; i++) {
		if (marker[i] == undefined) continue;
		var check_latlng = ""+marker[i].getLatLng();
		if ((act_latlng == check_latlng) && (i != userindex)) {
			html_text[i] = html_text[i] + html_text[userindex];
		    marker[i].bindInfoWindowHtml(html_text[i]);
		 	marker.pop();
		    addmarker = 0;
			break;
		} else {
			addmarker = 1;
		}
	}
	if (addmarker == 1) {
		map.addOverlay(marker[userindex]);
		bounds.extend(marker[userindex].getLatLng());
 	    marker[userindex].bindInfoWindowHtml(html_text[userindex]);
	}
	if (userindex < maxindex) {
		createMarker(userindex+1, maxindex);
	} else {
		<?php if (GOOGLE_MAP_AUTOZOOM == 'TRUE') { ?>
		var newzoom = map.getBoundsZoomLevel(bounds);
		if (newzoom > <?php echo GOOGLE_MAP_MAXZOOM; ?>) {
			newzoom = <?php echo GOOGLE_MAP_MAXZOOM; ?>;
		}
		map.setZoom(newzoom);
		map.setCenter(bounds.getCenter());
		<?php } ?>
		map.getInfoWindow().hide();
		document.getElementById('gmUsersLoading').style.display = 'none';
	}
}

createMarker(0, user.length-1);
</script>

<?php

$addtobodyend = ob_get_contents();
ob_end_clean();
$design->addtobodyend($addtobodyend);
$design->footer();

?>