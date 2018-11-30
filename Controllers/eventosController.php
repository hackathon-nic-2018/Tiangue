<?php
class eventosController extends Controller
{
    private $_eventos;
    public function __construct()
    {
        parent::__construct();
        $this->_eventos=$this->loadModel('eventos');
    }
    public function index()
    {
        $eventos=$this->obtenerEventos('');
        $this->_view->eventos=$eventos;
       $this->_view->renderizar('index');
    }
    public function obtenerEventos($cadena){
        $datos_negocios=$this->_eventos->obtenerEventos($cadena);


        $lista_negocios="";
        $conteo=0;

        for($i=0;$i<count($datos_negocios);$i++)
        {
            if($conteo==0)
            {
                $lista_negocios=$lista_negocios."<div class='row'>";
            }

            if($datos_negocios[$i]['imagenportada']==NULL)
                $imagen=BASE_URL."public/default.jpg";
            else
                $imagen=BASE_URL."public/vista.php?id=".$datos_negocios[$i]['id_negocio'];

            $lista_negocios=$lista_negocios."<div class='col-md-4 col-xs-6'>
            <div class='shop'>
                <div class='shop-img'>
                    <img src='$imagen' alt=''>
                </div>
                <div class='shop-body'>
                    <h4>".$datos_negocios[$i]['nombre_negocio']."</h4>
                    <h5>".$datos_negocios[$i]['nombreevento']."</h5>
                    <p>".$datos_negocios[$i]['descripcionevento']."</p>
                    <p>Hora Inicia:".$datos_negocios[$i]['horainicio']."</p>
                    <p>Hora Fin:".$datos_negocios[$i]['horafin']."</p>
                    <a href='negocios/ver/".$datos_negocios[$i]['id_negocio']."' class='cta-btn'>Ver <i class='fa fa-arrow-circle-right'></i></a>
                </div>
            </div>
        </div>";
            $conteo++;
            if($conteo==3)
            {
                $lista_negocios=$lista_negocios."</div>";
                $conteo=0;
            }


        }
        $lista_negocios=$lista_negocios."</div>";

        return $lista_negocios;


    }

}