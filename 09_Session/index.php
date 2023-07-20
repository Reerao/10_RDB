<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ登録</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>
        <a href="login.php">ログイン</a>
        <a href="logout.php">ログアウト</a>
        <a href="select.php">データ</a>
    </header>
    
    <div>
    <h3>あなたの事業を一緒に考えよう！</h3>    
    </div>

    <form id="chat-form" autocomplete="off">
        <input type="text" id="chat-input" placeholder="Enterで送信" />
        <div id="chat-window">
          <pre id="chat-history"></pre>
          </form>
        </div>
    
    <button id=ref>↓登録エリアに反映させる↓</button><br>

    <form method="post" action="insert.php">
        <div>
                <h3>履歴登録</h3>
                <label>Title<input type="text" name="title"></label><br>

                <label>お気に入り度<select size="1" name="tag">
                    <option>⭐️</option>
                    <option>⭐️⭐️</option>
                    <option>⭐️⭐️⭐️</option>
                </select></label><br>

                <label><textArea name="story" id=storyarea rows="4" cols="40"></textArea></label><br>
                <a href="select.php"><input type="submit" id=save value="保存"></a>
        </div>
    </form>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./js/chat.js"></script>

</body>
</html>