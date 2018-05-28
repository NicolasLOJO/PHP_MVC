<?php

class UserModel {

    const table = 'user';
    protected $id;
    protected $author;
    protected $pass;
    protected $signin_date;
    protected $privilege;

    function __construct($dbarray = null){
        $fieldDb = array(
            'id' => 'id',
            'author' => 'author',
            'pass' => 'pass',
            'signin_date' => 'signin_date',
            'privilege' => 'privilege');

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

    public function set_pass($pass){
        $this->pass = $pass;
        return $this;
    }

    public function get_pass(){
        return $this->pass;
    }

    public function set_signin_date($signin){
        $this->signin_date = $signin;
        return $this;
    }

    public function get_signin_date(){
        return $this->signin_date;
    }

    public function set_privilege($privilege){
        $this->privilege = $privilege;
        return $this;
    }

    public function get_privilege(){
        return $this->privilege;
    }
}