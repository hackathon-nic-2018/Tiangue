<div id="contenidogeneral"></div>
<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container ">
            <!-- row -->
            <center>

                <div class="">
                    <div class="footer">
                        <h3 class="footer-title">Desarrolladores</h3>
                        <p>julio  . denis . ulices . freddy . eliezer</p>


                    </div>

                </div>

            </center>

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
$("#btlogin").click(function () {
   var usu=$("#usuario_login").val();
    var pass=$("#pass_login").val();

    $.ajax({
       url:"registro/verificarCuenta",
        type:"post",
        data:{
           'usuario':usu,
            'pass':pass
        },
        success:function (data) {
            if(!data)
                alert("Usuario y Clave Incorrecta");
            else
                window.open('registro/autenticarlo/'+data,"_self");
        }
   });
});
</script>

</body>
</html>