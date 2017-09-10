<?php
    require 'functions.php';

    $data = readData('info', 0, $_GET['edit']);
        
    if(isset($_POST['title'])){
        updateTask($_POST['title'], $_GET['edit']);
        
        header ('location: http://localhost/diploma/practice/todoapp/');
    }










?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <h1 class="text-center">Edit Info!</h1>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <form action="update.php?edit=<?php echo $data[0]['id']; ?>" method="POST">
                        <input type="text" name="title" value="<?php echo $data[0]['name']; ?>">
                        <button class="btn btn-md bg-primary">Save</button>
                    </form>
                </div>
            </div>
        
        </div>
    
    </body>
</html>