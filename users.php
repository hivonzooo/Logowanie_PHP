<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Uzytkownicy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
        }

        form{
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
            }
        </script>
</head>

<body>
    
    <form name="formularz" action="users.php" onsubmit="return validateForm()" method="POST">
        <div class="container">
            <hr>
            <label for="email"><b>Email: </b></label>
            <input type="text" name="email" placeholder="Podaj swój adres email">

            <label for="uzytkownik"><b>Nazwa użytkownia: </b></label>
            <input type="text" name="uzytkownik" placeholder="Podaj nazwę użytkownika">

            <label for="password"><b>Hasło: </b></label>
            <input type="password" name="haslo" placeholder="Wpisz swoje hasło">

            <button type="submit" class="login">Utwórz</button>
            <hr>
        </div>
    </form>

    <?php 
        $db = mysqli_connect();

        if (!$db) {
            echo "Blad\n";
            return FALSE;
        }

        if (!mysqli_select_db($db, 'logowanie')) {
            echo mysqli_error($db) . "\n";
            mysqli_close($db);
            return FALSE;
        }

        $SQL = "SELECT id, email, uzytkownik, haslo FROM logowanie";
        $WYNIK = $db -> query($SQL);

        if ($WYNIK -> num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Email</th><th>Użytkownik</th><th>Hasło</th><th>Edytuj</th></tr>";
            while ($row = $WYNIK -> fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["email"]. "</td><td> " . $row["uzytkownik"]. "</td><td>" . $row["haslo"]. "</td><td>" . "</td></tr> ";
            }
            echo "</table>";
        }

        else {
            echo "Jeszcze nic tutaj nie ma";
        }

        function rejestracja() {
        
            if (!(isset($_POST['email']) && isset($_POST['uzytkownik']) && isset($_POST['haslo'])))
                return FALSE;
    
            $e = $_POST['email'];
            $u = $_POST['uzytkownik'];
            $h = $_POST['haslo'];
    
            echo "$e";
            echo "\n";
            echo "$u";
            echo "\n"; 
            echo "$h";
            
    
            $db = mysqli_connect();
    
            if (!$db) {
                echo "Blad\n";
                return FALSE;
            }
    
            if (!mysqli_select_db($db, 'logowanie')) {
                echo mysqli_error($db) . "\n";
                mysqli_close($db);
                return FALSE;
            }
    
            $sql = "INSERT INTO logowanie (email, uzytkownik, haslo) VALUES ('$e', '$u', '$h')";
    
            $w = mysqli_query($db, $sql);
    
        }    
        
        if (rejestracja() !== FALSE) {
            header("Location: users.php");
            exit();
        }
    ?>
</body>

</html>