<?php session_start();
 require_once '../Bean/PreciosBean.php';
 require_once '../Dao/PrecioDao.php';
 require_once '../Dao/LugarDAO.php';
 require_once '../Bean/LugarBean.php';
 
header('Content-Type: application/json');
$op=$_REQUEST['op'];
switch ($op){
    case 1:{
        $objdao=new PrecioDao();
        $lista['PRECIO']=$objdao->ListaPrecio();
        echo json_encode($lista);
        break;
    }
    case 2:{
        $objdaol=new LugarDAO();
        $objlugar=new LugarBean();
        $objlugar=$objdaol->CapturarLugar1();
        foreach ($objlugar as $key => $value) {
            $datos[$key] = $objlugar[$key];
            $datos[$key]['imagen_lugar'] = base64_encode($objlugar[$key]['imagen_lugar']);
        }
        echo json_encode($datos);
        break;
    }
    case 3:{
        $precio=$_REQUEST['precio'];
        $moneda=$_REQUEST['moneda'];
        $dias=$_REQUEST['dias'];
        $idlugar=$_REQUEST['lugar'];
        $objbean=new PreciosBean();
        $objdao=new PrecioDao();
        $id = $objdao->GenerarCodigo();
        if($id == 0){
            $id = 1;
        }else{
            $id = $objdao->GenerarCodigo();
        }
        $objbean->setIdprecio($id);
        $objbean->setPrecio($precio);
        $objbean->setTipo_moneda($moneda);
        $objbean->setDias($dias);
        $objbean->setIdlugar($idlugar);
        $i=$objdao->GrabarPrecios($objbean);
        if($i==1){
            $mensaje['estado']="Registro Insertado";
        }else{
            $mensaje['estado']="Registro No Insertado";
        }
        echo json_encode($mensaje);
        break;
    }
    case 4:{
        $id=$_REQUEST['cod'];
        $objbean=new PreciosBean();
        $objbean->setIdprecio($id);
        $objdao=new PrecioDao();
        $i=$objdao->EliminarPrecios($objbean);
        if($i==1){
            $mensaje['estado']="Registro Eliminado";
        }else{
            $mensaje['estado']="Registro No Eliminado";
        }
        echo json_encode($mensaje);
        break;
    }
    case 5:{
        $id=$_REQUEST['cod'];
        $objbean=new PreciosBean();
        $objdao=new PrecioDao();
        $objbean->setIdprecio($id);
        $data['DATOS']=$objbean=$objdao->CapturarPrecios($objbean);
        echo json_encode($data);
        break;
    }
    case 6:{
        $id=$_REQUEST['id'];
        $precio=$_REQUEST['precio'];
        $moneda=$_REQUEST['moneda'];
        $dias=$_REQUEST['dias'];
        $idlugar=$_REQUEST['lugar'];
        $objbean=new PreciosBean();
        $objbean->setIdprecio($id);
        $objbean->setPrecio($precio);
        $objbean->setTipo_moneda($moneda);
        $objbean->setDias($dias);
        $objbean->setIdlugar($idlugar);
        $objdao=new PrecioDao();
        $i=$objdao->ModificarDatos($objbean);
        if($i==1){
            $mensaje['estado']="Registro Modificados";
        }else{
            $mensaje['estado']="Registro No Modificados";
        }
        echo json_encode($mensaje);
        break;
    }
}
?>