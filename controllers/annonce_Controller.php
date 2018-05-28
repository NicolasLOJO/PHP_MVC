<?php

class annonce {

    public function index(){
        if(isset($_GET['id']) && $_GET['action'] == 'index'){
            $posts = Post::allById('a.author_id = ' . $_GET['id'], 'a.*, u.author', 'annonce a', 'user u', 'u.id = a.author_id', '', '');
            //var_dump($posts);
        } else {
            $posts = Post::all('a.*, u.author', 'annonce a', 'user u', 'u.id = a.author_id');
            $state = Post::all('', 'region', '', '');
            $categorie = Post::all('', 'categorie', '', '');
            if(isset($_SESSION['connected'])){    
                $fav = Post::all('', 'favAnn');
            }
            //var_dump($posts[0]);
        }
        require_once('views/annonce/index.php');
    }

    public function show(){
        if (isset($_GET['id'])){
            $posts = Post::find('a.id = "' . $_GET['id'] . '"', 'a.*, u.author, c.name AS cat, r.name AS reg', 'annonce a', 'user u ON u.id = a.author_id INNER JOIN categorie c ON c.id = a.categorie_id INNER JOIN region r', 'r.id = a.region_id');
            //var_dump($posts);
            require_once('views/annonce/show.php');
        } else {
            require_once('views/pages/error.php');
        }
    }

    public function create(){
        $i = 1;
        $index = 0;
        $list = [];
        if(isset($_POST['titleAd']) && isset($_POST['descAd']) && isset($_POST['selectStateAd']) && isset($_POST['selectCatAd']) && isset($_POST['priceAd'])){
            $find = Post::find('author = "' . $_SESSION['Username'] . '"', '', 'user', '', '');
            $dir = 'asset/pictures/';
            foreach($_FILES['img']['name'] as $value){
                if(!empty($value)){
                    $exts = self::findexts($value);
                    $new_name = uniqid('IMG_', false);
                    $target = 'asset/pictures/';
                    $result = $new_name . '.' . $exts;
                    $img = 'img_' . $i;
                    $i++;
                    $list[$img] = $target . $result;
                    if(file_exists("asset/pictures/$result")) unlink("asset/pictures/$result");move_uploaded_file($target,"asset/pictures/$result");
                    $target = $target . $result;
                    if(move_uploaded_file($_FILES['img']['tmp_name'][$index], $target))  {
                    $index++;
                    }  else { 
                        echo "Sorry, there was a problem uploading your file."; 
                    } 
                }
            }
            $res = Post::add('annonce (author_id, title, description, categorie_id, region_id, price, img )', '\'' . $find['id'] . '\' , \'' . $_POST['titleAd'] . '\' , \'' . $_POST['descAd'] . '\' , \'' . $_POST['selectCatAd'] . '\' , \'' . $_POST['selectStateAd'] . '\' , \'' . $_POST['priceAd'] . '\' , \'' . serialize($list) . '\'');
            //var_dump($res);
            $this->index();
        }
    }

    public function update(){
        
    }

    public function delete(){
        if(isset($_GET['id'])){
            $user = Post::find('id = "' . $_GET['id'] . '"','', 'annonce' );
            if($user['author_id'] == $_SESSION['id_user'] || $_SESSION['privilege'] > 50){
                Post::delete('annonce', 'id = "' . $_GET['id'] . '"');
                Post::delete('favAnn', 'annonce_id = "' . $_GET['id'] . '"');
            }
        }
    }

    private function findexts ($filename)  {  
        $filename = strtolower($filename) ;  
        $exts = preg_split("[/\\.]", $filename) ;  
        $n = count($exts)-1;  
        $exts = $exts[$n];  return $exts;  
     }   

}