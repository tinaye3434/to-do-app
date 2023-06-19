<?php

$todos= [];
if(file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>PHP Todo App</title>
</head>
<body>

    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>
    </form>
    <br>

<?php foreach($todos as $todoName => $todo): ?>
    <div style="margin-bottom: 20px;">

        <form action="change_status.php" method="post" style="display: inline-block" >
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>" >
            <input type="checkbox" <?php echo $todo['completed'] ? 'checked': '' ?> >
        </form>

        <?php echo $todoName ?>

        <form action="delete.php" method="post" style="display: inline-block">
            <input type="hidden" name="todo_name" value="<?php echo $todoName ?>" >
            <button>Delete</button>
        </form>

    </div>
<?php endforeach; ?>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox]')
    checkboxes.forEach( ch => {
        ch.onclick = function() {
          this.parentNode.submit();
        };
        })
</script>

</body>
</html>
