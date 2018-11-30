<?php
class registroController extends Controller{
    private $_registro;
    public function __construct()
    {
        parent::__construct();
        $this->_registro=$this->loadModel('registro');
    }

    public function index()
    {
        $this->_view->renderizar('index');
    }
    public function registrar()
    {

  //      'nombre':nombre,'cedula':cedula,'direccion':direccion,'genero':genero,'pass':pass,'email':email,'telefono':telefono
       if(!$this->validarEmail($this->getTexto('email')))
           echo "El Email no es Valido";
           else{
        $resultado=$this->_registro->insertarPersona($this->getTexto('nombre'),$this->getTexto('cedula'),$this->getTexto('direccion'),$this->getTexto('genero'),$this->getTexto('usuario'),$this->getTexto('pass'),$this->getTexto('email'),$this->getTexto('telefono'));
        echo $resultado;
           }

    }

    public function autenticarlo($id){
        Session::set("autenticado",true);
        Session::set("tiempo",time());
        Session::set('level','usuario');
        Session::set('idP',$id);
        $this->perfilComerciante($id);

    }
    public function perfilComerciante($id)
    {
        Session::acceso('usuario');
        $negocio=$this->_registro-> obtenerNegocio($id);
        $productos=$this->_registro->obtenerProductos($id);
        $lineas="";
        for($i=0;$i<count($productos);$i++)
            $lineas=$lineas."<tr><td>".$productos[$i]['nompro']."</td><td>".$productos[$i]['precio']."</td><td>".$productos[$i]['descri']."</td><td><a href='#'>Eliminar</a></td></tr>";

        $this->_view->lista_productos=$lineas;
/*
        $datos_persona=$this->_registro->obtenerDatosPersona($id);



       $promociones =$this->_registro->obtenerPromociones($id);

       $eventos= $this->_registro->obtenerEventos($id);*/
        $this->_view->negocio=$negocio;
        if($this->getTexto("cargar_imagen_pro")==1)
        {
            $info=getimagesize($_FILES["portada_pro"]["tmp_name"]);

            $imgContenido=file_get_contents($_FILES["portada_pro"]["tmp_name"]);

          $pro=  $this->_registro->insertarProducto($this->getTexto('nom_pro'),$this->getTexto('des_pro'),$this->getTexto('precio_pro'),$this->getTexto('id_negocio_pro'),$imgContenido);
       echo $pro;

        }
        $this->_view->renderizar('perfilComerciante');
    }

    public function verificarCuenta()
    {
        $resp=$this->_registro->verificarCuenta($this->getTexto('usuario'),$this->getTexto('pass'));
        if(!$resp)
        echo false;
        else
           echo $resp;

    }
    public function agregarProductos(){

    }

}