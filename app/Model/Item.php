<?php
namespace App\Model;
use App\Core\DBConnection;
use PDO;

class Item {
    protected $pdo;

    public function __construct() {
        $this->pdo = DBConnection::start(
            [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => '8889',
                'dbname' => 'warehouse',
                'username' => 'root',
                'password' => 'root',
                'options' => [
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
                ],
            ]
        );
    }

    public function insert($data) {
        $statement = $this->pdo->prepare("INSERT INTO items ( sku, title, quantity, company, location, created_at, updated_at )
             VALUES ( :sku, :title, :quantity, :company, :location, now(), now())");

        return $statement->execute($data);
    }

    public function update($data, $type) {
        if($type == 'minus') {
            $statement = $this->pdo->prepare("UPDATE items SET quantity = quantity - :number, updated_at=now() WHERE sku=:sku");
        }
        if($type == 'plus') {
            $statement = $this->pdo->prepare("UPDATE items SET quantity = quantity + :number, updated_at=now() WHERE sku=:sku");
        }
        if($type == 'equal') {
            $statement = $this->pdo->prepare("UPDATE items SET quantity =:number, updated_at=now() WHERE sku=:sku");
        }

        return $statement->execute($data);
    }

    public function search($data, $type) {
        if($type == 'sku') {
            $statement = $this->pdo->prepare("SELECT * FROM items WHERE sku=:sku");
        }
        if($type == 'title') {
            $statement = $this->pdo->prepare("SELECT * FROM items WHERE title=:title");
        }
        if($type == 'company') {
            $statement = $this->pdo->prepare("SELECT * FROM items WHERE company=:company");
        }
        $statement->execute($data);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

}
