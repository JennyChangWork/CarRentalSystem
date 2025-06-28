<?php
class Model {
    public $connection;
    public $table;
    public $primaryKey = 'id'; 

    public function __construct(Database $db, $table) {
        $this->table = $table;
        $this->connection = $db->getConnection();
    }
    
    public function getPrimaryKey() {
        return $this->primaryKey;
    }

    public function all () {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function find ($id) {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$this->getPrimaryKey()} = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ":$col", $columns);

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $columns) . ") 
                VALUES (" . implode(', ', $placeholders) . ")";
        
        $statement = $this->connection->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        if ($statement->execute()) {
            return $this->connection->lastInsertId();
        }

        return false;
    }

    public function update($id, $data)
    {
        $columns = array_keys($data);
        $setClause = implode(', ', array_map(fn($col) => "$col = :$col", $columns));
    
        $sql = "UPDATE {$this->table} SET {$setClause} WHERE {$this->getPrimaryKey()} = :id";
        $statement = $this->connection->prepare($sql);
    
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->bindValue(':id', $id);
    
        $statement->execute();
        return $statement->rowCount();
    }

    public function remove ($id) {
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE {$this->getPrimaryKey()} = ? ");
            $statement->execute([$id]);
            $result = $statement->rowCount();
            return $result;
        } catch (PDOException $e) {
            return 0;
        }
    }

}


?>