<?php

    session_start();
    $Token = 'abc123';

    if (isset($_POST['berikutnya'])) {
        $token = $_POST['token'];
        if ($token === $Token) {
            $_SESSION['konfir'] = true;
            header('location: ./views/daftarKK.php');
            exit;
        } else {
            echo "<script>
            alert('Token Salah!');
            window.location = './views/login.php';
            </script>";
        }
    }