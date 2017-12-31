<?php
require_once '../Bean/AdminBean.php';
require_once '../UTIL/ConexionBD.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminDAO{
    public function Acceso(AdminBean $objbean){
        $i=0;
        try {
            $usuario=$objbean->getUsuario();
            $clave=$objbean->getContraseña();
            $sql="select * from admin where usuario_admin='$usuario' and contra_admin='$clave'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $lista=array();
            while($fila= mysqli_fetch_assoc($rs)){
                $lista[] = $fila;
            }
            if(count($lista)==1){
                $i=1;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function DatosAdmin(AdminBean $objbean){
        
        try {
            $usu=$objbean->getUsuario();
            $clave=$objbean->getContraseña();
            $sql="select * from admin where usuario_admin='$usu' and contra_admin='$clave'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            if($fila= mysqli_fetch_assoc($rs)){
                $objbea=new AdminBean();
                $objbea->setIdadmin($fila['idadmin']);
                $objbea->setNombre($fila['nombre']);
                $objbea->setUsuario($fila['usuario_admin']);
                $objbea->setContraseña($fila['contra_admin']);
            }
        } catch (Exception $ex) {
            
        }
        return $objbea;
    }


    public function GrabarAdmin(AdminBean $objAdmin){
        $i=0;
        try {
            $id=$objAdmin->getIdadmin();
            $nom=$objAdmin->getNombre();
            $usuario=$objAdmin->getUsuario();
            $contraseña=$objAdmin->getContraseña();
            $sql="insert into admin(idadmin, nombre, usuario_admin, contra_admin) values('$id','$nom','$usuario','$contraseña')";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
            
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function ListarAdmin(){
        try {
            $sql="select * from admin;";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $lista=array();
            while ($fila= mysqli_fetch_assoc($rs)){
                $lista[]=$fila;
            }
            mysqli_close($cn);
            
        } catch (Exception $ex) {
            
        }
        return $lista;
    }
    
    public function CapturarAdmin(AdminBean $objbean){
        
        try {
            $id=$objbean->getIdadmin();
            $sql="select * from admin where idadmin='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            if($fila= mysqli_fetch_assoc($rs)){
                $objbe=new AdminBean();
                $objbe->setIdadmin($fila['idadmin']);
                $objbe->setNombre($fila['nombre']);
                $objbe->setUsuario($fila['usuario_admin']);
                $objbe->setContraseña($fila['contra_admin']);
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $objbe;
    }
    public function ModificarAdmin(AdminBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdadmin();
            $nom=$objbean->getNombre();
            $usuario=$objbean->getUsuario();
            $contraseña=$objbean->getContraseña();
            $sql="update admin set nombre='$nom', usuario_admin='$usuario', contra_admin='$contraseña' where idadmin='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
            
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }

    public function EliminarAdmin(AdminBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdadmin();
            $slq="delete from admin where idadmin='$id';";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $slq);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function GenerarCodigo(){
        $i=0;
        try {
            $sql="select max(idadmin)+1 as CODIGO from admin";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $consulta=  mysqli_fetch_array($rs);
            $i=$consulta['CODIGO'];
            if($i=="")
            {
                $i=1;
            }
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
}
