<?php

/** @var $pdo /PDO */
// DB 연동
require_once "../../database.php";

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

<?php include_once "../../views/partials/herder.php" ?>
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
                  <img class="thumb-image" src="../<?= $product['image']?>" alt="image">
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