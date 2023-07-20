<?php
// 0. SESSION開始！！
session_start();
//funsc.phpを読み込む 複数箇所で使う関数をまとめておくと楽
require_once('funcs.php');
loginCheck();

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>
        <a href="index.php">データ登録</a>
    </header>

    <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Tag</th>
                    <th>Story</th>
                    <th>Date</th>
                    <?php if ($_SESSION['kanri_flg'] === 1): ?>
                        <th>Delete</th>
                    <?php endif; ?>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $result): ?>
                <tr>
                    <td><a href="detail.php?id=<?= h($result['id']) ?>"><?= h($result['title']) ?></a></td>
                    <td><?= h($result['tag']) ?></td>
                    <td><?= h($result['story']) ?></td>
                    <td><?= h($result['date']) ?></td>
                    <?php if ($_SESSION['kanri_flg'] === 1): ?>
                        <td><a href="delete.php?id=<?= h($result['id']) ?>"><img src="./img/trash.png" alt="trash"></a></td>
                    <?php endif; ?>
                    <!-- <td><a href="delete.php?id=<?= h($result['id']) ?>"><img src="./img/trash.png" alt="trash"></a></td> -->
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>

</body>
</html>

