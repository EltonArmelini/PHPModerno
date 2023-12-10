<?php
namespace Core;

use App\Models\User;
class Auth
{

    public static function tryLogin($email, $password)
    {

        $user = User::findBy(['email' => $email]);
        
        if (!empty($user) AND password_verify($password, $user[0]->password)) {
            static::ensureSessionStarted();
            $_SESSION['name'] = $user[0]->name;
            $_SESSION['email'] = $user[0]->email;
            $_SESSION['id'] = $user[0]->id;
            return true;
        } else {
            return false;
        }
    }

    public static function check()
    {
        static::ensureSessionStarted();
        if(empty($_SESSION['id'])){
            return false;
        }
        return true;
    }

    public static function ensureSessionStarted()
    {

        if (empty(session_id())) {
            session_start();
        }
    }

    public static function logout()
    {
        session_start();
        session_destroy();
    }
}
