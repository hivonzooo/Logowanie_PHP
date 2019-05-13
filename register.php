<?php
    function rejestracja() {
        
        if (!(isset($_POST['email']) && isset($_POST['uzytkownik']) && isset($_POST['haslo']) && isset($_POST['haslo-powtorz'])))
			return FALSE;

        $e = $_POST['email'];
        $u = $_POST['uzytkownik'];
        $h = $_POST['haslo'];
        $hp = $_POST['haslo-powtorz'];

        echo "$e";
        echo "\n";
        echo "$u";
        echo "\n"; 
        echo "$h";
        echo "\n";
        echo "$hp";
        
        if ($h != $hp) {
           echo "Hasła nie są takie same!";
           return FALSE;
        }

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
        header("Location: index.php");
        exit();
    }

?>