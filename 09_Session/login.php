<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <nav>LOGIN</nav>
    </header>
    <header>
        <a href="index.php">データ登録</a>
    </header>

    <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
    <form action="login_act.php" method="post">
        ID:<input type="text" name="lid" />
        PW:<input type="password" name="lpw" />
        <input type="submit" value="LOGIN" />
    </form>
    
</body>
</html>