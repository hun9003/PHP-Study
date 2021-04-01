<?php
// DB 연동
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=products_crud', 'root', 'rateye9003');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 파라미터가 존재하지 않으면 null을 저장
$id = $_POST['id'] ?? null;

// null이면 메인페이지로 돌아감
if (!$id) {
    header('Location: index.php');
    exit;
}

// 삭제 쿼리
$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

// 메인페이지로 이동
header('Location: index.php');

