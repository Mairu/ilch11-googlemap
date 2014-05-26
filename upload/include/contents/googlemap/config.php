<?php
    // Google map key for your domain!
    // create your key at http://www.google.com/apis/maps/signup.html
    define("GOOGLE_MAP_KEY", "");

    // Google map region to display.
    // For people wanna change the default settings change the coordinates in footer.inc
    //define("GOOGLE_MAP_REGION", "EUROPE");
    //define("GOOGLE_MAP_REGION", "NORTH AMERICA");
    //define("GOOGLE_MAP_REGION", "SOUTH AMERICA");
    //define("GOOGLE_MAP_REGION", "NORTH AFRICA");
    //define("GOOGLE_MAP_REGION", "SOUTH AFRICA");
    //define("GOOGLE_MAP_REGION", "NORTH EUROPE");
    //define("GOOGLE_MAP_REGION", "EAST EUROPE");
    define("GOOGLE_MAP_REGION", "GERMANY");
    //define("GOOGLE_MAP_REGION", "FRANCE");
    //define("GOOGLE_MAP_REGION", "SPAIN");
    //define("GOOGLE_MAP_REGION", "UNITED KINGDOM");
    //define("GOOGLE_MAP_REGION", "DENMARK");
    //define("GOOGLE_MAP_REGION", "SWEDEN");
    //define("GOOGLE_MAP_REGION", "NORWAY");
    //define("GOOGLE_MAP_REGION", "FINLAND");
    //define("GOOGLE_MAP_REGION", "NETHERLANDS");
    //define("GOOGLE_MAP_REGION", "BELGIUM");
    //define("GOOGLE_MAP_REGION", "POLAND");
    //define("GOOGLE_MAP_REGION", "SUISSE");
    //define("GOOGLE_MAP_REGION", "AUSTRIA");
    //define("GOOGLE_MAP_REGION", "ITALY");
    //define("GOOGLE_MAP_REGION", "TURKEY");
    //define("GOOGLE_MAP_REGION", "BRAZIL");
    //define("GOOGLE_MAP_REGION", "ARGENTINA");
    //define("GOOGLE_MAP_REGION", "RUSSIA");
    //define("GOOGLE_MAP_REGION", "ASIA");
    //define("GOOGLE_MAP_REGION", "CHINA");
    //define("GOOGLE_MAP_REGION", "JAPAN");
    //define("GOOGLE_MAP_REGION", "SOUTH KOREA");
    //define("GOOGLE_MAP_REGION", "AUSTRALIA");
    //define("GOOGLE_MAP_REGION", "WORLD");

    // Google map view type - MAP / SATELLITE (default) / HYBRID
    define ("GOOGLE_MAP_TYPE" , "HYBRID");

    // Color for User-Pins (BLUE, GREEN, YELLOW)
    define ("GOOGLE_MAP_USERPIN_COLOR", "GREEN");

    // Color for Member-Pins (BLUE, GREEN, YELLOW)
    define ("GOOGLE_MAP_MEMBERPIN_COLOR", "BLUE");

    // Show Leader in a different Color? (TRUE/FALSE)
    define ("GOOGLE_MAP_LEADERPIN_COLOR", "TRUE");

    // Show Teammembers only? (TRUE/FALSE)
    define ("GOOGLE_MAP_SHOW_TEAM_ONLY", "FALSE");

    // Legt fest, ob automatisch auf die angezeigten Punkte angepasst wird
    define ("GOOGLE_MAP_AUTOZOOM", "TRUE");

    // Maximaler Zoom, wenn automatisch gezoomt wird, höher ist stärkerer Zoom
    define ("GOOGLE_MAP_MAXZOOM", 9);
?>