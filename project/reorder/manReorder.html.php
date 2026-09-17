<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: reorder - allows the user to select supplier, drugs to reorder-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reorder drugs</title>
    <link rel="stylesheet" href="homepage.css"><!--links the style sheet-->
    <link rel="stylesheet" href="manReorder.css">
    <script src="manReorder.js"></script>
    
    <?php
        function reorderTable($con, $sql)
            {
                $result = mysqli_query($con, $sql);//loads the query into mysql

        if(!$result)//if there is an error
            {
                die("There has been an error with the sql query" . mysqli_error($con));
            }

        while ($row=mysqli_fetch_array($result))
            {
                $drugId = $row['drugID'];//gets the drug id from the table
                $brandName = $row['brandName'];//gets the brand Name from the table
                $genericName = $row['genericName'];//gets the genericName from the table
                $form = $row['form'];//gets the form from the table
                $strength = $row['strength'];//gets the strength from the table
                $qtyInStock = $row['qtyInStock'];//gets the qtyInStock from the table
                $reorderLevel = $row['reorderLevel'];//gets the reorderLevel from the table
                $supplierName = $row['supplierName'];//gets the supplierName from the table
                
                echo "<td>".$drugId."</td> <td>".$brandName."</td> <td>". $genericName.
                "<td>".$form."</td> <td>".$strength."</td> <td>". $qtyInStock.
                "<td>".$reorderLevel."</td> <td>".$supplierName."</td> </tr>";//inputs values into the order stated when we created the table
            } 
            echo "</table>";//closes the table
            mysqli_close($con);
            }
    ?>
</head>
<body>
        <div class="navbar1"><!--links the css to make the first nav bar-->
            BlueLeaf Pharmacy
        </div>

        <nav class="navbar2"><!--links the css to make the second nav bar-->
            <div class="button"> <a href="underconstruction.html">COUNTER SALES</a></div>  <!--links to a form-->

            <div class="button"> <a href="underconstruction.html">DISPENSE DRUGS</a></div> <!--links to a form-->

            <div class="dropdown">STOCK CONRTOL MENU <!--drop down menu for the stock control-->
                <div class="dropdown-content"><!--stock control drop down box-->
                    <a href="manReorder.html.php">Reorder Drugs</a>
                    <a href="underconstruction.html">Reorder Other Stock</a><!--dont need this one-->
                    <hr>
                    <a href="underconstruction.html">Recieve Drug Deliveries</a>
                    <a href="underconstruction.html">Reorder other Deliveries</a><!--dont need this one-->
                </div>
            </div>  

            <div class="dropdown"> SUPPLIER ACCOUNTS MENU<!--supplier menu-->
                <div class="dropdown-content"><!--supplier drop down box-->
                    <a href="underconstruction.html">New Invoices from Suppliers</a>
                    <a href="underconstruction.html">Payment to Suppliers</a>
                </div>
            </div>

            <div class="dropdown"> FILE MAINTENENCE MENU<!--file menu-->
                <div class="dropdown-content"><!--file drop down box (will link to forms)-->
                    <a href="underconstruction.html">Add a New Customer</a>
                    <a href="underconstruction.html">Delete a Customer</a>
                    <a href="underconstruction.html">Amend / View a Customer </a>
                    <hr>
                    <a href="addDoctor.html">Add a New Doctor</a>
                    <a href="deleteDoc.html.php">Delete a Doctor</a>
                    <a href="AmendViewDoc.html.php">Amend / View a Doctor</a>
                    <hr>
                    <a href="underconstruction.html">Add a New Drug</a>
                    <a href="underconstruction.html">Delete a Drug</a>
                    <a href="underconstruction.html">Amend / View a Drug </a>
                    <hr>
                    <a href="underconstruction.html">Add a New Supplier</a>
                    <a href="underconstruction.html">Delete a Supplier</a>
                    <a href="underconstruction.html">Amend / View a Supplier</a>
                    <hr>
                    <a href="underconstruction.html">Add a New Stock Item</a>
                    <a href="underconstruction.html">Delete a Stock Item</a>
                    <a href="underconstruction.html">Amend / View a Stock Item</a>
                </div>
            </div>

            <div class="dropdown"> REPORTS MENU<!--report menu-->
                <div class="dropdown-content"><!--report drop down box-->
                    <a href="underconstruction.html">Drugs Report</a>
                    <a href="underconstruction.html">Prescriptions Report</a>
                    <a href="underconstruction.html">Orders Report</a>
                    <a href="underconstruction.html">Customer/Prescription Report</a>
                </div>
            </div>

            <div class="button"><a href="underconstruction.html">EXIT</a></div><!--will be a button-->
    </nav>


