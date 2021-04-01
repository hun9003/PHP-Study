<?php

// DB 연동
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=products_crud', 'root', 'rateye9003');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// var_dump($_POST);
// 에러 메세지 담을 배열 추가
$errors = [];

// 각 요소들 초기화
$title = '';
$price = '';
$description = '';

  // echo '<pre>';
  // var_dump($_FILES);
  // echo '</pre>';

// 폼을 통해 포스트로 넘어왔을 시 생성으로 판별
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 각 파라미터 받아오기
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $date = date('Y-m-d H:i:s');

  // 유효성 검사
  if (!$title) {
    $errors[] = 'Product title is required';
  }

  if (!$price) {
    $errors[] = 'Product price is required';
  }

  // 이미지 파일을 저장할 폴더가 없을시 생성
  if (!is_dir('images')) {
    mkdir('images');
  }

  // 에러가 없으면 정상적으로 생성 시작
  if (empty($errors)) {
    // 이미지 정보가 없을시 null 저장
    $image = $_FILES['image'] ?? null;
    $imagePath = '';
    // 이미지가 등록되어 있으면
    if ($image && $image['tmp_name']) {
      // 미리 작성해둔 랜덤 함수를 이용해 폴더안에 파일 저장
      $imagePath = 'images/'.randomString(8).'/'.$image['name'];
      mkdir(dirname($imagePath));

      // echo '<pre>';
      // var_dump($imagePath);
      // echo '</pre>';
      // 업로드 파일 해당 경로에 저장
      move_uploaded_file($image['tmp_name'], $imagePath);
    }

    // 생성 쿼리
    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                  VALUES (:title, :image, :description, :price, :date)
                ");
    // 보안을 위해 :title 과 같이 요소 입력하고 bindValue로 할당
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $imagePath);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', $date);
    // 쿼리 실행
    $statement->execute();
    // 끝나면 메인페이지 이동
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

<?php include_once "views/partials/herder.php" ?>
    <h1>Create new Product</h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
  <?php foreach ($errors as $error): ?>
  <div><?= $error ?></div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
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