<html>

<head>
        <meta charset="utf-8">
        <title>Opinia o naszej stronie</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css">
        <style>

            .container {
                text-align: center;
                padding: 16px;
                background-color: white;
            }   

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            .login {
                background-color: #4CAF50;
                color: white;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .signin {
                background-color: #f1f1f1;
                text-align: center;
            }
        </style>

        <script>
            function validateForm() {
                var e = document.forms["formularz"]["email"].value;
                if (e == "") {
                    alert("Proszę podać adres email");
                    return false;
                }

                var u = document.forms["formularz"]["uzytkownik"].value;
                if (u == "") {
                    alert("Proszę podać nazwę użytkownika!");
                    return false;
                }

                var p = document.forms["formularz"]["haslo"].value;
                if (p == "") {
                    alert("Proszę podać hasło!");
                    return false;
                }

                var rp = document.forms["formularz"]["haslo-powtorz"].value;
                if (rp == "") {
                    alert("Proszę wypełnić wszystkie formularze!");
                    return false;
                }
                if (p != rp) {
                    alert("Hasła nie są identyczne");
                    return false;
                }
            }
        </script>

</head>

<body>
    <form name="formularz" action="register.php" onsubmit="return validateForm()" method="POST">
        <div class="container">
            <hr>
            <label for="email"><b>Twój adres email: </b></label>
            <input type="text" name="email" placeholder="Podaj swój adres email">

            <label for="uzytkownik"><b>Nazwa użytkownia: </b></label>
            <input type="text" name="uzytkownik" placeholder="Podaj nazwę użytkownika">

            <label for="password"><b>Hasło: </b></label>
            <input type="password" name="haslo" placeholder="Wpisz swoje hasło">

            <label for="password-repeat"><b>Powtórz hasło: </b></label>
            <input type="password" name="haslo-powtorz" placeholder="Powtórz hasło">

            <button type="submit" class="login">Zarejestruj</button>
            <hr>
        </div>

        <div class="container signin">
            <p>Powrót do strony <a href="index.php">logowania</a>.</p>
        </div>
    </form>

    <?php

    ?>
</body>
</html>