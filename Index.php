<?php
    session_start();
    include('db.php');
    if($_POST){
        $username = $_POST('username');
        $password = $_POST('password');
        
        //echo $username;
        //echo $password;
        
        $q = $DBH->prepare("SELECT * from author WHERE username=:name AND password =:password LIMIT 1");
        $q->binValue(':name', $username);
        $q->binVAlue(':password', $password);
        $q->execute();
        $check = $q->fectch(PDO::FETCH_ASSOC);
        if(!empty($check)){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
        } else {
            $_SESSION['loggedin'] = false;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> The Daily Rant</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content="width=device-width", inicial scale = "1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap:min:css">
        
        <script> src="hhtps://ajax.googleapis.com/ajax/libs.jquery/1.12.4/jquery.min.js"> </script>
        <script> src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/boostrap.min.js"> </script>
        
    </head>
    <body>
        
        <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
            include('header.php');
        } else {
            include ('headerloggedin.php');
        }

        ?>

        <div class="jumbotron text-center">
            <h1> The Daily Rant</h1>
            <p> Somewhere to rant about things.</p>
        </div>

        <?php
            if(!isset $_SESSION['loggedin'] || $_SESSION['loggedin'] == false){
                echo '<form action ="index.php" method="POST">';
                echo    'User Name:<input type="text" name="username"/><br>';
                echo 'Password: <input type="password" name="password"/><br>';
                echo' <input type="submit" value="Login"/>';
                echo '</form>';
            } else {
                $q = $DBH->prepare("SELECT * FROM topics");
                $q->execute();
                $check = $q->fetchAll(PDO::FETCH_ASSOC);
                foreach($check as $row){
                    $id = $row['id'];
                    $topic = $row['topic'];
                    $link = "<a href = 'topic.php?id=$id'>$topic</a><br>"; // passing the data through the pages, via URL
                    $link2 = "<a href = 'topics.php?id=$id'><li class='list-group-item'>$t</li>";
                        echo $link2;
                }
                echo '<ul/>';
            }
        ?>

    </body>

</html>