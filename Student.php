<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>

<?php
include 'Connection.php';

if (isset($_POST['submit'])) {
    $name=$_POST['Names'];
    $email=$_POST['email'];
    $P_no=$_POST['no'];
    $addr=$_POST['addr'];
    $qual=$_POST['qual'];
    $I_name=$_POST['I_name'];
    $skill=$_POST['skill'];
    $Exp=$_POST['Exp'];
    $File = $_FILES['File']['name'];
    
    // $fileError=$File['error'];
    // $fileTemp=$File['tmp_name'];
    $fileText=explode('.',$File);
    $fileCheck=strtolower(end($fileText));
    $fileStore=array('pdf','doc','docx');
    if (in_array($fileCheck,$fileStore)) 
    {
        $desFile='Resume/'.$File;
        $des=$File;
      move_uploaded_file($File,$des);
      $insert ="INSERT INTO `student_detail`( `name`, `email`, `phone_number`, `address`, 
      `qualification`, `Institute_name`, `skills`, `exp`, `Resume`) 
      VALUES ('$name','$email','$P_no','$addr','$qual','$I_name','$skill','$Exp','$des')";
      $query = mysqli_query($conn, $insert);
      if ($query) {
        // $insert = true;
        // echo "The Record Has Been Inserted Successfully.. 👍 ";
      } else {
        echo "The Record Was Not Inserted Successfully  of this Error -->" . mysqli_error($conn);
      }
    }
}
?>
  <hr>
  <div class="container" style =
    "width: 120%;
    height: 100%;
    margin: 17px 17px;">
    <table class="table" cellspacing="5" id="myTable" border="3" >
    <fieldset>
        <legend>Details Of Application </legend>

      <thead>
        <tr>
          <th scope="col">Sr No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Address</th>
          <th scope="col">Qualification</th>
          <th scope="col">Institute Name</th>
          <th scope="col">Skills</th>
          <th scope="col">Experience</th>
          <th scope="col">Resume</th>
          <th scope="col" >Actions</th>
        </tr>
      </thead>
      <tbody>
          <?php
            $srno = 0;
            $sql = "SELECT * FROM `student_detail`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $srno = $srno + 1;
              echo "<tr>
                <th scope='row'>" . $srno . "</th>
                <td>" . $row['name'] . "</td>
                <td>". $row['email'] . "</td>
                <td>" . $row['phone_number'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['qualification'] . "</td>
                <td>" . $row['Institute_name'] . "</td>
                <td>" . $row['skills'] . "</td>
                <td>" . $row['exp'] . "</td>
                <td>".$row['Resume']. "</td>
                <td>"?>
                <button type="submit" name="update" class="btn btn-primary"><a href="Update.php?id=<?php echo $row['id'];?>" class="text-white" style="text-decoration: none">Update</a></button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-danger" ><a href="Delete.php?id=<?php echo $row['id']?>" style="text-decoration: none" class="text-white">Delete</a></button>&nbsp;&nbsp;&nbsp;<br>
                <button type="submit" class="btn btn-info"><a href="View.php?id=<?PHP Echo $row['id'];?>" class="text-white" style="text-decoration: none">View</a></button>
                </td>
               
                </tr>
            <?php }
          ?>
      </tbody>
    </fieldset>
    </table>  

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
</script>