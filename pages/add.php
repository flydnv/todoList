<?php 
  if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"]==="POST"){
    $rand = rand() . time();
    $new_todos = [
      "id"=>$rand,
      "todo"=>htmlspecialchars($_POST["todo_name"]),
      "status"=> 0,
    ];
    $todos[] = $new_todos;
    $todos = json_encode($todos,JSON_PRETTY_PRINT);
    file_put_contents("todos.json",$todos);
  }
?>
<div class="container w-50">
    <form name="add_todo_form" action="" method="POST">
      <!-- Input Field Example -->
      <div class="mb-3">
        <label for="inputName" class="form-label">TODO name</label>
        <input autofocus name="todo_name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp" required>
        
      </div>
      <!-- Submit Button -->
      <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
    </form>
</div>
