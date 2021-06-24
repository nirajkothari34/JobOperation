<?php
include 'Connection.php';

?>



<table class="table" cellspacing="5" style="width: 100%; " id="myTable" border="3">
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

            </tr>
        </thead>
        <tbody>
            <?php
            $sno = $_GET['id'];
            $sql = "SELECT * FROM `student_detail` WHERE id=$sno";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $sno = $sno + 1;
                echo "<tr>
                <th scope='row'>" . $sno . "</th>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone_number'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['qualification'] . "</td>
                <td>" . $row['Institute_name'] . "</td>
                <td>" . $row['skills'] . "</td>
                <td>" . $row['exp'] . "</td>
                <td>" . $row['Resume'] . "</td>
                
                </tr>";
            }

            ?>
        </tbody>
    </fieldset>
</table>