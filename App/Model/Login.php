<?php


namespace App\Model;


class Login
{
    public static function Login($link, $user, $pass, $level)
    {
        if ($level == "Admin")
            $sql = "SELECT * FROM admin where Username='" . md5($user) . "' and  Password='" . md5($pass) . "'";
        else if ($level == "Dosen")
            $sql = "SELECT * FROM dosen where NIDN='" . $user . "' AND  NIDN='" . $pass . "'";


        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function SignUp($link, $user, $pass){
        
    }
}