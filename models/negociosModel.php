<?php
class negociosModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtenerCategorias(){
        $datos=$this->_db->query("select nombre_categoria from categoria");
        $result=$datos->fetchAll();
        return $result;
    }

    public function obtenerNegocios($cadena){

        $datos=$this->_db->query("select * from negocio where descripcion like '%$cadena%' limit 10");
        $result=$datos->fetchAll();
        return $result;

    }
    public function obtenerImagenNegocio($id)
    {
        $datos=$this->_db->query("select imagenportada from negocio where idnegocio=$id");
        $result=$datos->fetch();
        return $result;
    }
}