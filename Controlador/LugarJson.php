<?php
session_start();
require_once '../Bean/LugarBean.php';
require_once '../Dao/LugarDAO.php';
require_once '../Dao/tipoDao.php';
require_once '../Bean/TipoBean.php';
require_once '../Bean/imagenvrBean.php';
require_once '../Dao/imagenvrDao.php';

header('Content-Type: application/json');
$op=$_REQUEST['op'];
switch ($op){
    case 1:{
        $cod=$_REQUEST['tipo'];
        $objbean=new LugarBean();
        $objbean->setIdtipo($cod);
        $objdao=new LugarDAO();
        $lista = $objdao->ListarLugaresAndroid($objbean);
//        foreach ($lista as $key => $value) {
//            $datos[$key] = $lista[$key];
//            $datos[$key]['imagen_lugar'] = base64_encode($lista[$key]['imagen_lugar']);
//        }
        echo json_encode($lista);
        break;
    }
    case 2:{
        $objbeann=new TipoBean();
        $objdaotipo=new tipoDao();
        $data['DATOS']=$objbeann=$objdaotipo->CapturaDato1();
        echo json_encode($data);
        break;
    }
    case 3:{
        $nombre=$_REQUEST['nombre'];
        $descripcion=$_REQUEST['descripcion'];
        $imagen= addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $itinerioa=$_REQUEST['itinerario'];
        $idadmin=$_REQUEST['idadmin'];
        $tipo=$_REQUEST['tipo'];
        $imagenvr=$_REQUEST['imagenvr'];
        $objdao=new LugarDAO();
        $objbean=new LugarBean();
        $id = $objdao->GenerarCodigo();
        if($id == 0){
            $id = 1;
        }else{
            $id = $objdao->GenerarCodigo();
        }
        $objbean->setIdlugar($id);
        $objbean->setNombre($nombre);
        $objbean->setDescripcion($descripcion);
        $objbean->setImgen_blob($imagen);
        $objbean->setImagen_vr($imagenvr);
        $objbean->setItinerario($itinerioa);
        $objbean->setIdadmin($idadmin);
        $objbean->setIdtipo($tipo);
        $i=$objdao->GrabarLugar($objbean);
        if($i==1){
            $mensaje['estado']="Registro Insertado Satisfactoriamente";
        }else{
            $mensaje['estado']="Registro No Insertado ";
        }
        echo json_encode($mensaje);
        break;
    }
    case 4:{
        
        $id=$_REQUEST['cod'];
        $idadmin=$_REQUEST['codadmin'];
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objbean->setIdadmin($idadmin);
        $objdao=new LugarDAO();
        $i=$objdao->EliminarLugares($objbean);
        if($i==1){
            $mensaje['estado']="Registro Eliminados";
        }else{
            $mensaje['estado']="Registro No eliminados";
        }
        echo json_encode($mensaje);
        break;
    }
    case 5:{
        $id=$_REQUEST['cod'];
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objdao=new LugarDAO();
        $objbean=$objdao->CapturarLugar($objbean);
        foreach ($objbean as $key => $value) {
            $datos[$key] = $objbean[$key];
            $datos[$key]['imagen_lugar'] = base64_encode($objbean[$key]['imagen_lugar']);
        }
        echo json_encode($datos);
        break;
    }
    case 6:{
        $id=$_REQUEST['idlugar'];
        $nombre=$_REQUEST['nombre'];
        $descripcion=$_REQUEST['descripcion'];
        $imagen= addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $imagenvr=$_REQUEST['imagenvr'];
        $itinerioa=$_REQUEST['itinerario'];
        $idadmin=$_REQUEST['idadmin'];
        $tipo=$_REQUEST['tipo'];
        $objdao=new LugarDAO();
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objbean->setNombre($nombre);
        $objbean->setDescripcion($descripcion);
        $objbean->setImgen_blob($imagen);
        $objbean->setImagen_vr($imagenvr);
        $objbean->setItinerario($itinerioa);
        $objbean->setIdadmin($idadmin);
        $objbean->setIdtipo($tipo);
        $i=$objdao->ModificarLugares($objbean);
        if($i==1){
            $mensaje['estado']="Registro Modificado Satisfactoriamente";
        }else{
            $mensaje['estado']="Registro No Modificado ";
        }
        echo json_encode($mensaje);
        break;
    }
    case 7:{
        $objbea=new imagenvrBean();
        $objda=new imagenvrDao();
        $lista=$objbea=$objda->Datosimagenvr1();
        foreach ($lista as $key => $value) {
            $datos[$key] = $lista[$key];
            $datos[$key]['descripcion'] = base64_encode($lista[$key]['descripcion']);
        }
        echo json_encode($datos);
        break;
    }
    
}
?>


