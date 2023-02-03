<!DOCTYPE html>
<html>
<head>
    <title>Secret Page</title>
</head>
<body>
    <?php 
        if((!isset($_POST['name']) || !isset($_POST['password']))){
            // el visitante debe introducir un nombre y una contrasenia
    ?>
        <h1>Please Log In</h1>
        <p>This page is secret.</p>
        <form action="secret.php" method="post">
            <p><label for="name">Username:</label>
            <input type="text" name="name" id="name" size="15"></p>
            <p><label for="password">Password:</label>
            <input type="password" name="password" id="password" size="15"></p>
            <button type="submit" name="submit">Log In</button>
        </form>
    <?php
        } else if (($_POST['name'] == 'user') && ($_POST['password'] == 'pass')) {
            echo '<h1>Here it is!</h1> <p>I bet you are glad you can see this secre page.</p>';
        } else {
            echo '<h1>Go Away!</h1> <p>You are not authorized to use this resource.</p>';
        }
    ?>
</body>
</html>