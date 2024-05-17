<?php

include("database.php");


$connection = new dbConnection();
$connection->connect();
$res = $connection->getData();





if (isset($_REQUEST["btn-delete"])) {
  $id = $_GET["user_id"];
  $connection->deleteUser($id);
  header("Location: exam_user.php");
}

$userRecord = null;
if (isset($_REQUEST["btn-edit"])) {
  $id = $_GET["user_id"];
  $userReco = $connection->getUser($id);
  $userRecord = mysqli_fetch_array($userReco);
}

if (isset($_REQUEST["btn_add"])) {
  // $id = $_GET["user_id"];
  $name = $_GET["name"];
  $password = $_GET["password"];
  $email = $_GET["email"];
  echo $userRecord == null ? "Add " : "Update ";
  $connection->insertUser($name,$password, $email );
  header("Location: exam_user.php");
}



if (isset($_REQUEST["btn_update_record"])) {
  $id = $_GET["user_id"]; 
  $name = $_GET["name"]; 
  $password = $_GET["password"]; 
  $email = $_GET["email"];
  $connection->updateUser($id, $name,  $email,$password);
  header("Location: exam_user.php");
}







?>
<html>

<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Movie Boking Counter</h1>

    <form method="GET" action="">
      <input type="hidden" name="user_id" value="<?php echo $userRecord["user_id"]  ?>" class="form-control"><br />
      Customer Name : <input type="text" name="name" value="<?php echo $userRecord["name"] ?? "" ?>" class="form-control"><br />
      Email : <input type="email" name="email" value="<?php echo $userRecord["email"] ?? "" ?>" class="form-control"><br />
      Password : <input type="password" name="password" value="<?php echo $userRecord["password"] ?? "" ?>" class="form-control"><br />
      <input type="submit" value="<?php echo $userRecord == null ? "Add" : "Update";  ?>" name="<?php echo $userRecord == null ? "btn_add" : "btn_update_record";  ?>" class="btn btn-primary">

    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>

        </tr>
      </thead>
      <tbody>
        <?PHP while ($data = mysqli_fetch_assoc($res)) {

          echo '<tr>
          <form method="GET" action="">
                <th scope="row">' . $data["user_id"] . '</th>
                <td>' . $data["name"] . '</td>
                <td>' . $data["email"] . '</td>
                <td>' . $data["password"] . '</td>
                
                <td><input type="hidden" name="user_id" value=' . $data["user_id"] . ' class="form-control"><br /></td>
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