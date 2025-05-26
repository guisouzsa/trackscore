<?php
class Usuario {

    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $dado = $stmt->fetch();
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['idusuario'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }
}
?>
