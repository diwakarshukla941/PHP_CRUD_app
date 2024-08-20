<?php
    include 'db.php';
    
    if(isset($_POST['btn'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        $selectQuery = "INSERT INTO crud_one (name,age,gender) VALUE ('$name','$age','$gender')"; 
        $run = mysqli_query($conn,$selectQuery);
        
        if(!$run){
            echo "error";
        }else{
            echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toastTrigger = document.getElementById('insertToastBtn'); // Correct toast trigger ID
                    const toastLiveExample = document.getElementById('insertToast'); // Correct toast ID

                    if (toastTrigger) {
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
                        toastBootstrap.show(); // Correct method to show the toast
                    }
                });
            </script>";
        }
    }

    if(isset($_GET['delete'])){
        $deleteId = $_GET['delete'];
        $deleteQuery = "DELETE FROM crud_one WHERE id='$deleteId'";
        $runQuery = mysqli_query($conn,$deleteQuery);
        if(!$runQuery){
            echo mysqli_error($runQuery);
        }else{
            
            echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toastTrigger = document.getElementById('deleteToastBtn'); // Correct toast trigger ID
                    const toastLiveExample = document.getElementById('deleteToast'); // Correct toast ID

                    if (toastTrigger) {
                        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
                        toastBootstrap.show(); // Correct method to show the toast
                    }
                });
            </script>";  
        }
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-warning">

    <div class="container mt-4" >
        <form method="POST" class="text-white bg-black p-4 " style="width:600px;margin-left:350px;border-radius:20px;">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>

            <div class="gender">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                    <label class="form-check-label" for="gender">Male</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>

            </div>

            <button type="submit" name="btn" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container">
        <table class="table table-dark table-hover mt-4">
            <thead>
                <tr>
                <th scope="col">Sr.No</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $num = 0;
                    $select = "SELECT * FROM crud_one ";
                    $runQuery = mysqli_query($conn,$select);
                    while($row = mysqli_fetch_assoc($runQuery)){
                        $name = $row['name'];
                        $age = $row['age'];
                        $gender = $row['gender'];
                        $num = $num + 1;
                        $id = $row['id'];
                    
                ?>
                <tr>
                    <th scope="row"><?php echo $num;?></th>
                    <td><?php echo $name;?></td>
                    <td><?php echo $age;?></td>
                    <td><?php echo $gender;?></td>
                    <td>
                        <button class="btn edit btn-sm btn-warning"><a class="text-decoration-none text-light" href="edit.php?editid=<?php echo $id;?>">Edit</a></button>
                        <button class="btn edit btn-sm btn-danger"><a class="text-decoration-none text-light" href="index.php?delete=<?php echo $id;?>">Delete</a></button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="insert">
        <!-- Toast for Insert -->
    <button type="button" class="btn btn-primary" id="insertToastBtn" style="display:none;">Show insert toast</button>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="insertToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa-solid fa-check mw-3"></i> 
                <strong class="me-auto">Congrats!!</strong>
                <small>Just now</small>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Record inserted successfully!
            </div>
        </div>
    </div>
    </div>

    <div class="delete">
       <!-- Toast for Delete -->
    <button type="button" class="btn btn-primary" id="deleteToastBtn" style="display:none;">Show delete toast</button>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="deleteToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa-solid fa-check mw-3"></i> 
                <strong class="me-auto">Congrats!!</strong>
                <small>Just now</small>
                <button type="button" class="btn-close bg-dark" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Record deleted successfully!
            </div>
        </div>
    </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e0a583f11a.js" crossorigin="anonymous"></script>
  </body>
</html>