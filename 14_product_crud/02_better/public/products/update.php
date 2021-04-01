<?php

/** @var $pdo /PDO */
require_once "../../database.php";
require_once "../../function.php";

// var_dump($_POST);
// 파라미터 없을시 null 저장
$id = $_GET['id'] ?? null;

// null 일시 메인페이지로 돌아감
if (!$id) {
    header('Location: index.php');
    exit;
}

// id 를 통해 해당 데이터 검색
$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
// 검색한 데이터 담기
$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];
// 수정할 이전 데이터들을 초기화
$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

// 폼을 통해 포스트로 넘어왔을 시 수정으로 판별
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  require_once "../../validate_product.php";

  if (empty($errors)) {
    // 수정쿼리
    $statement = $pdo->prepare("UPDATE products SET title = :title, 
                        image = :image, 
                        description = :description,
                        price = :price
                        WHERE id = :id;
                ");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location: index.php');
  }
}


?>
<?php include_once "../../views/partials/herder.php" ?>

<p>
    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>
</p>

    <h1>Update Product <b><?=$title ?></b></h1>

<?php include_once "../../views/products/form.php"; ?>

</body>

</html>