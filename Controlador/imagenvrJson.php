<?php

session_start();

require_once '../Bean/imagenvrBean.php';
require_once '../Dao/imagenvrDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: application/json');
$op = $_REQUEST['op'];
switch ($op) {
    case 1: {
        $objdao = new imagenvrDao();
        $lista = $objdao->Listarimagenvr();
        foreach ($lista as $key => $value) {
            $datos[$key] = $lista[$key];
            $datos[$key]['descripcion'] = base64_encode($lista[$key]['descripcion']);
        }
//        foreach ($lista as $list) {
//            $data['data'] = $lista['data'];
//            $data['data'] = base64_encode($list['descripcion']);
//        }
        echo json_encode($datos);
        break;
    }
    case 2: {
        $objbean = new imagenvrBean();
        $objDao = new imagenvrDao();
        $id = $objDao->generarCodigo();
        if ($id == 0) {
            $id = 1;
        } else {
            $id = $objDao->generarCodigo();
        }
        $nombre = $_REQUEST['nombre'];
        $descripcion = addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $objbean->setIdimagen($id);
        $objbean->setNombrevr($nombre);
        $objbean->setDescripcion($descripcion);
        $i = $objDao->Agregarimagenvr($objbean);
        if ($i == 1) {
            $mensaje = "Datos Agregados Satisfactoriamente";
        } else {
            $mensaje = "Datos no Agregados";
        }
        echo json_encode($mensaje);
        break;
    }
    case 3: {
        $id = $_REQUEST['cod'];
        $objbeann = new imagenvrBean();
        $objbean = new imagenvrBean();
        $objbean->setIdimagen($id);
        $objdao = new imagenvrDao();
        $objbeann = $objdao->Datosimagenvr($objbean);
        $Datos['id'] = $objbeann->getIdimagen();
        $Datos['nombre'] = $objbeann->getNombrevr();
        $Datos['descripcion'] = base64_encode($objbeann->getDescripcion());

        echo json_encode($Datos);
        break;
    }
    case 4: {
        $objbeaan = new imagenvrBean();
        $objDaoo = new imagenvrDao();
        $id = $_REQUEST['idlugar'];
        $nombre = $_REQUEST['nombre'];
        $descripcion = addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $objbeaan->setIdimagen($id);
        $objbeaan->setNombrevr($nombre);
        $objbeaan->setDescripcion($descripcion);
        $i = $objDaoo->Modificarimagenvr($objbeaan);
        if ($i == 1) {
            $mensaje = "Datos Modificados Satisfactoriamente";
        } else {
            $mensaje = "Datos no Modificados";
        }
        echo json_encode($mensaje);
        break;
    }
    case 5: {
        $id = $_REQUEST['cod'];
        $objbean = new imagenvrBean();
        $objdao = new imagenvrDao();
        $objbean->setIdimagen($id);
        $i = $objdao->Eliminarimagenvr($objbean);
        if ($i == 1) {
            $mensaje = "Datos Eliminados Satisfactoriamente";
        } else {
            $mensaje = "Datos no Eliminados";
        }
        echo json_encode($mensaje);
        break;
    }
}
?>