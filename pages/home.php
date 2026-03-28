<?php 
if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["delete_button"])){
    $deleted_id = $_POST["deleted_id"];
    $todos = array_filter($todos, function ($todo) use ($deleted_id){
        return $todo["id"] !== $deleted_id;
    } );
    file_put_contents("todos.json",json_encode($todos,JSON_PRETTY_PRINT));
};
?>

<div class="container w-50 rounded border df">
    <ul class="d-flex gap-3 flex-column align-items-center justify-content-center">
        <?php foreach($todos as $todo): ?>
            <li class="border rounded p-3 w-100 text-center"><?= $todo["todo"] ?> <form method="POST" action="">
                <button class="w-100 rounded bg-danger form-control" name="delete_button" type="submit">Sil</button>
                <input name="deleted_id" type="hidden" value="<?= $todo["id"] ?>" name="">
            </form></li>
            
        <?php endforeach; ?>
    </ul>
</div>