<?php 
$todoCount = count($todos);
$perPage = 4;
$totalPageCount = ceil($todoCount/$perPage);
$activePage = isset($_GET["p"]) ? +$_GET["p"] : 1;
$offset = $activePage ? ($activePage - 1) * $perPage : 0;
if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["deleted_id"])){
    $deleted_id = $_POST["deleted_id"];
    $todos = array_filter($todos, function ($todo) use ($deleted_id){
        return $todo["id"] !== $deleted_id;
    } );
    $todos = array_values($todos);
    file_put_contents("todos.json",json_encode($todos,JSON_PRETTY_PRINT));
};
if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["selected_option"])){
    $updated_id = $_POST["updated_id"];
    $new_status = $_POST["selected_option"];
    foreach($todos as $key => $todo){
        // if($todo["id"] == $updated_id){
        //     $todo["status"] = $new_status;
        //     break;
        // }
        if($todo["id"] == $updated_id){
        $todos[$key]["status"] = $new_status;
        break;
    }
    }
    file_put_contents("todos.json", json_encode($todos, JSON_PRETTY_PRINT));
}
$todos = array_slice($todos, $offset, $perPage);
?>
<ul class="pagination">
    <?php for($i=0; $i<$totalPageCount; $i++):?>
        <li class="<?=($i+1)===$activePage ? "active" : "" ?>"><a href="&?p=<?= $i+1 ?>"><?= $i+1 ?></a></li>
    <?php endfor; ?>
</ul>
<!-- Delete Form Start-->
    <form id="delete_form" method="post">
        <input id="deleted_id" type="hidden" value="" name="deleted_id">
    </form>
 <!-- Delete Form End -->
<div class="container w-50 rounded border df">
    <ul class="d-flex gap-3 flex-column align-items-center justify-content-center">
        <?php foreach($todos as $todo): ?>
            <li class="border rounded p-3 w-100 text-center"><?= $todo["todo"] ?>
            <form method="POST">
                <input type="hidden" name="updated_id" value="<?= $todo["id"] ?>">
                <select name="selected_option" id="" onchange="this.form.submit()">
                    <option <?= $todo["status"]==0 ? "selected" : "" ?> value="0">not done</option>
                    <option <?= $todo["status"]==1 ? "selected" : "" ?> value="1">done</option>
                </select>
            </form>
                <button class="p-1 rounded w-100 bg-danger mt-1 delete_buttons" data-id="<?= $todo["id"] ?>">Sil</button>
        </li>
        <?php endforeach; ?>
    </ul>
    
</div>