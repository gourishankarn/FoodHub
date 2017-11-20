<html>
<head>
  <title>Track</title>
  <link rel="stylesheet" type="text/css"href="css/track.css"/>
  <link rel="stylesheet" type="text/css" href="css/cmn3.css">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<style>
  #input1{
    padding: 5px;
    height:40px;
    
  }
  #div2{
    margin-right:50px;
    /*margin-top:40px;*/
  }
</style>
</head>
<body style="background-color:grey" id="yyy">
<ul >
    <div>
    <li><a href ="food_menu.html">Food Menu</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="about.html">About</a></li>
    <li style="float:right;"><a href="logout.php">Logout</a></li>
    <li><a href="faq.html">Faq's</a></li>
    <li><a href="track.html">Track</a></li>
    <a href="index1.html"><li style="padding-left:30px;padding-right:50px;font-size:50px;"><strong><span style="color:cyan;">Food</span><span style="color:#ff6600;">Hub</span></strong></li></a>
    </div>
      <div style="padding-left:100px;">
        <li><a href="#facebook.html"><img src="images/facebook.png" title="facebook" /></a></li>
        <li><a href="#twitter.html"><img src="images/twitter.png" title="twitter" /></a></li>
        <li ><a href="#google.html"><img src="images/google.png" title="google pluse" /></a></li>
    </div>
  </ul>


  <?php
  	$servername="localhost";
  	$username="root";
  	$password="ireshfrd26";
  	$conn=mysqli_connect($servername,$username,$password,"users_db");
  	if(!$conn)
  	{
  		// echo "connection not established";
  	}
  	else
  	{
      $query="SELECT * FROM adress ORDER BY adress.ID DESC";
      $res=mysqli_query($conn,$query);
      $flag=0;
      $row=mysqli_fetch_assoc($res);
  }
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6v5-2uaq_wusHDktM9ILcqIrlPtnZgEk&libraries=places"></script>
<script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            //var padmanabhanagara = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
              //  center: mumbai
            };
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                  var distance  = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration;

                    function fun()
                    {
                    var form=document.createElement("form");
                    form.setAttribute("action","order.php");
                    form.setAttribute("method","POST");
                    var div=document.querySelector("#div2");
                    div.appendChild(form);
                    var input=document.createElement("input");
                    input.setAttribute("type","text");
                    input.setAttribute("name","distance");
                    input.setAttribute("readonly","true");
                    input.setAttribute("value",distance);
                    input.setAttribute("id","input1");
                    form.appendChild(input);
                    var input=document.createElement("input");
                    input.setAttribute("type","submit");
                    input.setAttribute("id","input1");
                    input.setAttribute("value","Place your order");
                    form.appendChild(input);
                    }
                    var btn=document.querySelector("#yyy");
                    btn.addEventListener("load",fun(),false);
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }

</script>
    <div class="map">
      <div id="div2" style="float:right"> </div>
    <table border="0" cellpadding="0" cellspacing="3">
        <tr>
            <td colspan="2">
                Source:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" id="txtSource" value="PES UNIVERSITY" style="width: 200px;height:30px;"  placeholder="source" disabled/><br><br>
                 Destination:
              <input type="text" id="txtDestination" value="<?php echo $row['LOCATION']; ?>" style="width: 200px;height:30px;" placeholder="Destination"  disabled/><br>
                <br />
                <input type="button" value="Get Route" onclick="GetRoute();" />
                <hr />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="dvDistance">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="dvMap" style="width: 500px; height: 500px">
                </div>
            </td>
            <td>
                <div id="dvPanel" style="width: 500px; height: 500px">
                </div>
            </td>
        </tr>
    </table>
    <br />
  </div>

<footer>Copyright &copy; FoodHub.com</footer>
</body>
</html>
