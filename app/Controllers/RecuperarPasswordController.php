<?php

namespace App\Controllers;

use App\Mail\SolicitarCambioPasswordMail;
use App\Models\Usuario;
use Carbon\Carbon;
use Core\Request;
use Ramsey\Uuid\Uuid;
use Valitron\Validator;

class RecuperarPasswordController extends \Core\Controller
{
    public function formularioRecuperar()
    {
        return viewOnly('auth/solicitar-cambio-password');
    }

    public function solicitarRecuperar(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'email');
        if (!$validator->validate()) {
            session()->setFlash('inputs', $request->getBody());
            session()->setFlash('errores', $validator->validate());
            response()->redirect('/solicitar-cambio-password');
        }
        $usuario_existe = Usuario::firstWhere('email', $request->get('email'));
        if (is_null($usuario_existe)) {
            session()->setFlash('inputs', $request->getBody());
            session()->setFlash('errores', ['email' => ['Usuario no existe']]);
            response()->redirect('/solicitar-cambio-password');
        }
        $token = Uuid::uuid4();
        $dt = Carbon::now();
        $token_caducidad = $dt->addDay();
        $usuario_existe->token_recuperar = $token;
        $usuario_existe->token_recuperar_caducidad = $token_caducidad;
        $usuario_existe->save();
        $mail = new SolicitarCambioPasswordMail($request->getSchemeAndHttpHost(), $token);
        $mail->setSubject('Solicitud de cambio de contraseña');
        $mail->setFrom(['soporte@tiendavirtual.test' => 'Soporte tienda virtual']);
        $mail->setTo([$usuario_existe->email => $usuario_existe->nombre_completo]);
        mailer()->enviarMensaje($mail);
        session()->setFlash('message_success', 'Se envió un mensaje a su correo electrónico con su enlace de recuperación');
        response()->redirect('/solicitar-cambio-password');
    }

    public function formularioCambiar($token, Request $request)
    {
        $email = $request->get('email', '');
        $solicitud = Usuario::where('token_recuperar', $token)->where('email', $email)->first();
        $error = false;
        if (is_null($solicitud)) {
            $error = 'Enlace de recuperación inválido';
        } else {
            $caducidad = Carbon::createFromFormat('Y-m-d H:i:s', $solicitud->token_recuperar_caducidad);
            $dt = Carbon::now();
            if ($dt->diffInSeconds($caducidad, false) < 0) {
                $error = 'Enlace ya no es válido, excedió tiempo de validez';
            }
        }
        return viewOnly('auth/cambiar-password', [
            'token' => $token,
            'email' => $email,
            'error' => $error
        ]);
    }

    public function cambiarPassword(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'token');
        $validator->rule('required', 'email');
        $validator->rule('required', 'password');
        $validator->rule('required', 'password_confirmacion');
        $validator->rule('equals', 'password_confirmacion', 'password');
        $validator->rule('email', 'email');
        $validator->labels([
            'password' => 'Contraseña',
            'password_confirmacion' => 'Confirmar contraseña',
            'email' => 'Correo electrónico',
            'token' => 'Enlace inválido'
        ]);
        if (!$validator->validate()) {
            session()->setFlash('errores', $validator->errors());
            session()->setFlash('inputs', $request->getBody());
            response()->redirect($request->getUrlPeticion());
        }
        $email = $request->get('email', '');
        $token = $request->get('token', '');
        $solicitud = Usuario::where('token_recuperar', $token)->where('email', $email)->first();
        if (is_null($solicitud)) {
            session()->setFlash('errores', ['email' => ['Enlace de recuperació no es válido']]);
            response()->redirect($request->getUrlPeticion());
        } else {
            $caducidad = Carbon::createFromFormat('Y-m-d H:i:s', $solicitud->token_recuperar_caducidad);
            $dt = Carbon::now();
            if ($dt->diffInSeconds($caducidad, false) < 0) {
                session()->setFlash('errores', ['email' => ['Enlace de recuperación caducó']]);
                response()->redirect($request->getUrlPeticion());
            }
        }
        $solicitud->token_recuperar = null;
        $solicitud->token_recuperar_caducidad = null;
        $solicitud->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        $solicitud->save();
        response()->redirect('/login');
    }
}