<?php

defined ('main') or die ('no direct access');
require_once("googlemap/config.php");

//Generate Options for Js
$jsOptions = array();

//Region Settings: latLng + zoom
$regions = array(
    "default" => array(47.7, 14.1, 7),
    "EUROPE" => array(48.8, 8.5, 4),
    "NORTH AMERICA" => array(45.0, -97.0, 3),
    "SOUTH AMERICA" => array(-14.8, -61.2, 3),
    "NORTH AFRICA" => array(25.4, 8.4, 4),
    "SOUTH AFRICA" => array(-29.0, 23.7, 5),
    "NORTH EUROPE" => array(62.6, 15.4, 4),
    "EAST EUROPE" => array(51.9, 31.8, 4),
    "GERMANY" => array(51.1, 10.1, 5),
    "FRANCE" => array(47.2, 2.4, 5),
    "SPAIN" => array(40.3, -4.0, 5),
    "UNITED KINGDOM" => array(54.0, -4.3, 5),
    "DENMARK" => array(56.1, 9.2, 6),
    "SWEDEN" => array(63.2, 16.3, 4),
    "NORWAY" => array(65.6, 13.1, 4),
    "FINLAND" => array(65.1, 26.6, 4),
    "NETHERLANDS" => array(52.3, 5.4, 7),
    "BELGIUM" => array(50.7, 4.5, 7),
    "SUISSE" => array(46.8, 8.2, 7),
    "AUSTRIA" => array(47.7, 14.1, 7),
    "POLAND" => array(52.1, 19.3, 6),
    "ITALY" => array(42.6, 12.7, 5),
    "TURKEY" => array(39.0, 34.9, 6),
    "BRAZIL" => array(-12.0, -53.1,  4),
    "ARGENTINA" => array(-34.3, -65.7,  3),
    "RUSSIA" => array(65.7, 98.8, 3),
    "ASIA" => array(20.4, 95.6, 3),
    "CHINA" => array(36.2, 104.0, 4),
    "JAPAN" => array(36.2, 136.8, 5),
    "SOUTH KOREA" => array(36.6, 127.8, 6),
    "AUSTRALIA" => array(-26.1, 134.8,  4),
    "CANADA" => array(60.0, -97.0, 3),
    "WORLD" => array(25.0, 8.5, 2)
);

$regionKey = (defined('GOOGLE_MAP_REGION') && isset($regions[GOOGLE_MAP_REGION])) ? GOOGLE_MAP_REGION : 'default';

$jsOptions['zoom'] = $regions[$regionKey][2];
$jsOptions['latLng'] = array($regions[$regionKey][0], $regions[$regionKey][1]);

