<!DOCTYPE html>
<html lang="en">

<!-- Database: Crud -->
<!-- DB Table: tasks -->

<?php 
include 'db.php';
$sql = "select * from tasks";  //statement to select everything from database
$rows = $db->query($sql);
?>

<head>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- FontAwesome Kit -->
    <script src="https://kit.fontawesome.com/460c9d9fae.js" crossorigin="anonymous"></script>

    <!-- Local CSS -->
    <!-- Ar Echo time pārlādē cache katru reizi, jo bez tā negāja  -->
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>"> 

    <!-- Ajax Libs -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js">
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>

<body>
    <!-- Modal for popup "Add task" -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- add.php -->
                    <form method="post" action="add.php">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" required name="task" class="form-control">
                        </div>
                        <input type="submit" name="send" value="Add" class="btn btn-success">
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END of modal -->

    <!-- Table for tasks  -->
    <div class="container my-5">
        <h1>Todo list</h1>
        <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success my-4">Add Task</button>
        <div class="row row-wrapper">
            <div class="col-6 bg-light table-wrapper">
                <table id="tblLocations" class="table" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <?php while($row = $rows->fetch_assoc()): ?>
                            <td><i class="fas fa-arrows-alt-v text-muted"></i></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1"></label>
                                </div>
                            </td>
                            <th scope="row"><?php echo $row['name'] ?></th>
                            <td class="justify-content-end align-middle">
                                <a href="update.php?id=<?php echo $row['id'];?>" type="button"
                                    class="btn btn-primary mx-3">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id'];?>" type="button"
                                    class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
        </div>
        <div class="col-6"><p></p></div>
    </div>

</body>

<!-- Drag and drop option  -->
<script type="text/javascript">
    $(function () {
        $("#tblLocations").sortable({
            items: 'tr', // Items kurus drīkst kustināt... :not(tr:first-child) piemēram ja grib iesaldēt pirmo.
            cursor: 'pointer', // Kad pārvelk, parādās kursors -pointers
            axis: 'y', //drag and drop strādā uz y ass
        });
    });
</script>

<!-- ajax sortable on drop  -->
</html>