<?php

/** @var $pdo /PDO */
// DB 연동
require_once "../../database.php";
require_once "../../function.php";

// var_dump($_POST);
// 에러 메세지 담을 배열 추가
$errors = [];

// 각 요소들 초기화
$title = '';
$price = '';
$description = '';
$product = [
  'image' => ''
];

  // echo '<pre>';
  // var_dump($_FILES);
  // echo '</pre>';

// 폼을 통해 포스트로 넘어왔을 시 생성으로 판별
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  require_once "../../validate_product.php";

  // 에러가 없으면 정상적으로 생성 시작
  if (empty($errors)) {
    
    // 생성 쿼리
    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                  VALUES (:title, :image, :description, :price, :date)
                ");
    // 보안을 위해 :title 과 같이 요소 입력하고 bindValue로 할당
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', date('Y-m-d H:i:s'));
    // 쿼리 실행
    $statement->execute();
    // 끝나면 메인페이지 이동
    header('Location: index.php');
  }

}

?>

<?php include_once "../../views/partials/herder.php" ?>

<p>
    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>
</p>
    <h1>Create new Product</h1>

    <?php include_once "../../views/products/form.php"; ?>

</body>

</html>