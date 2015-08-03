<?php
class LoginController extends Controller{

    public function actionAjaxAuthenticationUser() {
        $loginUser = Yii::app()->request->getParam('username');
        $passwordUser = Yii::app()->request->getParam('password');
        $result = $this->autenticarUsuario($loginUser, $passwordUser);
        
        if ($result['success']) {
            $session = new CHttpSession;
            $session->open();
            $session->add('usuarioSesion', $result);
            $this->redirect('index.php');
        } else {

            $this->redirect('login.php?message=' . $result['message'] . '&l=' . $loginUser);
        }
    }

    public function obtenerUsuarioByLoginUser($loginUser, $tipo=0) {
        $usuarioCriteria = new CDbCriteria();

        // HIZE CAMBIOS DESDE AQUI =================================
        if($tipo==1){
            $usuarioCriteria->select = 'des_usuario, ide_rol,estado';
        }        
        $usuarioCriteria->addSearchCondition('des_usuario', $loginUser);
        $usuario = SisUsuario::model()->find($usuarioCriteria);
        if(empty($usuario)){return NULL;}
        return $usuario->attributes;
    }
    // HIZE CAMBIOS DESDE AQUI ================================================
    // ACTUALIZA TODO ESTE METODO
    public function obtenerDataUsuario($idePersona) {
       // $usuarioCriteria = new CDbCriteria();
        //$usuarioCriteria->addSearchCondition('ide_persona', $idePersona);
        //$usuario = SisPersona::model()->find($usuarioCriteria);
        //$usuario =Sispersona::model()->obtenerEmpleadoxId($idePersona);
        $usuario=Sispersona::model()->find('ide_persona=:ide_persona', array(':ide_persona'=>$idePersona));
        if(empty($usuario)){return NULL;}
        return $usuario->attributes;

    }

   

    public function findUsuarioByPk($id) {
        try {
            return Usuario::model()->findByPk($id)->attributes;
        } catch (Exception $exc) {
            return null;
        }
    }


    public function autenticarUsuario($loginUser, $password) {

        if (empty($loginUser)) {
           // throw new Exception('Debe Ingresar el usuario.');
            return array('success' => FALSE,'message'=>'Debe Ingresar el usuario.');
        }
        
        if (empty($password)) {
            //throw new Exception('Debe Ingresar la contrase&ntilde;a.');
            return array('success' => FALSE,'message'=>'Debe Ingresar la contraseña.');
        }
        
        $usuario = $this->obtenerUsuarioByLoginUser($loginUser);
        if (empty($usuario)) {
            //throw new Exception('El usuario no existe');
            return array('success' => FALSE,'message'=>'El usuario no existe');
        }
        $passwordMD5 = md5($password);
        if($passwordMD5!=$usuario['des_password']){
            //throw new Exception('La Clave es incorrecta.');
            return array('success' => FALSE,'message'=>'La Clave es incorrecta.');
        }

        if($usuario['estado']!="1"){
            //throw new Exception('La Clave es incorrecta.');
            return array('success' => FALSE,'message'=>'Acceso denegado.');
        }

        // HIZE CAMBIOS DESDE AQUI ==============================================
        $usuarioSistema = $this->obtenerUsuarioByLoginUser($loginUser, 1);
        $dataUsuario = $this->obtenerDataUsuario($usuario['ide_persona']);
     
        $data = array();
        $data['usuario'] = $usuarioSistema;
        $data['datausuario'] = $dataUsuario;
        $data['success'] = TRUE;
      
        return $data;
        
    }


    public function actionAjaxRegistrarUsuario(){


    

$des_usuario=$_POST['des_usuario'];
$des_password=$_POST['des_password'];
$ide_rol=$_POST['ide_rol'];
$ide_persona=$_POST['ide_persona'];
$des_correo=$_POST['des_correo'];


        $respuesta = SisUsuario::model() -> registrarUsuario($des_usuario,$des_password,$ide_rol,$ide_persona,$des_correo);

        header('Content-Type: application/json; charset="UTF-8"');
          Util::renderJSON(array( 'success' => $respuesta ));
    }   

public function actionAjaxVerificarCorreo(){

        $des_correo =$_POST['des_correo'];
    
    
        $respuesta = sispersona::model()->verificarCorreo($des_correo);

        header('Content-Type: application/json; charset="UTF-8"');
        echo CJSON::encode(array('output'=>$respuesta));
    }

    public function actionAjaxVerificarUsuario(){

        $des_usuario =$_POST['des_usuario'];
    
    
        $respuesta = SisUsuario::model()->verificarUsuario($des_usuario);

        header('Content-Type: application/json; charset="UTF-8"');
        echo CJSON::encode(array('output'=>$respuesta));
    }


    public function actionIndex(){
        
        $this->redirect("login.php");
    }

    private function getUsuarioService(){
        $usuarioService = new usuarioServiceImpl();
        return $usuarioService;
    }



    public function actionLogOut() {
        $session = new CHttpSession;
        $session->open();
        $session->remove('usuarioSesion');
        $this->redirect('login.php');
    }
}