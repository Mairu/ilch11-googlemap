(function (d, gm, ic) {
    window.ic = ic;

    //@todo: löschen wenn fertig
    var log = window.console.log;

    var map;

    ic.showMap = function(options) {
        var mapOptions = {
            zoom: options.zoom,
            center: new gm.LatLng(options.latLng[0], options.latLng[1]),
            mapTypeId: gm.MapTypeId.ROADMAP
        };
        map = new gm.Map(d.getElementById("map"), mapOptions);

        for (var i = 0, l = options.users.length; i < l; i++) {
            addUser(options.users[i]);
        }
    };

    var addMarker = function(pos, title) {
        return new gm.Marker({
            map: map,
            position: pos,
            title: title,
            icon: {
                url: 'http://maps.google.com/mapfiles/kml/paddle/blu-circle.png',
                size: new gm.Size(32, 32),
                scaledSize: new gm.Size(32, 32),
                origin: new gm.Point(0, 0),
                anchor: new gm.Point(16, 32)
            }
        });
    }

    var addUser = function(user) {
        var latLng = user.gmapkoords.substring(1, user.gmapkoords.length - 1).split(', ');
        var pos = new gm.LatLng(latLng[0], latLng[1]);
        var marker = addMarker(pos, user.name);

        var infoHtml = '<div class="userInfo"><a class="userLink" href="index.php?user-details-' + user['id'] + '">' + user['name'] + '</a><hr />'
            + '<span class="location">Location: ' + user['wohnort'];
        if (user['staat'] !== '') {
            infoHtml += ', ' + user['staat'];
        }
        infoHtml += '</span></div>';

        var infowindow = new google.maps.InfoWindow({
            content: infoHtml,
            maxWidth: 300
        });

        gm.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    };
})(document, google.maps, window.ic || {});
