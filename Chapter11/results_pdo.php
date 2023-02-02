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
        //crear nombres de variables cortos
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

        //Configurar para utilizar PDO
        $user = 'root';
        $pass = '123456';
        $host = 'localhost';
        $db_name = 'books';

        // Configurar DSN
        $dsn = "mysql:host=$host;dbname=$db_name";

        //Conectar a la base de datos
        try {
            $db = new PDO($dsn, $user, $pass);

            //Ejecutar Consulta
            $query = "SELECT ISBN, Author, Title, Price FROM books WHERE $searchtype = :searchterm";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':searchterm', $searchterm);
            $stmt->execute();

            //Obtener el numero de filas devueltas
            echo "<p>Number of books found: ".$stmt->rowCount()."</p>";

            //Mostrart cada filda devuleta
            while($result = $stmt->fetch(PDO::FETCH_OBJ)){
                echo "<p><strong>Title: ".$result->Title."</strong>";
                echo "<br> Author: ".$result->Author;
                echo "<br> ISBN: ".$result->ISBN;
                echo "<br> Price: \$".number_format($result->Price, 2)."</p>";
            }
            $db = NULL;
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
            exit;
        }
    ?>

</body>
</html>