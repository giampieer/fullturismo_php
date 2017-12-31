<?php
session_start();
require_once '../Bean/AdminBean.php';
require_once '../Dao/AdminDAO.php';

header('Content-Type: application/json');
$op=$_REQUEST["op"];
switch ($op){
    case 1:{
        $usuario=$_REQUEST["usuario"];
        $clave=$_REQUEST["clave"];
        $objbean=new AdminBean();
        $objcapbean=new AdminBean();
        $objdao=new AdminDAO();
        $objbean->setUsuario($usuario);
        $objbean->setContraseña($clave);
        $i=$objdao->Acceso($objbean);
        $estado['estado'] = $i;
        echo json_encode($estado);
        break;
    }
    case 2:{
        $objdao=new AdminDAO();
        $lista['ADMIN']=$objdao->ListarAdmin();
        echo json_encode($lista);
        break;
    }
    case 3:{
        $nombre=$_REQUEST["nombre"];
        $usuario=$_REQUEST["usuario"];
        $contraseña=$_REQUEST["contraseña"];
        $objbean=new AdminBean();
        $objDao=new AdminDAO();
        $id=$objDao->GenerarCodigo();
        if($id==0){
            $id=1;
        }else{
            $id=$objDao->GenerarCodigo();
        }
        $objbean->setIdadmin($id);
        $objbean->setNombre($nombre);
        $objbean->setUsuario($usuario);
        $objbean->setContraseña($contraseña);
        $i=$objDao->GrabarAdmin($objbean);
        if($i){
            $mensaje['estado']="Registro Insertado";
        }else{
            $mensaje['estado']="Registro No Insertado";
        }
        echo json_encode($mensaje);
        break;
    }
    
    case 4:{
        $cod=$_REQUEST["cod"];
        $objbeann=new AdminBean();
        $objdaoo=new AdminDAO();
        $objbeann->setIdadmin($cod);
        $i=$objdaoo->EliminarAdmin($objbeann);
        if($i == 1){
            $estado['estado'] = 'Registro Eliminado';
        }else{
            $estado['estado'] = 'Registro No Eliminado';
        }
        echo json_encode($estado);
        break;
    }
    case 5:{
        $cod=$_REQUEST['cod'];
        $objbean=new AdminBean();
        $objbeann=new AdminBean();
        $objbean->setIdadmin($cod);
        $objdaoo=new AdminDAO();
        $objbeann=$objdaoo->CapturarAdmin($objbean);
        $dato['idadmin']=$objbeann->getIdadmin();
        $dato['nombre']=$objbeann->getNombre();
        $dato['usuario_admin']=$objbeann->getUsuario();
        $dato['contra_admin']=$objbeann->getContraseña();
        echo json_encode($dato);
        break;
    }
    case 6:{
        $id=$_REQUEST["id"];
        $nombre=$_REQUEST["nombre"];
        $usuario=$_REQUEST["usuario"];
        $contraseña=$_REQUEST["contraseña"];

        $objbeann=new AdminBean();
        $objDaoo=new AdminDAO();
        $objbeann->setIdadmin($id);
        $objbeann->setNombre($nombre);
        $objbeann->setUsuario($usuario);
        $objbeann->setContraseña($contraseña);

        $i=$objDaoo->ModificarAdmin($objbeann);
        if($i == 1){
            $estado['estado'] = 'Registro Modificado';
        }else{
            $estado['estado'] = 'Registro No Modificado';
        }
        echo json_encode($estado);
        break;
    }
}
?>
