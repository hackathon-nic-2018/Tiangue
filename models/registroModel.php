<?php
class registroModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function verificarCuenta($usuario,$pass)
    {
        $res=$this->_db->query("select idusuario from usuario where nameusuario='$usuario' and clave='$pass'");
        $resultado=$res->fetch();
       return $resultado['idusuario'];
    }

    public function insertarPersona($nombre,$cedula,$direccion,$genero,$usuario,$pass,$email,$telefono){

        $res=$this->_db->query("select * from usuario where nameusuario='$usuario'");
        $r1=$res->fetch();
        $respuesta=0;

       // if(count($r1)>0)
        {
            //return $respuesta;
        }
      //  else
        {
            $this->_db->beginTransaction();

            $this->_db->prepare("insert into persona_comerciante(nombre_apellido,cedula,telefono,direccion,genero) VALUES 
            (:nombre , :cedula , :telefono , :direccion , :genero)")->execute(
                array(
                    'nombre'=>$nombre,
                    'cedula'=>$cedula,
                    'telefono'=>$telefono,
                    'direccion'=>$direccion,
                    'genero'=>$genero
                )
            );
            }

        $res=$this->_db->query("select max(idpersona) as ultima from persona_comerciante");
        $r1=$res->fetch();
        $this->_db->prepare("insert into usuario(idpersonacomerciante,nameusuario,clave,correo) VALUES 
            (:idp , :usu , :pass , :correo )")->execute(
            array(
                'idp'=>$r1['ultima'],
                'usu'=>$usuario,
                'pass'=>$pass,
                'correo'=>$email

            )
        );
        $res=$this->_db->query("select max(idusuario) as ultima from usuario");
        $r1=$res->fetch();
        $respuesta=$r1['ultima'];
            $this->_db->commit();
            return $respuesta;
        }




    public function obtenerNegocio($id)
    {
        $datos=$this->_db->query("select idnegocio,nombre_negocio,n.telefono as tel,n.direccion as dir,descripcion,valoracion,latitudnegocio,longitudnegocio,horaabierto,horacerrado from negocio as n 
        inner join persona_comerciante as p on (p.idpersona=n.idpersona) where p.idpersona=$id");
        $res=$datos->fetch();
        return $res;
    }
    public function obtenerProductos($id)
    {
        $datos=$this->_db->query("select p.nombre_producto as nompro,precio,p.descripcion as descri  from producto as p INNER join (negocio as n inner join persona_comerciante as pe on (pe.idpersona=n.idpersona)) on(p.idnegocio=n.idnegocio)  where pe.idpersona= $id");
        $res=$datos->fetchAll();
        return $res;
    }


    public function insertarProducto($nombre,$desc,$precio,$idn,$portada){
   $res=     $this->_db->prepare("insert into producto(nombre_producto,descripcion,precio,idnegocio,imagen_producto) values(:nombre , :descri , :precio , :idn , :portada ) "
   )->execute(
       array(
           'nombre'=>$nombre,
           'descri'=>$desc,
           'precio'=>$precio,
           'idn'=>$idn,
           'portada'=>$portada
       )
   );
   return $res;
    }

}