<!----------------------------------------------------dividing off the homepage look with the form---------------------------------------------------------------------------------------------------------->
    <br>
    <br>
    <div id="box">
        <h1> Manual Reorder of Drugs </h1>

        <br>
        <div class="grid">
            <div class="supplierSelect">
                <form action="manReorder.html.php" name="supplierForm" method="post" on>  <!--form that when its submited it loads THIS PAGE-->
                    <h3> Select a supplier </h3>
                        <?php 
                            include 'supplierListbox.php';
                        ?>
                        <input type="text" name="selectedSupplier" id="selectedSupplier" hidden><!--This field stores the users selection from the supplier table-->
                        <br>
                </form>
                <br>
                supplier selected is: <!--lets the user know which selection they are in-->
                <?php 
                    if(!ISSET($_POST['selectedSupplier']))//once the screen is first loaded
                        {
                            echo "all";//prints out all since all of the drugs are printed out at first
                        }
                    else//if the selected supplier IS SET
                        {
                            echo $_POST['selectedSupplier']; //prints out the option the user chose
                        }
                ?>
            </div>

            <div class="drugSelect">
                <form action="reorderLetter.php" name="reorderDrugForm" onsubmit="return confirmChecker()" method="post"><!--when form is submitted it loads the order report-->
                    <h3> Select A Drug To Reorder </h3>  

                    <?php include 'drugListbox.php';?>

                    <input type="number" name="selectedDrug" id="selectedDrug" hidden><!--saves the name of the drug the user selected in order for the sql query to work-->

                    <p id="reorderAmount" hidden> <!--a hidden field that when the user selects a drug it appears-->
                        <label>How much of this drug do you want to reorder</label>
                        <br>
                        <input type="number" name="reorderAmount" min="1" required>
                        <br>
                        <br>
                        <input type="submit" value="PRINT" id="submitButton"><!--stays hidden until at least 1 drug is re ordered-->
                    </p>
                </form>
            </div>
        </div>
        <br>
        <table class="table"><!--the table for drugs-->
            <tr>
                <th>drug ID</th> <th>Brand Name</th> <th>Generic Name</th>
                <th>Form</th> <th>Strength</th> <th>Qty in Stock</th>
                <th>Reorder Level</th> <th>Supplier Name</th> 
            </tr>
            
                <?php 
                    include 'db.inc.php';

                    $checker = 'all'; //by default it will load all drugs
                    if(ISSET($_POST['selectedSupplier']))// checks to see if the variable has been declared without needing to submit the form 
                        {
                            $checker = $_POST['selectedSupplier'];//if its set then it makes $checker the same value as the selectedSupplier
                        }
                    if($checker == 'all')//default or if the user selects the show all option
                        {
                            $sql = "SELECT * FROM drugTable"; //query updates the doctor table and over writes the fields in the table with the changed fields in the form
                            reorderTable($con, $sql);//calling the function to fill out the table
                        }
                    else //if a supplier is selected
                        {
                            include 'db.inc.php';
                            $sql = "SELECT * FROM drugTable WHERE supplierName = '$_POST[selectedSupplier]'";
                            reorderTable($con, $sql);//calling the function to fill out the table
                        }
                ?>
    </div>
</body>
</html>