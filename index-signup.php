<?php
include("config/connect.php");
function getData()
{
  $data = array();
  $data[1] = $_POST['first-name'];
  $data[2] = $_POST['last-name'];
  $data[3] = $_POST['mail'];
  $data[4] = $_POST['number'];
  $data[5] = $_POST['password'];
  $data[6] = $_POST['password-right'];
  return $data;
}

$PASS = getData();
$error;

if (isset($_POST['insert']) && $PASS[5] == $PASS[6]) {
  $info = getData();
  $insert = "INSERT INTO [clients] ([firstN]
  ,[lastN]
  ,[email]
  ,[number]
  ,[password]) VALUES ('$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]')";
  $result = odbc_exec($connection, $insert);
} else if (isset($_POST['insert']) && $PASS[5] != $PASS[6]) {
    $error = 'Пароль не совпадает!!!';

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Yokohama</title>
        <link
            rel="shortcut icon"
            href="/images/yokohama-favicon.svg"
            type="image/x-icon"
        />
        <link rel="stylesheet" href="/css/style-signup.css" />
        <script src="/js/main-signup.js"></script>
    </head>
    <body>
        <header>
            <a href="/index.php" class="link-logo">
                <div class="logo">
                    <img src="/images/logo.png" />
                    <p>Yokohama</p>
                </div>
            </a>
            <a href="/index-login.php" id="button-login">Войти</a>
        </header>
        <div class="wrapper-signin">
            <div class="conteiner-signin">
                <form action="" method="post">
                    <img src="images/Logo-login-signup.png" />
                    <h3>Регистрация</h3>
                    <section id="last-first-name">
                        <input
                            type="text"
                            name="first-name"
                            id="input-first-name"
                            placeholder="Имя"
                        />
                        <input
                            type="text"
                            name="last-name"
                            id="input-last-name"
                            placeholder="Фамилия"
                        />
                    </section>
                    <section id="mail-number">
                        <input
                            type="email"
                            name="mail"
                            id="input-mail"
                            placeholder="Email"
                        />
                        <input
                            type="number"
                            name="number"
                            id="input-number"
                            placeholder="Номер тел."
                        />
                    </section>
                    <section id="password">
                        <input
                            type="password"
                            name="password"
                            id="input-password"
                            placeholder="Пароль"
                        />
                        <input
                            type="password"
                            name="password-right"
                            id="input-password-right"
                            placeholder="Потвердите пароль"
                        />
                    </section>
                    <p id="message-errors"><?=$error?></p>
                    <button type="submit" name="insert">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </body>
</html>
