<?php
$todos = file_get_contents("todos.json");
$todos = json_decode($todos,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>TodoPHP</title>
</head>
<body>
    <?php 
    $page = isset($_GET["page"]) ? $_GET["page"] : "home";
    if(!file_exists("pages/" . $page . '.php')){
        $page = "404";
    }else{
        require_once "partials/header.php";
    }
    include "pages/" . $page . ".php";
    ?>
    <script src="app.js"></script>
</body>
</html>