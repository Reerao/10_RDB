<?php

session_start();
//funsc.phpを読み込む 複数箇所で使う関数をまとめておくと楽
require_once('funcs.php');
loginCheck();

$id = $_GET['id'];

// DB接続します
//*** function化する！  *****************
try {
    $db_name = 'gs_db'; //データベース名
    $db_id   = 'root'; //アカウント名
    $db_pw   = ''; //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//データ登録SQL作成 WHEREでidを指定
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute(); //実行

//３．データ表示
$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ編集</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>
        <a href="select.php">データ</a>
    </header>
    
    <div>
    <h3>しりとり作成</h3>    
    </div>

    <form id="chat-form" autocomplete="off">
        <input type="text" id="chat-input" placeholder="Enterで送信" />
        <div id="chat-window">
          <pre id="chat-history"></pre>
          </form>
        </div>

    <button id=ref>↓登録エリアに反映させる↓</button><br>
    
    <form method="post" action="update.php">
        <div>
                <h3>しりとり編集</h3>
                <label>Title<input type="text" name="title" value="<?= $result['title'] ?>"></label><br>

                <label>お気に入り度<select size="1" name="tag" value="<?= $result['tag'] ?>">
                    <option <?php if ($result['tag'] == '⭐️') echo 'selected' ?>>⭐️</option>
                    <option <?php if ($result['tag'] == '⭐️⭐️') echo 'selected' ?>>⭐️⭐️</option>
                    <option <?php if ($result['tag'] == '⭐️⭐️⭐️') echo 'selected' ?>>⭐️⭐️⭐️</option>
                </select></label><br>

                <label><textArea name="story" id=storyarea rows="4" cols="40"><?= $result['story'] ?></textArea></label><br>
                <input type="hidden" name="id" value="<?= $result['id'] ?>" >
                <input type="submit" value="更新">
        </div>
    </form>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/chat.js"></script>

</body>
</html>