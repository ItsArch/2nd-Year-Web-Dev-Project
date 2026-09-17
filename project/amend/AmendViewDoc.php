<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: amend/view - updates the database after the user made changes-->
<?php
    include 'db.inc.php';

    $sql = "UPDATE doctor SET doctorSurname = '$_POST[amendSurname]', doctorFirstname = '$_POST[amendFirstname]', 
    PhoneNo = '$_POST[amendPhone]', SurgeryAddress = '$_POST[amendSurAdd]', 
    SurgeryEircode = '$_POST[amendSurEir]', SurgeryTelNo = '$_POST[amendSurPhone]', homeAddress = '$_POST[amendHomeAdd]', 
    homeEircode = '$_POST[amendHomeEir]', homeTelNo = '$_POST[amendHomePhone]'
    WHERE doctorID = '$_POST[amendId]'"; //query updates the doctor table and over writes the fields in the table with the changed fields in the form

    $result = mysqli_query($con, $sql);//loads the query into mysql and checks if there is an error

    if(!$result)//if there was an error
        {
            die("There has been an error with the query" . mysqli_error($con));
        }
    else
        {
            if (mysqli_affected_rows($con)!= 0) //if there is a change that happened
                {
                    echo mysqli_affected_rows ($con) . " record(s) updated <br>"; //prints out how mant rows have been changed
                    echo "The user amended was: " . $_POST['amendId'] . ", " . $_POST['amendFirstname'] . ", " . $_POST['amendSurname'];
                }
            else //if nothing has been changed
                {
                    echo "No records were changed";
                }
        }
    mysqli_close($con);
?>
<form action = "AmendViewDoc.html.php" method = "post"><!--form with a return button and upon submission amendView gets loaded again-->

<input type = "submit" value = "Return to Previous Screen">
</form>