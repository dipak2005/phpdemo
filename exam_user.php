
<?php

include ("database.php");



  



?>
<html>

<head>
  <title>Student Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Movie Boking Counter</h1>
    
    <form method="GET" action="">
      <input type="hidden" name="user_id" value="<?php  echo $userRecode["user_id"] ?>" class="form-control"><br />
      Customer Name : <input type="text" name="Name" value="<?php  echo $studentRecord["name"] ?>" class="form-control"><br />
      Email : <input type="email" name="email" value="<?php  echo $studentRecord["email"] ?>" class="form-control"><br />
      Password : <input type="password" name="pass" value="<?php  echo $studentRecord["password"] ?>" class="form-control"><br />
     
     
      <input type="submit" value="<?php echo $studentRecord==null? "Add":"Update";  ?>" name="<?php echo $studentRecord==null? "btn_add":"btn_update_record";  ?>" class="btn btn-primary">
      <button type="submit" name="btn_add_new" class="btn btn-danger">Base class</button>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
         
          <th scope="col">Full Name</th>
          <th scope="col">Email</th>
         
        </tr>
      </thead>
      <tbody>
        <?PHP while ($data = mysqli_fetch_assoc($res)) {

          echo '<tr>
          <form method="GET" action="">
                <th scope="row">' . $data["id"] . '</th>
                <td><img src="images/'.$data["image"].'" width="100" height="100"></td>
                <td>' . $data["name"] . '</td>
                <td>' . $data["email"] . '</td>
                
                <td><input type="hidden" name="id" value=' . $data["user_id"] . ' class="form-control"><br /></td>
                <td><button type="submit" name="btn-edit" class="btn">Edit</button></td>
                <td><button type="submit" name="btn-delete" class="btn btn-danger">Delete</button></td>
                </form>
              </tr>';

        } ?>


      </tbody>
    </table>

  </div>
</body>

</html>