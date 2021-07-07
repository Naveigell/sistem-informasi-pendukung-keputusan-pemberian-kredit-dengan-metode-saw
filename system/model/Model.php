<?php
namespace System\Model;

class Model {
    protected $table = '';
    protected $primaryKey = '';

    /**
     * @var \PDO
     */
    protected $connection;

    public function __construct()
    {
        $this->connection = (new Connection())->getConnection();
    }

    public function query($sql, $bindings = [])
    {
        $query = $this->connection->prepare($sql);

        for ($i = 0; $i < count($bindings); $i++) {
            $query->bindParam($i + 1, $bindings[$i]);
        }

        $query->execute();

        return $query->fetchAll();
    }

    public function transaction(callable $callback)
    {
        $this->connection->beginTransaction();
        try {
            $callback();
            $this->connection->commit();
        } catch (\Exception $exception) {
            $this->connection->rollBack();
        }
    }

    public function insertMultiple($sql, $bindings = [])
    {
        $query = $this->connection->prepare($sql);

        for ($i = 0; $i < count($bindings); $i++) {
            $query->bindParam($i + 1, $bindings[$i]);
        }

        $query->execute();

        return $query->rowCount();
    }

    public function deleteMultiple($key, $value = [])
    {
        $marks = array_map(function () {
            return "?";
        }, $value);
        $imploded = implode(',', $marks);

        $query = $this->connection->prepare("DELETE FROM $this->table WHERE $key IN($imploded)");

        for ($i = 0; $i < count($value); $i++) {
            $query->bindParam($i + 1, $value[$i]);
        }

        $query->execute();
        return $query->rowCount();
    }

    public function delete($where, $table = null)
    {
        $whereKeys = array_keys($where);
        $whereValues = array_values($where);

        $table = is_null($table) ? $this->table : $table;

        $query = $this->connection->prepare("DELETE FROM $table WHERE ".implode('=? AND WHERE ', $whereKeys)."=?");

        for ($i = 0; $i < count($whereValues); $i++) {
            $query->bindParam($i + 1, $whereValues[$i]);
        }

        $query->execute();
        return $query->rowCount();
    }

    public function update($data, $where)
    {
        $dataKeys = array_keys($data);
        $dataValues = array_values($data);

        $whereKeys = array_keys($where);
        $whereValues = array_values($where);

        $combined = array_merge($dataValues, $whereValues);

        $query = $this->connection->prepare("UPDATE " . $this->table . " SET " .implode('=?,', $dataKeys)."=?"." WHERE ".implode('=? AND WHERE ', $whereKeys)."=?");

        for ($i = 0; $i < count($combined); $i++) {
            $query->bindParam($i + 1, $combined[$i]);
        }

        $query->execute();
        return $query->rowCount();
    }

    public function updateMultiple($sql, $bindings = [])
    {
        $query = $this->connection->prepare($sql, $bindings);
        $query->execute();
        return $query->rowCount();
    }

    public function insert($data = [], $getId = false)
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $implodedKeys = implode(',', $keys);

        $questionMarks = implode(',', array_map(function () {
            return "?";
        }, $keys));

        $query = $this->connection->prepare("INSERT INTO $this->table ($implodedKeys) VALUES($questionMarks)");

        for ($i = 0; $i < count($values); $i++) {
            $query->bindParam($i + 1, $values[$i]);
        }

        try {
            $query->execute();
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

        if ($getId) {
            return $this->connection->lastInsertId();
        }
        return $query->rowCount();
    }

    public function all()
    {
        $query = $this->connection->prepare("SELECT * FROM $this->table");
        $query->execute();

        return $query->fetchAll();
    }
}