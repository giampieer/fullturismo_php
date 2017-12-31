 <?php session_start(); require_once '../Bean/AdminBean.php';
require_once '../Dao/AdminDAO.php';

$op=$_REQUEST["op"];
switch ($op){
    case 1:{
        try {
            unset($_SESSION['mensaje']);
            $usuario=$_REQUEST["usuario"];
            $clave=$_REQUEST["clave"];
            $objbean=new AdminBean();
            $objcapbean=new AdminBean();
            $objdao=new AdminDAO();
            $objbean->setUsuario($usuario);
            $objbean->setContraseña($clave);
            $i=$objdao->Acceso($objbean);
            if($i==1){
                $mensaje="Bienvenido";
                $objcapbean=$objdao->DatosAdmin($objbean);
                $id=$objcapbean->getIdadmin();
                $_SESSION['id']=$id;
                $destino="../Seguridad/prueba.php";
            }else{
                $mensaje="Datos incorrectos, Vuelva ingresar";
                $destino="../index.php";
            }
            $_SESSION["mensaje"]=$mensaje;
        } catch (Exception $ex) {
            $destino="../Login.php";
        }
        break;
    }
    case 2:{
        unset($_SESSION['mensaje']);        
        $objdao=new AdminDAO();
        $lista=$objdao->ListarAdmin();
        $_SESSION['lista']=$lista;
        $destino="../Admin/ListarAdmin.php";
        break;
    }
    case 3:{
        unset($_SESSION['mensaje']);            
        $destino="../Admin/admin.php";
        break;
    }
    case 4:{
        unset($_SESSION['mensaje']);            
        $id=$_REQUEST["id"];
        $nombre=$_REQUEST["nombre"];
        $usuario=$_REQUEST["usuario"];
        $contraseña=$_REQUEST["contraseña"];
        
        $objbean=new AdminBean();
        $objDao=new AdminDAO();
        $objbean->setIdadmin($id);
        $objbean->setNombre($nombre);
        $objbean->setUsuario($usuario);
        $objbean->setContraseña($contraseña);
        
        $i=$objDao->GrabarAdmin($objbean);
        if($i){
            $mensaje="Registro insertado Satisfactoriamente";
        }else{
            $mensaje="Registro no insertado";
        }
        $_SESSION["mensaje"]=$mensaje;
        
        $destino="../Admin/admin.php";
        
        break;
    }
    
    case 5:{
        unset($_SESSION['mensaje']);        
        $cod=$_REQUEST["cod"];
        $objbeann=new AdminBean();
        $objdaoo=new AdminDAO();
        $objbeann->setIdadmin($cod);
        $i=$objdaoo->EliminarAdmin($objbeann);
        if($i==1){
            $mensaje="Registro Eliminado";
        }else{
            $mensaje="Registro no Eliminado";
        }
        $_SESSION["mensaje"]=$mensaje;
        
        $lista=$objdaoo->ListarAdmin();
        $_SESSION['lista']=$lista;
        $destino="../Admin/ListarAdmin.php";
        break;
    }
    case 6:{
        unset($_SESSION['mensaje']);        
        $cod=$_REQUEST['cod'];
        $objbean=new AdminBean();
        $objbe=new AdminBean();
        $objbean->setIdadmin($cod);
        $objdaoo=new AdminDAO();
        $objbe=$objdaoo->CapturarAdmin($objbean);
        $id=$objbe->getIdadmin();
        $nom=$objbe->getNombre();
        $usuar=$objbe->getUsuario();
        $contra=$objbe->getContraseña();
        $_SESSION['id']=$id;
        $_SESSION['nom']=$nom;
        $_SESSION['usu']=$usuar;
        $_SESSION['contra']=$contra;
        $destino="../Admin/ModificarAdmin.php";
        
        break;
    }
    case 7:{
        unset($_SESSION['mensaje']);            
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
        if($i==1){
            $mensaje="Registro modificado Satisfactoriamente";
        }else{
            $mensaje="Registro no modificado";
        }
        
        $lista=$objDaoo->ListarAdmin();
        $_SESSION['lista']=$lista;
        $_SESSION["mensaje"]=$mensaje;
        $destino="../Admin/ListarAdmin.php";
        break;
    }
    case 8:{
        unset($_SESSION['mensaje']);        $usuario=$_REQUEST["id"];
        $objbeann=new AdminBean();
        $objdao=new AdminDAO();
        $objbeann->setIdadmin($usuario);
        $objcapbean=$objdao->CapturarAdmin($objbeann);
        $id=$objcapbean->getIdadmin();
        $_SESSION['id']=$id;
        $destino="../Seguridad/opciones.php";
        
        break;
    }
}
header("location:$destino");
?>

