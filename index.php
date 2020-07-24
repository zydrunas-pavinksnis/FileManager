<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File viewer</title>
</head>
<body>
    <div>
        <?php

            session_start();

            $msg = '';
            if (isset($_POST['login']) 
                && !empty($_POST['username']) 
                && !empty($_POST['password'])
            ) {	
               if ($_POST['username'] == 'Vartotojas' && 
                  $_POST['password'] == '5432'
                ) {
                  $_SESSION['logged_in'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'Vartotojas';
                  
                  header("Location: logic.php");
               } else {
                  $msg = 'Wrong username or password';
               }
            }
        ?>
    </div>
    <div>
        <form action = "" method = "post">
            <input type = "text" name = "username" placeholder = "Vartotojas" required autofocus></br>
            <input type = "password" name = "password" placeholder = "5432" required>
            <input type = "submit" name = "login" value = "login">
        </form>
      </div> 




    

    



    


    
</body>
</html>