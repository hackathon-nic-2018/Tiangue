<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container ">
            <!-- row -->
            <div class="row col-lg-offset-5">

                <div class="col-md-3 col-xs-5">
                    <div class="footer">
                        <h3 class="footer-title">Desarrolladores</h3>
                        <p>julio  .</p>
                        <p>denis .</p>
                        <p>ulices .</p>
                        <p>freddy.</p>

                    </div>

                </div>

            </div>

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">

							<span class="copyright">
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tiangue.net

							</span>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>

<!-- /FOOTER -->



<script>


    $("#btbuscar").click(function () {

        initMap();
        var clave=$("#cjclave").val();
        $.ajax({
            url:'index/obtenerNegocios2/'+clave,
            success:function (data) {
                $("#lista_negocios").html(data);

            }
        });

    });
    var customLabel = {
        restaurant: {
            label: 'R'
        },
        bar: {
            label: 'B'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(13.638029, -86.472541),
            zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;


        var parametro=$("#dato").val();


        downloadUrl('index/mapa/'+parametro, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                var icon = customLabel[type] || {};
//icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'

                var icon="";
                var f=new Date();
                if( markerElem.getAttribute('abre')>= f.getHours() && markerElem.getAttribute('abre')<= f.getHours())
                    icon='http://maps.google.com/mapfiles/ms/icons/green-dot.png';
                else
                    icon='http://maps.google.com/mapfiles/ms/icons/red-dot.png';

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon : icon,
                    label: icon.label
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }


    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3T6E6kSSwGNbqxN-OXOI1wfnghgd40JQ&callback=initMap">
</script>




</body>
</html>