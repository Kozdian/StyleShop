<?php


namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Classes\Email;

class LoginController {

    // Methods

    public static function crear(Router $router) {

        $usuario = new Usuario;
        // Alertas vacías
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            
            // Revisar que alerta este vacía
            if(empty($alertas)):
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows):
                    // Esta registrado
                    $alertas = Usuario::getAlertas();
                else:
                    // No esta registrado //

                    // Hashear el password
                    $usuario->hashPassword();

                    // Generar un Token único
                    $usuario->crearToken();

                    // Enviar email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();
                    
                    // Crear el usuario
                    $resultado = $usuario->guardar();
                    if($resultado):
                        header('Location: /mensaje');
                    endif;
                    
                endif;
            endif;
        endif;

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function login(Router $router) {
        $alertas = [];

        $auth = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();

            if(empty($alertas)):
                // Comprobar que exista el usuario
                $usuario = Usuario::where('email', $auth->email);

                if($usuario):
                    // Verificar password
                    if($usuario->comprobarPasswordAndVerificado($auth->password)):
                        // Autenticar el usuario
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        
                        // Redireccionamiento
                        if($usuario->admin === "1"):
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        else:
                            header('Location: /cita');
                        endif;

                    endif;
                else:
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                endif;
            endif;

            
        endif;

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas,
            'auth' => $auth
        ]);



    }

    public static function logout() {
        session_start();
        $_SESSION = [];

        header('Location: /');
    }

    public static function olvide(Router $router) {
        
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)):
                $usuario = Usuario::where('email', $auth->email);
                if($usuario):
                    // Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //Enviar el email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstrucciones();


                    // Alerta
                    Usuario::setAlerta('exito', 'Revisa tu Correo Electrónico');

                    
                elseif(!$usuario):
                    Usuario::setAlerta('error', 'El Usuario no Existe');
                elseif(!$usuario->confirmado):
                    Usuario::setAlerta('error', 'El Usuario no esta Confirmado');
                endif;
            endif;
        endif;
        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide', [
            'alertas' => $alertas
        ]);
        
    }

    public static function recuperar(Router $router) {
        $alertas = [];
        $error = false;

        $token = s($_GET['token']);

        // Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)):
            Usuario::setAlerta('error', 'Token no Válido');
            $error = true;
        endif;

        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            // Leer el nuevo password y guardarlo
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if(empty($alertas)):
                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if($resultado):
                    header('Location: /');
                endif;
            endif;

        endif;


        $alertas = Usuario::getAlertas();

        $router->render('auth/recuperar-password', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {
        $alertas = [];

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)):
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no Válido');
        else:
            // Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = '';
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Confirmada Correctamente');

        endif;

        // Obtener las alertas
        $alertas = Usuario::getAlertas();


        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}