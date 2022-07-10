<script type="text/javascript">
    var gmarkers = [];
    
    function initialize() {
          
        var mapOptions = {
            zoom: 10,
            center: new google.maps.LatLng(39.0688655, 22.5878979),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);

        var locations = [
         <?php 
            $stores = $this->stores;
            $store_number = 0;
            foreach ($stores as $store ) {
                echo '["'.$store['name'].'", '.$store['latitude'].', '.$store['longitude'].', "view/img/marker.png" ,"#wid'.$store_number++.'", "'.$store['phone'].'"],
              ';
            } ?>
        ];
        var marker, i;
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(map, 'click', function() {
            infowindow.close();
        });

        var bounds = new google.maps.LatLngBounds();
        for (i = 0; i < locations.length; i++) {

            var myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
            if (i < 15) {
                bounds.extend(myLatLng);
            }
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: locations[i][3],
                url: locations[i][4]
            });

            gmarkers.push(marker);

             google.maps.event.addListener(marker, 'mouseover', function() {
                $(".result").css("background-color", "white");
                $(this.url + " #bmib").css("background-color", "#C9E877");
            
            });
            google.maps.event.addListener(marker, 'click', function() {
                $(".widget").css("display", "none");
                $(this.url).css("display", "block");
            
            });
            
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0] + '</br>' + locations[i][5]);
                    if (map.zoom <= 12) {
                        map.setZoom(18);
                    }

                    map.setCenter({lat:locations[i][1], lng:locations[i][2]});
                    infowindow.open(map, marker);
                }
            })(marker, i));

            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0] + '</br>' + locations[i][5]);
                    infowindow.open(map, marker);
                }
            })(marker, i));   
        }
        map.fitBounds(bounds);
        map.panToBounds(bounds);

    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>