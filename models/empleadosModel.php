<?php

class EmpleadosModel extends Model implements IModel
{

    private $id;
    private $nombre;
    private $usuario;
    private $contraseña;
    private $id_rol;
    private $fecha_Creacion;
    private $fecha_Actualizacion;

    public function __construct()
    {
        parent::__construct();
        $this->nombre = "";
        $this->id_rol = "";
        $this->fecha_Creacion = "";
        $this->fecha_Actualizacion = "";
    }

    public function save()
    {
        try {
            $query = $this-> prepare('INSERT INTO empleados(nombre, usuario, contraseña, id_rol, fecha_Creacion, fecha_Actualizacion) VALUES(:nombre, :usuario, :contraseña, :id_rol, :fecha_Creacion, :fecha_Actualizacion)');

            $query->execute([
                'nombre' => $this->nombre,
                'usuario' => $this->usuario,
                'contraseña' => $this->contraseña,
                'id_rol'=> $this->id_rol,
                'fecha_Creacion'=> $this->fecha_Creacion,
                'fecha_Actualizacion'=> $this->fecha_Actualizacion
            ]);

            return true;
        }catch(PDOException $e){
            error_log("EMPLEADOSMODEL::save -> PDOException ". $e);
            return false;
        }
    }
    public function getAll()
    {
        $items = [];

        try {
            $query = $this->prepare("SELECT * FROM empleados");

            while($pointer = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new EmpleadosModel();
                $item -> setId($pointer["id"]);
                $item -> setNombre($pointer["nombre"]);
                $item -> setUsuario($pointer["usuario"]);
                $item -> setContraseña($pointer["contraseña"]);
                $item -> setId_rol($pointer["id_rol"]);
                $item -> setFecha_Creacion($pointer["fecha_Creacion"]);
                $item -> setFecha_Actualizacion($pointer["fecha_Actualizacion"]);

                array_push($items, $item);
            }
            return $items;

        } catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::getAll -> PDOException ". $e);
            return false;
        }
    }
    public function get($id)
    {

        try {
            $query = $this->prepare("SELECT * FROM empleados WHERE id = :id");
            $query ->execute([
                'id' => $id
            ]);

            $empleado = $query->fetch(PDO::FETCH_ASSOC);

            $this -> setId($empleado["id"]);
            $this -> setNombre($empleado["nombre"]);
            $this -> setUsuario($empleado["usuario"]);
            $this -> setContraseña($empleado["contraseña"]);
            $this -> setId_rol($empleado["id_rol"]);
            $this -> setFecha_Creacion($empleado["fecha_Creacion"]);
            $this -> setFecha_Actualizacion($empleado["fecha_Actualizacion"]);

           
            return $this;

        } catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::getID -> PDOException ". $e);
            return false;
        }
    }
    public function delete($id)
    {
        try {
            $query = $this->prepare("DELETE * FROM empleados WHERE id = :id");
            $query ->execute([
                'id' => $id
            ]);

            return true;
        }  catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::delete -> PDOException ". $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $query = $this->prepare("UPDATE empleados SET nombre = :nombre, usuario = :usuario, contraseña = :contraseña, id_rol = :id_rol, fecha_Actualizacion = :fecha_Actualizacion WHERE id = :id");
            $query ->execute([
                'id' => $this->id,
                'nombre'=> $this->nombre,
                'usuario' => $this->usuario,
                'contraseña' => $this->contraseña,
                'id_rol' => $this->id_rol,
                'fech_Actualizacion' => $this->fecha_Actualizacion
            ]);
           
            return true;

        } catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::update -> PDOException ". $e);
            return false;
        }
    }
    public function from($array)
    {
        $this -> id                  = $array["id"];
        $this -> nombre              = $array["nombre"];
        $this -> usuario             = $array["usuario"];
        $this -> contraseña          = $array["contraseña"];
        $this -> id_rol              = $array["id_rol"];
        $this -> fecha_Creacion      = $array["fecha_Creacion"];
        $this -> fecha_Actualizacion = $array["fecha_Actualizacion"];
    }

    public function exist($usuario){
        try {
            $query = $this->prepare('SELECT usuario FROM empleados WHERE usuario = :usuario');
            $query ->execute(['usuario'=> $usuario]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::exist -> PDOException ". $e);
            return false;
        }
    }

    public function comparePassword($contraseña, $id){
        try{
            $usuario = $this->get($id);
            return password_verify($contraseña, $usuario->getContraseña() );
            
        }catch (PDOException $e) {
            error_log("EMPLEADOSMODEL::comparePassword -> PDOException ". $e);
            return false;
        }
    }

    //funcion de encriptar la contraseña
    private function getHashedContraseña($contraseña){
        return password_hash($contraseña, PASSWORD_DEFAULT, ["COST" => 10]);
    }

    // getters
    public function getId(){                                        return $this->id; }
    public function getNombre(){                                    return $this->nombre; }
    public function getUsuario(){                                   return $this->usuario; }
    public function getContraseña(){                                return $this->contraseña; }
    public function getFecha_Actualizacion(){                       return $this->fecha_Actualizacion; }
    public function getFecha_Creacion(){                            return $this->fecha_Creacion; }
    public function getId_rol(){                                    return $this->id_rol; }

    // setters
    public function setId($id){                                     $this->id = $id; }
    public function setNombre($nombre){                             $this->nombre = $nombre; }
    public function setUsuario($usuario){                           $this->usuario = $usuario; }
    public function setContraseña($contraseña){                     $this->contraseña = $this -> getHashedContraseña($contraseña); }
    public function setId_rol($id_rol){                             $this->id_rol = $id_rol; }
    public function setFecha_Creacion($fecha_Creacion){             $this->fecha_Creacion = $fecha_Creacion; }
    public function setFecha_Actualizacion($fecha_Actualizacion){   $this->fecha_Actualizacion = $fecha_Actualizacion; }
    
}
