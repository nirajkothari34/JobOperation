<?php
include 'Connection.php';
if (isset($_POST['submit'])) {
  if (isset($_POST['sroEdit']))
  {
    $sro = $_POST["sroEdit"];
    $name=$_POST['Names'];
    $email=$_POST['email'];
    $P_no=$_POST['no'];
    $addr=$_POST['addr'];
    $qual=$_POST['qual'];
    $I_name=$_POST['I_name'];
    $skill=$_POST['skill'];
    $Exp=$_POST['Exp'];

    $NEW_CV=$_FILES['File']['name'];
    // $fileError=$File['error'];
    // $fileTemp=$File['tmp_name'];
    $fileText=explode('.',$NEW_CV);
    $fileCheck=strtolower(end($fileText));
    $fileStore=array('pdf','doc','docx');
    if (in_array($fileCheck,$fileStore)) 
    {
        $desFile='Resume/'.$NEW_CV;
        $des=$File;
      move_uploaded_file($NEW_CV,$des);
    }
        $quey="UPDATE `student_detail` SET `name`='$name' ,`email`='$email',`phone_number`='$P_no',
        `address`='$addr',`qualification`='$qual',`Institute_name`='$I_name',
        `skills`='$skill',`exp`='$Exp',`Resume`='$des' where `id`='$sro'";
        $query_run=mysqli_query($conn,$quey);
        if ($query_run) {
          # code...
          header('location:Student.php');
        }
        else{
          echo "We Could Not Update The Note Successfully...";
        }
    
  }
        
      }
      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />

    <title>Hello, world!</title>
  </head>
  <body>
  

    <div class="container my-2">
        <form action="Student.php" method="POST" enctype="multipart/form-data">
        <?php
        $result=mysqli_query($conn, "SELECT * FROM `student_detail` WHERE id='" . $_GET['id'] . "'");
      $row=mysqli_fetch_array($result);
      ?>
          <fieldset>
            <legend class="bg-warning">Update Application</legend>
            <input type="hidden" name="sroEdit" id="sroEdit">
                 <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              maxlength="40"
              id="Names"
              name="Names"
              placeholder="Enter Your Name"
              value="<?php echo $row['name'];?>"
            />
          </div>
          <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input
            value="<?php echo $row['email'];?>"
              type="email"
              class="form-control"
              id="email"
              maxlength="50"
              name="email"
              placeholder="Enter Your Email Id "
            />
          </div>
          <div class="mb-3">
            <label for="Phone Number" class="form-label">Phone Number</label>
            <input
            value="<?php echo $row['phone_number'];?>"
              type="text"
              class="form-control"
              id="Number"
              maxlength="10"
              name="no"
              placeholder="Enter Your Phone Number "
            />
          </div>
          <div class="mb-3">
            <label for="Address" class="form-label">Address</label>
            <textarea
              class="form-control"
              id="addr"
              maxlength="90"
              name="addr"
              rows="3"
            ></textarea>
            <?php echo $row['address']; ?>
          </div>
          <div class="mb-3">
            <label for="Qualification" class="form-label">Qualification</label>
            <input
            value="<?php echo $row['qualification'];?>"
              type="text"
              class="form-control"
              id="qual"
              maxlength="10"
              name="qual"
              placeholder="Enter Your Qualification "
            />

            <div class="form-check mb-3"></div>
            <div class="mb-3">
              <label for="Institute Name" class="form-label"
                >Institute Name</label
              >
              <input
                type="text"
            value="<?php echo $row['Institute_name'];?>"
                class="form-control"
                id="I_name"
                maxlength="90"
                name="I_name"
                placeholder="Enter Institute Name "
              />
            </div>
            <div class="mb-3">
              <label for="skill" class="form-label">Skills</label>
              <input
                type="text"
            value="<?php echo $row['skills'];?>"
                class="form-control"
                id="skill"
                maxlength="50"
                name="skill"
                placeholder="Enter Your Skills "
              />
            </div>
            <div class="mb-3">
              <label for="Experience" class="form-label">Experience</label>
              <select name="Exp" id="Exp" value="<?php echo $row['exp'] ?> value="<?php echo $row['exp'] ?>">
              <option value="0 to 1 Year">0 to 1 Year</option>
              <option value="1 to 3 Year">1 to 3 Year</option>
                <option value="3 to 5 Year">3 to 5 Year</option>
                <option value="5 to 7 Year">5 to 7 Year</option>
                <option value="7 to 10 Year">7 to 10 Year</option>
                <option value="10+ Year">10+ Year</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="Resume"> Resume </label>
              <input class="form-control" type="file" id="File" name="File"/>
              <input class="form-control" type="text"  value="<?php echo $row['Resume']?>" name="Old_Resume" id="formFile">

            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </fieldset>
      </form>
    </div>
    
            
         
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
