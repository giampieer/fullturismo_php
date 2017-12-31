<?php
session_start();
require_once '../Bean/TipoBean.php';
require_once '../Dao/tipoDao.php';

header('Content-Type: application/json');
$op=$_REQUEST['op'];
switch ($op){
    case 1:{
        $objdao=new tipoDao();
        $lista['TIPO']=$objdao->ListarTipo();
        echo json_encode($lista);
        break;
    }
    case 2:{
        $nombre=$_REQUEST['nombre'];
        $objbean=new TipoBean();
        $objdao=new tipoDao();
        $id=$objdao->GenerarCodigo();
        if($id==0){
            $id=1;
        }else{
            $id=$objdao->GenerarCodigo();
        }
        $objbean->setIdtipo($id);
        $objbean->setNombre($nombre);
        $i=$objdao->GrabarTipo($objbean);
        if($i==1){
            $mensaje['estado']="Registro Insertado";
        }else{
            $mensaje['estado']="Registro No Insertado";
        }
        echo json_encode($mensaje);
        break;
    }
    case 3:{
        $id=$_REQUEST['cod'];
        $objbean=new TipoBean();
        $objbean->setIdtipo($id);
        $objdao=new tipoDao();
        $i=$objdao->EliminarTipo($objbean);
        if($i==1){
            $mensaje['estado']="Registro Eliminado";
        }else{
            $mensaje['estado']="Registro no Eliminado";
        }
        echo json_encode($mensaje);
        break;
    }
    case 4:{
        $id=$_REQUEST['cod'];
        $objbean=new TipoBean();
        $objbean->setIdtipo($id);
        $objdao=new tipoDao;
        $dato['datos']=$objbean=$objdao->CapturarTipo($objbean);
        echo json_encode($dato);
        break;
    }
    case 5:{
        $id=$_REQUEST['id'];
        $nombre=$_REQUEST['nombre'];
        $objbean=new TipoBean();
        $objbean->setIdtipo($id);
        $objbean->setNombre($nombre);
        $objdao=new tipoDao();
        $i=$objdao->ModificarTipo($objbean);
        if($i==1){
            $mensaje['estado']="Datos Modificados";
        }else{
            $mensaje['estado']="Datos No Modificados";
        }
        echo json_encode($mensaje);
        break;
    }
}
?>
