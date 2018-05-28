<?php
class pages{
    public function home(){
        $favAnn = Post::all('u.author, a.*, f.annonce_id, COUNT(f.annonce_id) AS nbr', 'favAnn f', 'annonce a ON f.annonce_id = a.id INNER JOIN user u', 'a.author_id = u.id GROUP BY f.annonce_id ORDER BY nbr DESC LIMIT 3');
        $favPost = Post::all('u.author AS auth, p.*, f.post_id, COUNT(f.post_id) AS nbr', 'favPost f', 'Post p ON f.post_id = p.id INNER JOIN user u', 'p.author = u.id GROUP BY f.post_id ORDER BY nbr DESC LIMIT 3');
        //var_dump($favAnn);
        require('views/pages/home.php');
    }
    public function error(){
        require('views/pages/error.php');
    }
}