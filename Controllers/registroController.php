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

}