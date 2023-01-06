<?php
$username="root";
$pass="";
$servername="localhost";
$dbname="compiler";
$conn=mysqli_connect($servername,$username,$pass,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{
    $selectQuery = "SELECT * FROM `files`";
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Compiler
    </title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Python</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Files</a>
                  </li>
                </ul>
            </div>
            <form>   
                <div class="float-end">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                            <input class="form-control me-2 w-75" type="search" placeholder="Filename" aria-label="Filename" id="search" name="search">
                            <input type="button" class="btn btn-outline-success" id="searching" value="Search"></input>
                        
                    </div>
                
            </div>
        </form>
        </div>
    </nav>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Filename</th>
              <th scope="col">Output</th>
            </tr>
          </thead>
          <tbody>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['file_name']; ?></td>
                    <td><?php echo $row['output']; ?></td>
                <tr>
            <?php }?>
          </tbody>
      </table>

    
</body>
</html>