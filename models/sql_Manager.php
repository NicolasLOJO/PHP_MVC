<?php

class sql{

    private static $finalQuery;

    public function selectAll($table){
        self::$finalQuery = 'SELECT * FROM ' . $table;
    }

    public function selectFrom($selection, $table){
        self::$finalQuery = 'SELECT ' . $selection . ' FROM ' . $table;
    }

    public function where($array){
        $first = current(array_keys($array));
        self::$finalQuery .= ' WHERE ' . current(array_keys($array)) . ' = :' . current(array_keys($array));
        if(sizeof($array) > 1){
            foreach($array as $key => $value){
                if($key != $first){
                    self::$finalQuery .= ' AND ' . $key . ' = :' . $key;
                }
            }
        }
    }

    public function join($join, $on){
        self::$finalQuery .= ' INNER JOIN ' . $join . ' ON ' .$on;
    }

    public function insert($table, object $object){
        $attribut = '';
        $value = '';
        $prepared = [];
        foreach($object as $key => $toAdd){
            if($object->$key != null){
                $prepared[$key] = $toAdd;
            }
        }
        $value = implode(', :',array_keys($prepared));
        $attribut = implode(', ', array_keys($prepared));
        self::$finalQuery = 'INSERT INTO ' . $table . '(' . $attribut . ') VALUES (:' . $value . ')';
        return $prepared;
    }

    public function delete($table){
        self::$finalQuery = 'DELETE FROM ' . $table;
    }

    public function update($table, object $object){
        $prepared = [];
        self::$finalQuery = 'UPDATE ' . $table . ' SET';
        foreach($object as $key => $toAdd){
            if($object->$key != null){
                if($toAdd == 'now' && end($object)){
                    $date = $key;
                    self::$finalQuery .= ' ' . $key . ' = NOW()';
                } elseif($toAdd == 'now' && !end($object)) {
                    $date = $key;
                    self::$finalQuery .= ' ' . $key . ' = NOW(),';
                } elseif(end($object)) {
                    self::$finalQuery .= ' ' . $key . ' = ' . ':' . $key . ', ';
                } else {
                    self::$finalQuery .= ' ' . $key . ' = ' . ':' . $key . ' ';
                }
                    $prepared[$key] = $toAdd;
            }
        }
        unset($prepared[$date]);
        return $prepared;
    }

    public function orderdesc($order){
        self::$finalQuery .= ' ORDER BY ' . $order . ' DESC';
    }

    public function orderasc($order){
        self::$finalQuery .= ' ORDER BY ' . $order . ' ASC';
    }

    public function getAllSql(){
        $db = database::connect();
        $rep = $db->query(self::$finalQuery);
        $list = $rep->fetchall(PDO::FETCH_ASSOC);
        return $list;
    }

    public function getSql(){
        $db = database::connect();
        $rep = $db->query(self::$finalQuery);
        $posts = $rep->fetch(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function postSql($array, $where = null){
        $db = database::connect();
        var_dump(self::$finalQuery);
        $rep = $db->prepare(self::$finalQuery);
        if($where){
            $array = array_merge($array, $where);
        }
        var_dump($array);
        $rep->execute($array);
        $status = 'added';
    }

    public function debug(){
        var_dump(self::$finalQuery);
    }

}