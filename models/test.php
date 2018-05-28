<?php
require_once('models/sql_Manager.php');
class test extends sql{

    private static function modelLoader($models){
        require_once('models/' . $models . '.php');
        $model = $models.'Model';
        return $model;
    }    

    public static function all($models) {
        $load = self::modelLoader($models);
        $all = new sql();
        $all->selectAll($load::table);
        $list = $all->getAllSql();
        $object = [];
        foreach($list as $number => $array){
            $result = new $load();
            foreach($array as $key => $value){
                $setter = 'set_' . $key;
                $result->$setter($value);
            }
            $object[] = $result;
        }
        return $object;
    }

    public static function allById($models, $where, $selection = null){
        $load = self::modelLoader($models);
        $all = new sql();
        if(!$selection){
            $all->selectAll($load::table);
        } else {
            $all->selectFrom($selection, $load::table);
        }
        $all->where($where);
        $list = $all->getAllSql();
        $object = [];
        foreach($list as $number => $array){
            $result = new $load();
            foreach($array as $key => $value){
                $setter = 'set_' . $key;
                $result->$setter($value);
            }
            $object[] = $result;
        }
        return $object;
    }

    public static function find($models, $where, $selection = null){
        $load = self::modelLoader($models);
        $show = new sql();
        if(!$selection){
            $show->selectAll($load::table);
        } else {
            $show->selectFrom($selection, $load::table);
        }
        $show->where($where);
        $list = $show->getSql();
        $object = [];
        $result = new $load();
        foreach($list as $key => $value){
            $setter = 'set_' . $key;
            $result->$setter($value);
        }
        $object[] = $result;
        return $object;
    }

    public static function add($models, $object){
        $load = self::modelLoader($models);
        $post = new sql();
        $table = $post->insert($load::table, $object);
        $post->postSql($table);
    }

    public static function remove($models, $where){
        $load = self::modelLoader($models);
        $del = new sql();
        $del->delete($load::table);
        $del->where($where);
        $del->postSql($where);
    }

    public static function updateDb($models, $object, $where){
        $load = self::modelLoader($models);
        $update = new sql();
        $array = $update->update($load::table, $object);
        $update->where($where);
        $update->postSql($array, $where);
    }
}