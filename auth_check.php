<?php
    session_start();
    function auth($email, $passwd) {
        if (!$email || !$passwd)
            return false;
        $account = unserialize(file_get_contents('private/passwd'));
        if ($account) {
            foreach ($account as $k => $v) {
                if ($v['email'] === $mail && $v['passwd'] === hash('whirlpool', $passwd))
                    return $v;
            }
        }
        // else {
        //     $_SESSION['flag_log'] = "KO";
        //     echo "<meta http-equiv='refresh' content='0,url=connexion.php'>";
        // }
        // $_SESSION['logged_on_user'] = "";
        return false;
    }
?>
