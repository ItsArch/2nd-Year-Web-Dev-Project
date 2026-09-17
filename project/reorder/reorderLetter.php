<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/03/2026 SCREEN: Reorder the reorder letter-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reorder Letter</title>
    <link rel="stylesheet" href="reorderLetter.css"><!--links the style sheet-->
    <link rel="stylesheet" href="homepage.css"><!--links the style sheet-->
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
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

<br>
<br>
<br>
    <div class='main'><!--the main div (how the letter looks)-->
        <?php
            include 'db.inc.php';
            $sql = "SELECT * FROM drugTable WHERE drugID = '$_POST[selectedDrug]'";//loads all of the info from the table where the drug id matches the drug that the user selected

            $result = mysqli_query($con,$sql);//loads the query

            $quantity = $_POST['reorderAmount'];//gets the quantity from what the user inputted

            if(!$result)//if there is an error
                {
                    die("There has been an error with the sql query" . mysqli_error($con));
                }

            while($row = mysqli_fetch_array($result))//gets the rows that were affected by the last query
                {
                    $drugId = $row['drugID'];
                    $brandName = $row['brandName'];
                    $genericName = $row['genericName'];
                    $form = $row['form'];
                    $strength = $row['strength'];
                    $qtyInStock = $row['qtyInStock'];
                    $reorderLevel = $row['reorderLevel'];
                    $supplierName = $row['supplierName'];
                    $price = $row['pricePerUnit'];
                }

            $sql2 = "INSERT INTO orderReport (brand_Name, generic_Name, form, strength, supplier_Name, qty_On_Order, drugID) 
                    VALUES ('$brandName', '$genericName', '$form', '$strength', '$supplierName', '$quantity' ,'$_POST[selectedDrug]')"; //updates the order table

            $result2 = mysqli_query($con, $sql2);
            if(!$result2)
                {
                    die("there has been an error with the query".mysqli_error($con));
                }
        ?>
        <div class="pharmaAddress"><!--controls the pharmacy address-->
            Primo Pharmacy,<br>
            Highstreet,<br>
            Carlow,<br>
            <?php
                $date = date_create();//gets todays date
                $date = date_format($date, 'd/m/Y');//formats it
                echo "$date";//prints it out
            ?>
        </div>

        <div class="supplierAddress"><!--controls the supplier address-->
            <?php
                    //gets everything from supplier where the supplier name from the supplier table matches the supplier name from the drug table IN THE CASE THAT  the drugid matches the selected drug
                $sql = "SELECT * FROM supplier INNER JOIN drugTable on drugTable.supplierName = supplier.supplierName WHERE drugTable.drugID = '$_POST[selectedDrug]'";
                $result = mysqli_query($con,$sql);
                if(!$result)//if there is an error
                    {
                        die("There has been an error with the sql query" . mysqli_error($con));
                    }
                while($row = mysqli_fetch_array($result))
                    {
                        $supplierName = $row['supplierName'];
                        $street = $row['street'];
                        $town = $row['town'];
                        $county = $row['county'];
                    }
                echo "$supplierName" . ",<br>" .
                    "$street" . ",<br>" .
                    "$town". ",<br>" .
                    "$county";
            ?>
            <br>
        </div>

        <div class="order">
            Order Number: 
            <?php 
                include 'db.inc.php';
                $sql = "SELECT orderNo FROM orderReport WHERE drugID = '$_POST[selectedDrug]'"; //gets the order number where the drug id was the selected Drug
                $result = mysqli_query($con, $sql);
                if(!$result)
                    {
                        die("there has been an error with the query".mysqli_error($con));
                    }
                else
                    {
                        while($row = mysqli_fetch_array($result))
                            {
                                $orderNumber = $row['orderNo'];
                            }
                        echo $orderNumber;// prints out the order number
                    }
            ?>
        </div>

        <p>
            Please supply the following drugs:
            <br>
            <br>
        <p>

        <div class="tableLayout">
            <table>
                <tr>
                    <th>Quantity</th><th>Drug Description</th><th>Your Drug Code</th><th>Price</th> <!--the layout of the table-->
                </tr>
                <?php
                    
                    $totalPrice = $price * $quantity; //calculates the total price

                    echo "<td>".$quantity."</td> <td>".$form. ", ".$strength."</td> <td>". $drugId.
                    "<td>".$price."</td> </tr>";//inputs values into the order stated when we created the table
                    echo "</table>";
                ?>
            <br>
            <br>
        </div>

        <div class="totalCost">
            <div>Total Cost:</div> <div><?php echo $totalPrice?></div> <!--prints out the total cost-->
        </div>

            <br>
            <br>

        <div class="ending">
            Yours sincerely,
            <br>
            Josh Kennady
            <br>
            Pharmacist.
        </div>
        <br>
        <br>
        <form action="manReorder.html.php">
            <button type="submit">Return</button>
        </form>
    </div>
    
</body>
</html>