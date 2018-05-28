<?php
//require_once('models/posts.php');
require_once('models/test.php');
require_once('models/Post.php');
class ajax{

    public function create() {
        if(!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['verifpass'])){
            $verif = Post::find('author = "' . $_POST['pseudo'] .'"','', 'user', '', '');
            if($verif['author'] == NULL || strtolower($verif['author']) != strtolower($_POST['pseudo'])){
                if($_POST['password'] == $_POST['verifpass']){
                    $passcrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    Post::add('user (author, pass)', '"' . $_POST['pseudo'] . '", "' . $passcrypt . '"');
                    echo 'true';
                } else {
                    echo 'Wrong password';
                }
            } else {
                echo 'Username allready used';
            }
        } else {
            echo 'You need to complete everything';
        }
    }

    public function favoritePost(){
        $fav = Post::allById('post_id = ' . $_POST['id'] . ' AND author_id = ' . $_SESSION['id_user'] . '', '', 'favPost', '', '', '');
        if($fav == false){
            Post::add('favPost (author_id, post_id)', '"' . $_SESSION['id_user'] . '", "' . $_POST['id'] . '"');
            echo 'true';
        } else {
            Post::delete('favPost', 'post_id = "' . $_POST['id'] . '" AND author_id = "' . $_SESSION['id_user'] . '"');
            echo 'false';
        }

    }

    public function favoriteAnnonce(){
        $fav = Post::allById('annonce_id = ' . $_POST['id'] . ' AND author_id = ' . $_SESSION['id_user'] . '', '', 'favAnn', '', '', '');
        if($fav == false){
            Post::add('favAnn (author_id, annonce_id)', '"' . $_SESSION['id_user'] . '", "' . $_POST['id'] . '"');
            echo 'true';
        } else {
            Post::delete('favAnn', 'annonce_id = "' . $_POST['id'] . '" AND author_id = "' . $_SESSION['id_user'] . '"');
            echo 'false';
        }
    }

    public function logout(){
        session_destroy();
        echo 1;
    }

    public function login() {
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
                    echo '3';
                } else {
                    echo '1';
                }
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }

    public function test(){
        $result = test::all('Post');
        var_dump($result);
        /*foreach($result as $value){
            echo $value->get_author() . '<br>';
            if(method_exists($value, 'get_title')){
                echo $value->get_title() . '<br>';
            }
        }*/
    }
}