<?php

class Post{

    public static function all($selection = null, $table, $join = null, $on = null, $debug = null) {
        $all = new sql();
        if($selection){
            $all->selectFrom($selection, $table);
        } else {
            $all->selectAll($table);
        }
        
        if($on && $join){
            $all->join($join, $on);
            $list = $all->getAllSql();
        } else {
            $list = $all->getAllSql();
        }
        if ($debug){
            $list = $all->debug();
        }
        return $list;
    }

    public static function allById($id, $selection = null, $table, $join = null, $on = null, $order = null, $desc = null){
        $all = new sql();

        if(!$selection){
            $all->selectAll($table);
        } else {
            $all->selectFrom($selection, $table);
        }
        
        if($on && $join){
            $all->join($join, $on);
            $all->where($id);
        } else {
            $all->where($id);
        }
        if($order){
            if($desc == 'desc'){
                $all->orderdesc($order);
            } elseif ($desc == 'asc'){
                $all->orderasc($order);
            }
            
        }

        $list = $all->getAllSql();

        return $list;
    }

    public static function find($id,$selection = null, $table, $join = null, $on = null, $debug = null){
        $show = new sql();
        if(!$selection){
            $show->selectAll($table);
        } else {
            $show->selectFrom($selection, $table);
        }

        if($on && $join){
            $show->join($join, $on);
            $show->where($id);
            if($debug){
                $list = $show->debug();
            } else {
                $list = $show->getSql();
            }
        } else {
            $show->where($id);
            if($debug){
                $list = $show->debug();
            } else {
                $list = $show->getSql();
            }   
        }
        return $list;
    }

    public static function add($table, $value, $debug = null){
        $post = new sql();
        $post->insert($table, $value);
        if($debug){
            $status = $post->debug();
        } else {
            $status = $post->postSql();
        }
        return $status;
    }

    public static function delete($table, $id){
        $del = new sql();
        $del->delete($table);
        $del->where($id);
        $del->postSql();
    }

    public static function update($table, $value, $where){
        $update = new sql();
        $update->update($table, $value);
        $update->where($where);
        $update->postSql();
    }

}