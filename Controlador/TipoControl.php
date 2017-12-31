 <?php session_start();
 require_once '../Bean/TipoBean.php';
    require_once '../Dao/tipoDao.php';
    /* 
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    $op=$_REQUEST['op'];
    switch ($op){
        case 1:{
            unset($_SESSION['mensaje']);        
            $objdao=new tipoDao();
            $lista=$objdao->ListarTipo();
            $_SESSION['lista']=$lista;
            $destino="../Tipo/ListaTipo.php";
            break;
        }
        case 2:{
            unset($_SESSION['mensaje']);        
            $destino="../Tipo/GrabarTipo.php";
            break;
        }
        case 3:{
            unset($_SESSION['mensaje']);        
            $id=$_REQUEST['id'];
            $nombre=$_REQUEST['nombre'];
            $objbean=new TipoBean();
            $objbean->setIdtipo($id);
            $objbean->setNombre($nombre);
            $objdao=new tipoDao();
            $i=$objdao->GrabarTipo($objbean);
            if($i==1){
                $mensaje="Datos Grabados Correctamente";
            }else{
                $mensaje="Datos no Grabados";
            }
            $_SESSION['mensaje']= $mensaje;
            $destino="../Tipo/GrabarTipo.php";
            break;
        }
        case 4:{
            unset($_SESSION['mensaje']);        
            $id=$_REQUEST['cod'];
            $objbean=new TipoBean();
            $objbean->setIdtipo($id);
            $objdao=new tipoDao();
            $i=$objdao->EliminarTipo($objbean);
            if($i==1){
                $mensaje="Registro Eliminado";
            }else{
                $mensaje="Registro no Eliminado";
            }
            $_SESSION['mensaje']=$mensaje;
            $lista=$objdao->ListarTipo();
            $_SESSION['lista']=$lista;
            $destino="../Tipo/ListaTipo.php";
            break;
        }
        case 5:{
            unset($_SESSION['mensaje']);        $id=$_REQUEST['cod'];
            $objbean=new TipoBean();
            $objbean->setIdtipo($id);
            $objdao=new tipoDao;
            $objbean=$objdao->CapturarTipo($objbean);
            $_SESSION['data']=$objbean;
            
            $destino="../Tipo/ModificarTipo.php";
            break;
        }
        case 6:{
            unset($_SESSION['mensaje']);       
            $id=$_REQUEST['id'];
            $nombre=$_REQUEST['nombre'];
            $objbean=new TipoBean();
            $objbean->setIdtipo($id);
            $objbean->setNombre($nombre);
            $objdao=new tipoDao();
            $i=$objdao->ModificarTipo($objbean);
            if($i==1){
                $mensaje="Datos Modificados Correctamente";
            }else{
                $mensaje="Datos no Modificados";
            }
            $_SESSION['mensaje']= $mensaje;
            $lista=$objdao->ListarTipo();
            $_SESSION['lista']=$lista;
            $destino="../Tipo/ListaTipo.php";
            
            break;
        }
    }
    header("location:$destino");
    ?>
