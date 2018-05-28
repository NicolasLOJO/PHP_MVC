<?php

class Connected{
    public function login(){
        if(isset($_SESSION['connected']) && $_SESSION['connected'] == true){
            require_once('views/pages/home.php');
        } else {
            require_once('views/connected/login.php');
        }   
    }

    public function signup() {
        require_once('views/connected/signup.php');
    }

    public function verifLogin() {
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
            $verif = Post::find('author = "' . $_POST['pseudo'] . '"', '', 'user', '', '');
            if($verif['author'] == $_POST['pseudo']){
                $pass = $_POST['password'];
                $pass1 = $verif['pass'];
                //var_dump($verif['author']);
                if(password_verify($pass, $pass1)){
                    $_SESSION['connected'] = true;
                    $_SESSION['Username'] = $_POST['pseudo'];
                    $_SESSION['id_user'] = $verif['id'];
                    $_SESSION['privilege'] = $verif['privilege'];
                    $this->login();
                } else {
                    $status = '<p>Wrong username or password</p>';
                }
            } else {
                $status = '<p>Wrong username or password</p>';
            }
        } else {
            $status = '<p>You need to complete everything</p>';
        }
        require_once('views/connected/login.php');
    }

    public function logout(){
        session_destroy();
        require_once('views/connected/logout.php');
    }

    public function member(){
        require_once('views/connected/member.php');
    }
}