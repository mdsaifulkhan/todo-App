<?php
    require 'functions.php';

    if(isset($_POST['title'])){
        if(insertTodo($_POST['title'])){
            $msg = "Successfully Inserted";
        }
    }

    $todoList = readData();
    $taskComplete = readData('info', 1);

    if(isset($_GET['delete'])){
        if(deleteData($_GET['delete'])){
            $msg = "Successfully Deleted";
        }
    }

    if(isset($_GET['edit'])){
		$btn = 'Save';

		$data = readData('task', 1, $_GET['edit']);

		if(isset($_POST['title'])){
            updateTask($_POST['title'], $_GET['edit']);
        }

	}





?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    
        <title>TODO APP</title>
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="container">
            
            <div class="row">
                <div class="col-xs-8 col-xs-offset-4">
                    <h1>Hello Wolrd!</h1>
                    <p>Lorem is the lorem ipsum dolar emut.</p>
                    <p><?php echo isset($msg) ? $msg : ''; ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-8 col-xs-offset-4">
                    <form action="#" method="POST">
                        <input type="text" name="title">
                        <button class="btn btn-md bg-primary">Add</button>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <h2>Todo List</h2>
                    <ul class="todo" id="todoList">
                        <?php
                            foreach($todoList as $task){
                                echo '<li data-id="'.$task['id'].'">'.$task['name'].' <a class="btn bg-danger" href="?delete='.$task['id'].'">x</a> <a class="btn bg-success" href="update.php?edit='.$task['id'].'">Edit</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <h2>Task Completed</h2>
                    <ul class="todo" id="todoComplete">
                        <?php
                            foreach($taskComplete as $task){
                                echo '<li data-id="'.$task['id'].'">'.$task['name'].' <a class="btn bg-danger" href="?delete='.$task['id'].'">x</a> <a class="btn bg-success" href="update.php?edit='.$task['id'].'">Edit</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        
        </div>
    
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
