<?php
class indexController extends Controller
{
private $_persona;
    public function __construct()
    {
        parent::__construct();
       $this->_persona=$this->loadModel('negocios');
    }

    public function tiangues()
    {

    }


    public function index()
    {

        $lista_negocios=$this->obtenerNegocios('');
        $this->_view->lista_negocios=$lista_negocios;
        $this->_view->setJs(array('funciones'));
        $this->_view->renderizar('index');
    }
    public function obtenerCategorias(){
       $categorias= $this->_persona->obtenerCategorias();
        $opciones="";
       for($i=0;$i<count($categorias);$i++)
            $opciones=$opciones."<option>".$categorias[$i][$categorias]."</option>";

       return $opciones;
}


public function mapa($dato){


    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node);
    $row=$this->_persona->obtenerNegocios($dato);

    header("Content-type: text/xml");

    for($i=0;$i<count($row);$i++){
        // Add to XML document node
        $node = $dom->createElement("marker");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("id",$row[$i]['idnegocio']);
        $newnode->setAttribute("name",$row[$i]['nombre_negocio']);
        $newnode->setAttribute("address", $row[$i]['direccion']);
        $newnode->setAttribute("lat", $row[$i]['latitudnegocio']);
        $newnode->setAttribute("lng", $row[$i]['longitudnegocio']);
        $newnode->setAttribute("type", $row[$i]['descripcion']);
        $newnode->setAttribute("abre", $row[$i]['horaabierto']);
        $newnode->setAttribute("cierra", $row[$i]['horacerrado']);
    }



    echo $dom->saveXML();



}

public function obtenerImagenNegocio($id){
    $imagen=$this->_persona->obtenerImagenNegocio($id);
    header("Content-type: image/jpg");
    return $imagen;
}

public function obtenerNegocios($cadena){
        $datos_negocios=$this->_persona->obtenerNegocios($cadena);
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
                    $imagen=BASE_URL."public/vista.php?id=".$datos_negocios[$i]['idnegocio'];

                $lista_negocios=$lista_negocios."<div class='col-md-4 col-xs-6'>
            <div class='shop'>
                <div class='shop-img'>
                    <img src='$imagen' alt=''>
                </div>
                <div class='shop-body'>
                    <h4>".$datos_negocios[$i]['nombre_negocio']."</h4>
                    <a href='negocios/ver/".$datos_negocios[$i]['idnegocio']."' class='cta-btn'>Ver <i class='fa fa-arrow-circle-right'></i></a>
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

    public function obtenerNegocios2($cadena){
        $datos_negocios=$this->_persona->obtenerNegocios($cadena);
        $lista_negocios="lista de negocios";
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
                $imagen=BASE_URL."public/vista.php?id=".$datos_negocios[$i]['idnegocio'];

            $lista_negocios=$lista_negocios."<div class='col-md-4 col-xs-6'>
            <div class='shop'>
                <div class='shop-img'>
                    <img src='$imagen' alt=''>
                </div>
                <div class='shop-body'>
                    <h4>".$datos_negocios[$i]['nombre_negocio']."</h4>
                    <a href='negocios/ver/".$datos_negocios[$i]['idnegocio']."' class='cta-btn'>Ver <i class='fa fa-arrow-circle-right'></i></a>
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

        echo $lista_negocios;

    }


    public function registro()
    {

        $this->_view->renderizar('registro');
    }
}