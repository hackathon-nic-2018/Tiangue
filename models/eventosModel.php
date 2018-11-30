<?php

class eventosModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function obtenerEventos($cadena){
        $datos=$this->_db->query("select n.idnegocio as id_negocio,nombre_negocio,descripcionevento,imagenportada,nombreevento,horainicio,horafin from negocio as n inner join eventonegocio as e on(n.idnegocio=e.idnegocio) where descripcion like '%$cadena%'");
        $result=$datos->fetchAll();
        return $result;
    }
}