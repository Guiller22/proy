<?php
class usuarios
{
    //funcion para el logeo del usuario
    public function login($usuarioL, $contraseñaL)
    {
        try {
            $db = getDB(); 
            $contrasenya_cifrada = hash('sha256', $contraseñaL); //ciframos la contraseña
            $stmt = $db->prepare("SELECT uid FROM usuarios WHERE (usuario=:usuario) AND contraseña=:contrasenya_cifrada");
            $stmt->bindParam("usuario", $usuarioL, PDO::PARAM_STR);
            $stmt->bindParam("contrasenya_cifrada", $contrasenya_cifrada, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $data = $stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if ($count) {
                $_SESSION['uid'] = $data->uid; //comprobamos que el usuario existe
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }
    //funcion para el registro
    public function registro($usuario, $contraseña, $email)
    {
        try {
            $db = getDB();
            $st = $db->prepare("SELECT uid FROM usuarios WHERE usuario=:usuario OR email=:email");
            $st->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $st->bindParam("email", $email, PDO::PARAM_STR);
            $st->execute();
            $count = $st->rowCount();
            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO usuarios(usuario,contraseña,email) VALUES (?,?,?)");
                $stmt->bindParam(1, $usuario, PDO::PARAM_STR);
                $hash_password = hash('sha256', $contraseña);
                $stmt->bindParam(2, $hash_password, PDO::PARAM_STR);
                $stmt->bindParam(3, $email, PDO::PARAM_STR);

                $stmt->execute();
                $uid = $db->lastInsertId(); //último id añadido
                $db = null;
                $_SESSION['uid'] = $uid;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; //catch para los posibles errores que puedan suceder.
        }
    }



    //funcion para obtener los datos del usuario
    public function usuarioDatos($uid)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT email,usuario,tipo_usuario FROM usuarios WHERE uid=:uid");
            $stmt->bindParam("uid", $uid, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //Obtenemos los atributos del usuario pasado
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}'; //Catch para posibles errores
        }
    }
}
