<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-O-Rama Catalog Search</title>
</head>
<body>
    <h1>Book-O-Rama Catalog Search</h1>
    <?php 
        //Crear nombres de variables
        $searchtype = $_POST['searchtype'];
        $searchterm = trim($_POST['searchterm']);

        if(!$searchtype || !$searchterm){
            echo '<p>You have not entered search details. <br>
                Please go back and try again.
            </p>';
            exit;
        }

        // Añadir el tipo de búsqueda a la lista blanca
        switch($searchtype) {
            case 'Title':
            case 'Author':
            case 'ISBN':
                break;
            default:
                echo '<p>That is not a valid search type. <br>
                    Please go back and try again.
                </p>';
                exit;
        }

        //Conectar con la Base de Datos
        $db = new mysqli('localhost', 'root', '123456', 'books');
        if(mysqli_connect_errno()){
            echo '<p>Error: Could not connect to database. <br>
                Please try again later.
            </p>';
            exit;
        }

        //Consultar la Base de Datos
        $query = "SELECT ISBN, Author, Title, Price FROM books WHERE $searchtype = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('s', $searchterm);
        $stmt->execute();

        //Recuperar Resultados de la consulta
        $stmt->store_result();
        $stmt->bind_result($isbn, $author, $title, $price);

        echo "<p>Number of books found: ".$stmt->num_rows."</p>";

        while($stmt->fetch()){
            echo "<p><strong>Title: ".$title."</strong>";
            echo "<br> Author: ".$author;
            echo "<br> ISBN: ".$isbn;
            echo "<br> Price: \$".number_format($price,2)."</p>";
        }

        $stmt->free_result();
        $db->close();
    ?>
</body>
</html>