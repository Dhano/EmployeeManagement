<?php
    ob_start();
?>
<html id="loadDynamic">
   <?php 
        $title = "My";
        include_once("includes/header.php");
    ?>

    <body id="response_output">
        <script src="assets/vendors/jquery1.10.2/jquery-1.10.2.js"></script>
        <script>
            //window.alert("Inside Script");
            var access_denied = false;
            var x1 = document.getElementById("demo");
            var x;
            function getLocation() {
                //window.alert("HI");
                if (navigator.geolocation) {
                    window.alert("Getting Location");
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    //window.alert("not supported");
                    access_denied = true;
                    x1.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showError(error) {
                //window.alert("Showing error");
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        //x1.innerHTML = "User denied the request for Geolocation.";
                        x = "User denied the request for Geolocation.";
                        access_denied = true;
                        break;
                    case error.POSITION_UNAVAILABLE:
                        //x1.innerHTML = "Location information is unavailable.";
                        x = "Location information is unavailable.";
                        access_denied = true;
                        break;
                    case error.TIMEOUT:
                        //x1.innerHTML = "The request to get user location timed out.";
                        x = "The request to get user location timed out.";
                        access_denied = true;
                        break;
                    case error.UNKNOWN_ERROR:
                        //x1.innerHTML = "An unknown error occurred.";
                        x = "An unknown error occurred.";
                        access_denied = true;
                        break;
                }
                loadContent();
            }

            function loadContent() {
                //window.alert("called redirect");
                if(access_denied){
                    $.ajax({
                        type: 'POST',
                        url: 'includes/process-ajax-request.php',
                        data: 'access_denied='+x
                    }).done(function (response) {
                        //console.log(response);
                        document.getElementById("response_output").innerHTML = response;
                    }).fail(function (response) {
                        console.log(response);
                    })
                } else{
                    $.ajax({
                        type: 'POST',
                        url: 'includes/process-ajax-request.php',
                        data: 'access_granted_login=1'
                    }).done(function (response) {
                        console.log(response);
                        document.getElementById("loadDynamic").innerHTML = response;
                        //window.location.replace(response);
                    }).fail(function (response) {
                        console.log(response);
                    })
                }
            }

            function showPosition(position) {
                //window.alert("Showing Pos");
                var userCurrentLatitudeString = position.coords.latitude;
                var userCurrentLongitudeString = position.coords.longitude;
                var userCurrentLatitude = parseFloat(userCurrentLatitudeString);
                var userCurrentLongitude = parseFloat(userCurrentLongitudeString);
                var fixedLatitude = 19.211;
                var fixedLongitude = 73.158;

                userCurrentLatitude = userCurrentLatitude.toFixed(3);
                userCurrentLongitude = userCurrentLongitude.toFixed(3);

                if(userCurrentLatitude === fixedLatitude && userCurrentLongitude === fixedLongitude) {
                    access_denied = false;
                } else {
                    //window.alert("NOT EXACT");
                    //window.alert(userCurrentLatitude + " " + fixedLatitude);
                    if(userCurrentLatitude > fixedLatitude){
                        if(userCurrentLatitude <= fixedLatitude+0.05){
                            console.log(userCurrentLatitude + "," + userCurrentLongitude);
                            access_denied = false;
                        } else {
                            //window.alert(userCurrentLatitude + " " + fixedLatitude);
                            x = "YOU CANNOT ACCESS THIS PAGE FROM CURRENT LOCATION";
                            access_denied = true;
                        }
                    } else if(userCurrentLatitude < fixedLatitude){
                        if(userCurrentLatitude >= fixedLatitude-0.05){
                            console.log(userCurrentLatitude + "," + userCurrentLongitude);
                            access_denied = false;
                        } else {
                           // window.alert(userCurrentLatitude + " " + fixedLatitude + "YOU CANNOT ACCESS THIS PAGE FROM CURRENT LOCATION");
                            x = "YOU CANNOT ACCESS THIS PAGE FROM CURRENT LOCATION";
                            access_denied = true;
                        }
                    }
                }
                loadContent();
            }
            getLocation();
        </script>
    </body>
</html>