<?php

$pdo = new PDO('mysql:host=localhost;port=3307;dbname=products_crud', 'root', 'rateye9003');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  if (!$title) {
    $errors[] = 'Product title is required';
  }

  if (!$price) {
    $errors[] = 'Product price is required';
  }

  if (!is_dir('images')) {
    mkdir('images');
  }

  if (empty($errors)) {
    
    $image = $_FILES['image'] ?? null;
    
    $imagePath = $product['image'];

    
    if ($image && $image['tmp_name']) {
        // 이미지가 새로 저장되었을시 이전 이미지 삭제
        if ($product['image']) {
            unlink($product['image']); // 이전 이미지 삭제
        }

        $imagePath = 'images/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagePath));

      // echo '<pre>';
      // var_dump($imagePath);
      // echo '</pre>';

      move_uploaded_file($image['tmp_name'], $imagePath);
    }
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

function randomString($n)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for ($i = 0; $i < $n; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $str .= $characters[$index];
  }

  return $str;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>products CRUD</title>
</head>

<body>

<p>
    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>
</p>

    <h1>Update Product <b><?=$title ?></b></h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
  <?php foreach ($errors as $error): ?>
  <div><?= $error ?></div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($product['image']): ?>
            <img class="update-image" src="<?=$product['image']?>" alt="image">
        <?php endif; ?>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label>Product Title</label>
            <input type="text" class="form-control" name="title" value="<?=$title ?>">
        </div>
        <div class="mb-3">
            <label>Product Description</label>
            <textarea class="form-control" name="description"><?=$description ?></textarea>
        </div>
        <div class="mb-3">
            <label>Product Price</label>
            <input type="number" step=".01" class="form-control" name="price" value="<?=$price ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>