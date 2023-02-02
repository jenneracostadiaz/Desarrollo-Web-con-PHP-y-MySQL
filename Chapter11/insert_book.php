<!DOCTYPE html>
<html>
<head>
  <title>Book-O-Rama - New Book Entry</title>
</head>
<body>
    <h1>Book-O-Rama - New Book Entry</h1>
    <?php 
        if(!isset($_POST['ISBN']) || !isset($_POST['Author']) || !isset($_POST['Title']) || !isset($_POST['Price'])){
            echo "<p>Yout have not entered all the required details . <br>
                Prease go back and try again.
            </p>";
            exit;
        }

        $isbn = $_POST['ISBN'];
        $author = $_POST['Author'];
        $title = $_POST['Title'];
        $price = $_POST['Price'];
        $price = doubleval($price);
        
        @$db = new mysqli('localhost', 'root', '123456', 'books');

        if(mysqli_connect_errno()){
            echo '<p>Error: Could not connect to database. <br>
                Please try again later.
            </p>';
            exit;
        }
        $query = "INSERT INTO books VALUES(?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('sssd', $isbn, $author, $title, $price);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            echo "<p>Book inserted into the database</p>";
        } else {
            echo "<p>An error has ocurred. <br>
                The item was not added.</p>";
        }
        $db->close();
    ?>
</body>
</html>