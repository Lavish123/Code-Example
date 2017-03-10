<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
    </style>
</head>
<body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPUu3LlVkmlv-Kfs8btDaDgKowLj4nqUs&libraries=places"></script>    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
               
				document.getElementById('lat').value = latitude;
				document.getElementById('lng').value = longitude;

                
            });
        });
    </script>
    <span>Location:</span>
    <input type="text" id="txtPlaces" style="width: 250px" placeholder="Enter a location" />
    <input type="text" id="lat" style="width: 250px" placeholder="Enter a location" />
    <input type="text" id="lng" style="width: 250px" placeholder="Enter a location" />
</body>
</html>


