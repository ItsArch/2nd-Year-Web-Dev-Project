<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: amend/view - a listbox containing the doctors in the database-->
<html lang="en">
<head>
    <script src="AmendDoc.js"></script>
</head>
<body>
    <?php
    include 'db.inc.php';//database connection

    $sql = "SELECT doctorID, doctorSurname, doctorFirstname, PhoneNo, SurgeryAddress, SurgeryEircode, SurgeryTelNo, homeAddress, homeEircode, homeTelNo FROM doctor WHERE DeletedFlag = 0";
            //query selects all of the fields in the doctor table that are NOT marked for deletion

    $result = mysqli_query($con, $sql);

    if(!$result)//if there is an error
        {
            die("There has been an error with the sql query" . mysqli_error($con));
        }
    
    echo "<select name='listboxDoc' id='listboxDoc' onclick='fillListBox()'>";//a list box is made and when clicked it fills the form with details from the table
    while ($row = mysqli_fetch_array($result))//returns the rows that have been affected by the previous query
        {
            $id = $row['doctorID'];
            $firstname = $row['doctorFirstname'];
            $surname = $row['doctorSurname'];
            $phoneNo = $row['PhoneNo'];
            $surAdd = $row['SurgeryAddress'];
            $surEir = $row['SurgeryEircode'];
            $surTel = $row['SurgeryTelNo'];
            $homeAdd = $row['homeAddress'];
            $homeEir = $row['homeEircode'];
            $homeTel = $row['homeTelNo'];
            $allText = "$id, $firstname, $surname, $phoneNo, $surAdd, $surEir, $surTel, $homeAdd, $homeEir, $homeTel";//creats the value for the option
            echo "<option value='$allText'>$firstname $surname</option>";//option is made containing all of the fields
        }
    echo "</select>";
    mysqli_close($con);
?>
</body>
</html>