<?php
require_once('models/posts.php');
class comment{

    public function add(){
        $action = 'create';
        $value = '';
        require('views/comment/add.php');
    }
    public function create(){
        $user_id = Post::find('author = "' . $_SESSION['Username'] . '"', '', 'user', '', '');
        Post::add('comments (author, comment, billet_id)', '"' . $user_id['id'] . '", "' . $_POST['newBillet'] . '" , "' . $_GET['id'] . '"');
        $posts = Post::find('p.id = ' . $_GET['id'], 'p.*, u.author', 'Post p', 'user u', 'u.id = p.author');
        $list = Post::allById('billet_id = ' . $_GET['id'] . '', 'c.*, u.author', 'comments c', 'user u', 'u.id = c.author', 'comment_date', 'desc');
        require_once('views/posts/show.php');
    }
}