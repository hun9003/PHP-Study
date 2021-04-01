<?php

// DB 연동
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=products_crud', 'root', 'rateye9003');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';

// 검색 폼을 통해 접근했는지 안했는지 판별
if ($search) {
  // 검색 쿼리
  $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title', "%$search%");
} else {
  // 일반 리스트 쿼리
  $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

// 쿼리문 실행
$statement->execute();
// 쿼리문의 결과 배열로 담기
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($products);
// echo '</pre>';
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
    <h1>products CRUD</h1>

    <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
    </p>

    <form>
      <div class="input-group mb-3">
        <input type="search" class="form-control" placeholder="Search for Products" name="search" value="<?=$search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div> 
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $i => $product) { ?>
            <tr>
                <th scope="row"><?=$i+1 ?></th>
                <td>
                  <img class="thumb-image" src="<?= $product['image']?>" alt="image">
                </td>
                <td><?=$product['title'] ?></td>
                <td><?=$product['price'] ?></td>
                <td><?=$product['create_date'] ?></td>
                <td>
                    <a href="update.php?id=<?=$product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="delete.php" method="post" style="display: inline;">
                      <input type="hidden" name="id" value="<?=$product['id']?>">
                      <button type="submit" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>