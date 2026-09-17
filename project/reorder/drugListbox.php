<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/03/2026 SCREEN: Reorder a listbox containing the drugs in the database-->
<html lang="en">
<head>
    <script src="manReorder.js"></script>
</head>
<body>
    <?php
        include 'db.inc.php';//database connection

            //if the selectedSupplier has not been set OR if the value of it is 'all'
            if (!ISSET($_POST['selectedSupplier']) || $_POST['selectedSupplier'] == 'all')
                {
                    $sql = "SELECT drugID, brandName FROM drugTable";
                            //query selects all of the fields in the doctor table that are NOT marked for deletion

                    $result = mysqli_query($con, $sql);//loads the sql query

                    if(!$result)//if there is an error
                        {
                            die("There has been an error with the sql query" . mysqli_error($con));
                        }
                    
                    echo "<select id='drugListbox' onclick='populateDrug()'>";//a list box is made and when clicked it fills the form with details from the table
                    while ($row = mysqli_fetch_array($result))//returns the rows that have been affected by the previous query
                        {
                            $drugName = $row['brandName'];//gets the brand name of the drug
                            $drugID = $row['drugID'];//gets the id of the drug
                            echo "<option value='$drugID'>$drugName</option>";//creats an option with the value as the drug id and the label of the drug name
                        }
                    echo "</select>";//ends the selection
                    mysqli_close($con);//closes mysql
                }
            else if(ISSET($_POST['selectedSupplier']))//if the selectedSuppler IS SET
                {
                    $sql = "SELECT drugID, brandName FROM drugTable WHERE supplierName = '$_POST[selectedSupplier]'";//the name query but if the user has selected a supplier
                            //query selects all of the fields in the doctor table that are NOT marked for deletion

                    $result = mysqli_query($con, $sql);//loads the query into mysql

                    if(!$result)//if there is an error
                        {
                            die("There has been an error with the sql query" . mysqli_error($con));
                        }
                    
                    echo "<select id='drugListbox' onclick='populateDrug()'>";//a list box is made and when clicked it fills the form with details from the table
                    while ($row = mysqli_fetch_array($result))//returns the rows that have been affected by the previous query
                        {
                            $drugName = $row['brandName'];
                            $drugID = $row['drugID'];
                            echo "<option value='$drugID'>$drugName</option>";
                        }
                    echo "</select>";
                    mysqli_close($con);
                }
        
    ?>
</body>
</html>