//User laden
$jsOptions['users'] = array();
$qry = db_query("SELECT a.id, a.name, a.staat, a.gmapkoords, a.wohnort
				FROM prefix_user a
				WHERE a.name <> '' AND a.wohnort <> '' AND a.gmapkoords <> '' $where
				GROUP BY a.id, a.name, a.staat, a.gmapkoords, a.wohnort");
while ($userRow = db_fetch_assoc($qry)) {
    $jsOptions['users'][] = $userRow;
}


$title = $allgAr['title'] . ' :: Googlemap';
$hmenu = 'Googlemap';
$tpl = new tpl ('googlemap.htm');

$design = new design ($title , $hmenu);
$design->addheader($tpl->get(0));
$design->addtobodyend(
    '<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3&sensor=false&key=' . GOOGLE_MAP_KEY . '&language=de"></script>'
    . '<script type="text/javascript" src="include/includes/js/googlemap.js"></script>'
    . '<script type="text/javascript">ic.showMap(' . json_encode($jsOptions) . ');</script>');
$design->header();


$tpl->out(1);

$design->footer(1);
?>

<!-- <script src="http://maps.google.com/maps?hl=de&file=api&amp;v=2&amp;key=<?php echo GOOGLE_MAP_KEY; ?>" type="text/javascript"></script> -->

<script type="text/javascript">
function newGIcon(imgsrc) {
    var icon = new GIcon();
	icon.shadow = "include/contents/googlemap/images/mm_20_shadow.png";
	icon.image = imgsrc;
	icon.iconSize = new GSize(12, 20);
	icon.shadowSize = new GSize(22, 20);
	icon.iconAnchor = new GPoint(6, 20);
	icon.infoWindowAnchor = new GPoint(5, 1);
	return icon;
}

var pinIcons = [];
//Leader
pinIcons[1] = newGIcon('include/contents/googlemap/images/mm_20_yellow.png');
//CoLeader
pinIcons[2] = newGIcon('include/contents/googlemap/images/mm_20_red.png');
//Member
pinIcons[3] = newGIcon('include/contents/googlemap/images/mm_20_blue.png');
//User
pinIcons[4] = newGIcon('include/contents/googlemap/images/mm_20_green.png');

<?php

?>

var mapOptions = {
    zoom: <?php echo $mapOptions['zoom']; ?>,
    center: new google.maps.LatLng(<?php echo $mapOptions['latLng'][0]; ?> , <?php echo $mapOptions['latLng'][1]; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);


//var map = new GMap2(document.getElementById("map"));
//map.addControl(new GLargeMapControl());
//map.addControl(new GMapTypeControl());
//
//map.enableDoubleClickZoom();

<?php


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

$db = db_query("SELECT a.id, a.name, a.staat, a.gmapkoords, a.wohnort, MIN(b.fid) AS fid
				FROM prefix_user a
				LEFT JOIN prefix_groupusers b ON a.id = b.uid
				WHERE a.name <> '' AND a.wohnort <> '' AND a.gmapkoords <> '' $where
				GROUP BY a.id, a.name, a.staat, a.gmapkoords, a.wohnort");
$i = 0;
while ($rowdata = db_fetch_assoc($db)) {
    $search_pattern = array("/[^A-Za-z0-9\[\]*.,=()!\"$%&^`¥':;ﬂ≤≥#+~_\-|<>\/@{}‰ˆ¸ƒ÷‹ ]/");
    $replace_pattern = array("");
    $rowdata['name'] = preg_replace($search_pattern, $replace_pattern, $rowdata['name']);
    $search_pattern = "/.gif/";
    $replace_pattern = "";
    $rowdata['staat'] = preg_replace($search_pattern, $replace_pattern, $rowdata['staat']);
    $pinicon = is_null($rowdata['fid']) ? 4 : ($rowdata['fid'] < 3 ? $rowdata['fid'] : 3);

    echo "\nuser[" . $i . "] = new Object();\n";
    echo "user[" . $i . "]['id'] = " . $rowdata['id'] . ";\n";
    echo "user[" . $i . "]['pinicon'] = " . $pinicon . ";\n";
    echo "user[" . $i . "]['name'] = '" . $rowdata['name'] . "';\n";
    echo "user[" . $i . "]['city'] = '" . $rowdata['wohnort'] . "';\n";
    echo "user[" . $i . "]['country'] = '" . $rowdata['staat'] . "';\n";
    echo "user[" . $i . "]['latlng'] = new GLatLng" . $rowdata['gmapkoords'] . ";\n";
    $i++;
}
if ($i == 0) {
	echo 'map.openInfoWindow(map.getCenter(), document.createTextNode("Keine Eintr‰ge f¸r Karte gefunden."));';
}
?>

function createMarker(userindex, maxindex) {
	var addmarker = 0;
	var act_latlng = ""+user[userindex]['latlng'];
	html_text[userindex] = '<table border=0 style="text-align:left;"><tr><td colspan="2" align="left" style="border-bottom:1px solid black;"><a href="index.php?user-details-'+user[userindex]['id']+'" style="color:blue;font-weight:bold;text-decoration:none;"><small>'+user[userindex]['name']+'</small></a></td></tr>'+
	           	   		   '<tr><td><small><span style="color: black;">Location</span></small></td><td><small><span style="color: black;">'+user[userindex]['city']+', '+user[userindex]['country']+'</span><small></td></tr>'+
	            		   '</table>';
	marker[userindex] = new GMarker(user[userindex]['latlng'], pinIcons[user[userindex]['pinicon']]);
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
