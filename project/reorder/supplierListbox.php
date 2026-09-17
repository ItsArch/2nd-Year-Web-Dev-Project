<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/03/2026 SCREEN: Reorder a listbox containing the suppliers in the database-->
<html lang="en">
<head>
    <script src="manReorder.js"></script>
</head>
<body>
    <?php
        include 'db.inc.php';//database connection

        $sql = "SELECT DISTINCT supplierName FROM drugTable WHERE DeletedFlag = false";
                //query selects all of the fields in the doctor table that are NOT marked for deletion

        $result = mysqli_query($con, $sql);

        if(!$result)//if there is an error
            {
                die("There has been an error with the sql query" . mysqli_error($con));
            }
        
        echo "<select id='suppListbox' onchange='populateSupplier()'>";//a list box is made and when clicked it fills the form with details from the table
        echo "<option>Select Supplier</option>";
        echo "<option value='all'>Show all</option>";
        while ($row = mysqli_fetch_array($result))//returns the rows that have been affected by the previous query
            {
                $suppName = $row['supplierName'];//gets the supplier name from the database
                echo "<option value='$suppName'>$suppName</option>";//makes the value of the optin the same as the label of the option
            }
        echo "</select>";
        mysqli_close($con);
    ?>
</body>
</html>