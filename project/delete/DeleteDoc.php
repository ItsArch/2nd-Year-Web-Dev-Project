<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 Marks the doctor for deletion-->
<?php
    include 'db.inc.php';

    $sql = "UPDATE doctor SET DeletedFlag = 1 WHERE doctorID = '$_POST[delId]'";

    $result = mysqli_query($con, $sql);

    if(!$result)
        {
            die("There has been an error with the query" . mysqli_error($con));
        }
    else
        {
            if (mysqli_affected_rows($con)!= 0) //if there is a change that happened
                {
                    echo mysqli_affected_rows ($con) . " record(s) updated <br>"; //prints out how mant rows have been changed
                    echo "The user marked for deletion was: " . $_POST['delId'] . ", " . $_POST['delFirstname'] . ", " . $_POST['delSurname'];
                }
            else //if nothing has been changed
                {
                    echo "No records were changed";
                }
        }
        mysqli_close($con);
    ?>
    <form action = "deleteDoc.html.php" method = "post"><!--form with a return button and upon submission amendView gets loaded again-->

    <input type = "submit" value = "Return to Previous Screen">
    </form>


    