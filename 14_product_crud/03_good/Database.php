<?php

namespace app;

use app\models\product;
use PDO;

class Database
{
    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;port=3307;dbname=products_crud', 'root', 'rateye9003');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getProducts($search = '')
    {

        // 검색 폼을 통해 접근했는지 안했는지 판별
        if ($search) {
        // 검색 쿼리
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
        $statement->bindValue(':title', "%$search%");
        } else {
        // 일반 리스트 쿼리
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
        }
        // 쿼리문 실행
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getProductById($id)
    {
        // id 를 통해 해당 데이터 검색
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        // 검색한 데이터 담기
        return $statement->fetch(PDO::FETCH_ASSOC);

    }

    public function createProduct(Product $product)
    {
            // 생성 쿼리
        $statement = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
            VALUES (:title, :image, :description, :price, :date)
        ");
        // 보안을 위해 :title 과 같이 요소 입력하고 bindValue로 할당
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));
        // 쿼리 실행
        $statement->execute();
    }

    public function updateProduct(product $product)
    {
        $statement = $this->pdo->prepare("UPDATE products SET title = :title, 
                        image = :image, 
                        description = :description,
                        price = :price
                        WHERE id = :id;
                ");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);
        $statement->execute();

    }

    public function deleteProduct($id)
    {
        // 삭제 쿼리
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }



}