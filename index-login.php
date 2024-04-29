<?php
    include("config/connect.php");
    function getData()
    {
        $data = array();
        $data[1] = $_POST['mail'];
        $data[2] = $_POST['password'];
        return $data;
    }

    $userEmail = [];
    $userPassword = [];
    $userData = getData();

    $error;
    $action;

    if (isset($_POST['insert'])) {
        $info = getData();
        $insert = "SELECT [email]
        ,[password] FROM [clients]";
        $result = odbc_exec($connection, $insert);
        while ($row = odbc_fetch_array($result)) {
            $userEmail[] = $row['email'];
            $userPassword[] = $row['password'];
        }

        $num = count($userEmail);
        $i = 0;
        while($i < $num) {
            // echo "$userEmail[$i] <br />";
            if ($userEmail[$i] == $userData[1]) {
                if ($userPassword[$i] == $userData[2]) {
                    // echo "Welcome";
                    $color = '#76FF7A';
                    $error = 'Welcome!';
                    break;
                } else if ($userPassword[$i] != $userData[2]) {
                    $error = 'Не правильно пароль!';
                    break;
                }
            }
            $i++;
            $error = 'Не правильно mail!';
        }

        // foreach($userEmail as $email) {
        //     if ($userData[1] == $email) {
        //         echo "Email: True $email ";
        //         foreach($userPassword as $password) {
        //         if ($userData[2] == $password) {
        //             echo "Password: True $password <br>";
        //             $error = "Добро пожаловать!";
        //             $action = '/index.php';
        //             // die();

        //         } else {
        //             echo "Password: False $password <br>";
        //             $error = "Пароль не правильно!!!";
        //         }
        // }
        //     } else {
        //         $error = "Email не существует";
        //         echo "Email: False $email <br>";
        //     }
        // }
    }
    odbc_close($connection);
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
        <link rel="stylesheet" href="/css/style-login.css" />
    </head>
    <body>
        <header>
            <a href="/index.php" class="link-logo">
                <div class="logo">
                    <img src="/images/logo.png" />
                    <p>Yokohama</p>
                </div>
            </a>
            <a href="/index-signup.php" id="button-signin"
                >Зарегистрироваться</a
            >
        </header>
        <div class="wrapper-login">
            <div class="conteiner-login">
                <form action="" method="post">
                    <img src="images/Logo-login-signup.png" />
                    <h3>Войти</h3>
                    <section>
                        <input
                            type="email"
                            name="mail"
                            id="input-mail"
                            placeholder="Email"
                        />
                        <input
                            type="password"
                            name="password"
                            id="input-password"
                            placeholder="Пароль"
                        />
                    </section>
                    <p style="color: <?=$color?>" id="message-errors"><?=$error?></p>
                    <button type="submit" name="insert">Войти</button>
                </form>
            </div>
        </div>
    </body>
</html>