<?php
require_once('models/posts.php');
require_once('models/Post.php');
require_once('models/dao.php');

class posts{

    public function index() {
        $value = '';
        $action = 'add';
        $titlebillet = '';
        if(isset($_GET['id']) && $_GET['action'] == 'index'){
            $posts = Post::allById('p.author = ' . $_GET['id'], 'p.*, u.author', 'Post p', 'user u', 'u.id = p.author', '', '');
            $fav = Post::all('', 'favPost');
            //var_dump($posts);
        } else {
            if(isset($_SESSION['connected'])){
                $posts = Post::all('p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
                $fav = Post::all('', 'favPost');
            } else {
                $posts = Post::all('p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
            }
            //var_dump($posts[0]);
        }
        require('views/posts/index.php');
    }

    public function show(){
        if (isset($_GET['id'])){
            $posts = Post::find('p.id = ' . $_GET['id'], 'p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
            //var_dump($posts);
            $list = Post::allById('billet_id = ' . $_GET['id'] . '', 'c.*, u.author', 'comments c', 'user u', 'u.id = c.author', 'comment_date', 'desc');
            //var_dump($list);
            require_once('views/posts/show.php');
        } else {
            require_once('views/pages/error.php');
        }
    }

    public function add(){
        if(isset($_POST['newBillet']) && isset($_POST['title'])){
            $user_id = Post::find('author = "' . $_SESSION['Username'] . '"', '', 'user', '', '');
            Post::add('Post (author, title, content, created_date)', '"' . $user_id['id'] .'", "' . $_POST['title'] .'", "' . $_POST['newBillet'] . '", NOW()');
            $this->index();
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $user = Post::find('p.id = ' . $_GET['id'], 'p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
            if(isset($_SESSION['connected']) && $user['author'] == $_SESSION['Username'] || isset($_SESSION['connected']) && $_SESSION['privilege'] > 50){
                Post::delete('Post', 'id = ' . $_GET['id']);
                Post::delete('favPost', 'post_id = "' . $_GET['id'] . '"');
                $this->index();
            } else {
                require_once('views/pages/error.php');
            }
            
        }
    }

    public function update(){
        $posts = Post::find('id = ' . $_GET['id'], '', 'Post', '', '');
        $value = $posts['content'];
        $titlebillet = $posts['title'];
        $action = 'updateadd';
        require_once('views/posts/create.php');
    }

    public function updateadd(){
        //var_dump($value);
        Post::update('Post', 'title = "' . $_POST['title'] . '", content = "' . $_POST['newBillet'] .'", modified_date = NOW()', 'id = ' . $_GET['id']);
        $this->index();
    }

    public function test(){
        $value = '';
        $action = 'add';
        $titlebillet = '';
        $test = DAO::dbArray('Post');
        //var_dump($test);
        if(isset($_SESSION['connected'])){
            $posts = Post::all('p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
            var_dump($test);
            $fav = Post::all('', 'favPost');
            //var_dump($posts);
        } else {
            $posts = Post::all('p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
        }
            //var_dump($posts[0]);
        require('views/posts/index.php');
    }
}