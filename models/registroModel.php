<?php
class registroModel extends Model{
    public function __construct()
    {
        parent::__construct();
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



}