<?php 
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        print('Logged out!');
        header("Location: index.php");
    }
    else {

        echo '<form action="index.php" method="GET">
                 
            <input type="submit" value="logout">
        </form>';

        echo ("<br>");

        
        


}

?>