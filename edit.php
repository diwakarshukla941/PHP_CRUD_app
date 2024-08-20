<?php
    include 'db.php';
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $id = $_POST['updateId'];

        $updateQuery = "UPDATE crud_one SET name='$name',age='$age',gender='$gender' WHERE id='$id'";
        $runQuery = mysqli_query($conn,$updateQuery);
        header('Location:index.php');
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
        <?php
            $getid = $_GET['editid'];
            $select = "SELECT * FROM crud_one WHERE id = '$getid'"; 
            $runquery = mysqli_query($conn,$select);
            $row = mysqli_fetch_assoc($runquery);

            $name = $row['name'];
            $age = $row['age'];
            $gender = $row['gender'];

            
        ?>
    <div class="container mt-4" >
        <form method="POST" class="text-white bg-black p-4 " style="width:600px;margin-left:350px;border-radius:20px;">
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php echo $name;?>">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">age</label>
                <input type="number" class="form-control" id="age" name="age" value="<?php echo $age;?>">
            </div>

            <div class="gender">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if($gender == 'male'){echo "checked";}?>>
                    <label class="form-check-label" for="gender">Male</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female"<?php if($gender == 'female'){echo "checked";}?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>

            </div>
            <input type="hidden" name="updateId" value="<?php echo $getid; ?>">

            <button type="submit" name="update" class="btn btn-success">Submit</button>
        </form>
    </div>
   
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e0a583f11a.js" crossorigin="anonymous"></script>
  </body>
</html>