<?php 
defined ('main') or die ( 'no direct access' );
defined ('admin') or die ( 'only admin access' );

$design = new design ( 'Admins Area', 'Admins Area', 2 );
$design->header();
$tpl = new tpl('googlemap',1);
$tpl->out(0);

function replaceUmlauts($str) {
    $ul = array('ä','ö','ü','Ä','Ö','Ü');
    $rul = array('ae','oe','ue','Ae','Oe','Ue');
    return str_replace($ul,$rul,$str);
}

if (isset($_POST['delete']) AND !empty($_POST['user'])) {
    $todel = implode(',',$_POST['user']);
    db_query("UPDATE prefix_user SET gmapkoords = '' WHERE id IN ($todel)");
    wd('admin.php?googlemap','Werte wurden gel&ouml;scht',5);
    $design->footer(1); 
}

if (isset($_POST['submit']) AND !empty($_POST['user'])) {
    foreach ($_POST['user'] as $uid) {
        $uid = intval($uid);
        db_query("UPDATE prefix_user SET gmapkoords = '".escape($_POST['gmapkoords'][$uid],'string')."' WHERE id = $uid");
    }
    wd('admin.php?googlemap','Werte wurden gespeichert',5);
    $design->footer(1);    
}

if ($menu->get(1) == '') {
    $tpl->out(1);
} else {
    switch($menu->get(1)) {
        default: case 'wokoords': $where = 'WHERE wohnort <> "" AND gmapkoords = ""'; break;
        case 'wloc': $where = 'WHERE wohnort <> ""'; break;
        case 'all' : $where = ''; break;
    }
    
    $sql = db_query("SELECT id,name,wohnort,staat,gmapkoords FROM prefix_user $where");
    
    //$tpl->set('anz',db_num_rows($sql));
    require_once('include/contents/googlemap/config.php');
    $tpl->set_out('GOOGLE_MAP_KEY',GOOGLE_MAP_KEY,2);
    
    $ul = array('ä','ö','ü','Ä','Ö','Ü');
    $rul = array('ae','oe','ue','Ae','Oe','Ue');
    while ($row = db_fetch_assoc($sql)) {
        $class = $class = 'Cmite' ? 'Cnorm' : 'Cmite';
        $row['staat'] = str_replace('.gif','',$row['staat']);
        $row['wohnort'] = str_replace($ul,$rul,$row['wohnort']);
        $row['class'] = $class;
        $tpl->set_ar_out($row,3);
    }
    $tpl->out(4);
}

$design->footer();
?>