<?php
require_once('models/test.php');
class PostModel extends test {

    const table = 'Post';

    protected $id;
    protected $author;
    protected $title;
    protected $content;
    protected $created_date;
    protected $modified_date;

    public function __construct($dbarray = null){
        
        $fieldDb = array(
            'id' => 'id',
            'author' => 'author',
            'title' => 'title',
            'content' => 'content',
            'created_date' => 'created_date',
            'modified_date' => 'modified_date' );

            //parent::__construct($dbarray, $fieldarray);
    }

    public function set_id($id){
        $this->id = $id;
        return $this;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_author($author){
        $this->author = $author;
        return $this;
    }

    public function get_author(){
        return $this->author;
    }

    public function set_title($title){
        $this->title = $title;
        return $this;
    }

    public function get_title(){
        return $this->title;
    }

    public function set_content($content){
        $this->content = $content;
        return $this;
    }

    public function get_content(){
        return $this->content;
    }

    public function set_created_date($createdDate){
        $this->created_date = $createdDate;
        return $this;
    }

    public function get_created_date(){
        return $this->created_date;
    }

    public function set_modified_date($modifiedDate){
        $this->modified_date = $modifiedDate;
        return $this;
    }

    public function get_modified_date(){
        return $this->modified_date;
    }

    public function getObject(){
        return $this;
    }
}