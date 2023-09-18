<?php

class Database
{
    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct()
    {
        try
        {
        $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';'.
                                'dbname='.Config::get('mysql/db_name'),
                                Config::get('mysql/username'),
                                Config::get('mysql/password')
            );
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    } // This is the constructor method. It is private so that it can't be instantiated from outside the class. It creates a new PDO object and stores it in the $_pdo property.

    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new Database();
        }

        return self::$_instance;
    } // This is the getInstance method. It checks if the $_instance property is set. If it isn't, it creates a new Database object and stores it in the $_instance property. It then returns the $_instance property.

    public function query($sql, $params = array())
    {
        $this->_error = false;

        if ($this->_query = $this->_pdo->prepare($sql))
        {
            $x = 1;

            if (count($params))
            {
                foreach ($params as $param)
                {
                    $this->_query->bindvalue($x, $param);
                    $x++;
                }
            }

            if ($this->_query->execute())
            {
                $this->_results     = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count       = $this->_query->rowCount();
            }
            else
            {
                $this->_error = true;
            }
        }

        return $this;
    } // This is the query method. It takes a SQL statement and an array of parameters as arguments. It prepares the SQL statement and stores it in the $_query property. 
    //It then binds the parameters to the SQL statement and executes it. If the SQL statement executes successfully, it stores the results in the $_results property and stores the number of results in the $_count property. 
    //If the SQL statement fails to execute, it sets the $_error property to true. It then returns the Database object.

    public function action($action, $table, $where = array())
    {
        if (count($where) === 3)
        {
            $operators  = array('=', '>', '<', '>=', '<=');

            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];

            if (in_array($operator, $operators))
            {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if (!$this->query($sql, array($value))->error())
                {
                    return $this;
                }
            }
        }

        return false;
    } // This is the action method. It takes an action, a table, and an array of parameters as arguments. It checks if the number of parameters is equal to 3.

    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    } 

    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where);
    } 

    public function insert($table, $fields = array())
    {
        if (count($fields))
        {
            $keys   = array_keys($fields);
            $values = '';
            $x      = 1;

            foreach ($fields as $field)
            {
                $values .= '?';

                if ($x < count($fields))
                {
                    $values .= ', ';
                }

                $x++;
            }

            $sql = "INSERT INTO {$table} (`".implode('`, `', $keys)."`) VALUES ({$values})";

            if (!$this->query($sql, $fields)->error())
            {
                return true;
            }
        }

        return false;
    } // This is the insert method. It takes a table and an array of fields as arguments. It checks if the number of fields is greater than 0. 

    public function update($table, $id, $fields)
    {
        $set    = '';
        $x      = 1;

        foreach ($fields as $name => $value)
        {
            $set .= "{$name} = ?";

            if ($x < count($fields))
            {
                $set .= ', ';
            }

            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE uid = {$id}";

        if (!$this->query($sql, $fields)->error())
        {
            return true;
        }

        return false;
    } // This is the update method. It takes a table, an id, and an array of fields as arguments. It creates a string of fields and values to update and stores it in the $set variable.

    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        return $this->results()[0];
    }

    public function error()
    {
        return $this->_error;
    }

    public function count()
    {
        return $this->_count;
    }
}
