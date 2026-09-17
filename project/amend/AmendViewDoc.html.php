<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: Amend/View Doctor - allows the user to view or change the details of the doctor-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doc AmendView</title>
    <link rel="stylesheet" href="homepage.css"><!--links the style sheet-->
    <link rel="stylesheet" href="AmendDoc.css"><!--links the style sheet-->
    <script src="AmendDoc.js"></script>
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

    <form action="AmendViewDoc.php" id="box" onsubmit="return confirmChecker()" method="post"><!--form where on submit it calls the confirmCheck function and the AmendView.php gets called--> 
        <h1 class="title">Doctor Amend</h1><!--the title of the form-->

        <h4> Press the button to swap between Amend and View </h4>
        
        <div class="doc_details">
            <p>
                <input type="text" name="amendId" id="amendId" placeholder="Doc ID" disabled><!--disabled input box-->
            </P>
            <p>
                <!--pattern makes it so the first letter has to be a capital and at least 3 chars-->
                <input type="text" name="amendFirstname" id="amendFirstname" maxlength="20" placeholder="Firstname" pattern="[A-Z]{1}[a-zA-Z ]{2,}" disabled><!--disabled input box-->
            </p>
            <p>
                <!--pattern makes it so the first letter has to be a capital and at least 3 chars-->
                <input type="text" name="amendSurname" id="amendSurname" maxlength="20" placeholder="Surname" pattern="[A-Z]{1}[a-zA-Z ]{2,}"  disabled><!--disabled input box-->
            </p>
            <p>
                <label>Doctor Phone</label>
                <br><!--the pattern makes the format of the phone 000 000 0000-->
                <input type="text" name="amendPhone" id="amendPhone" maxlength="20" placeholder="xxx xxx xxxx" pattern="[0-9]{3}[ ]{1}[0-9]{3}[ ]{1}[0-9]{4}" disabled><!--disabled input box-->
            </p>
        </div>

        <div class="list">
            <p>
                <?php include 'amendListboxDoc.php';?><!--Adds the list.php at the start of the page-->
            </p>
            <p>
                <input type="button" value="Amend Details" id="amendViewbutton" class="button" onclick="toggleAmendView()">
            </p>
        </div>
    <div class="grid">
        <div class="surgery">
            <p>
                <label for="amendSurAdd">Surgery Address</label>
                <br>
                <textarea type="text" name="amendSurAdd" id="amendSurAdd" maxlength="70"  rows="5" cols="25" pattern="[a-zA-Z0-9 ]" disabled></textarea><!--disabled input box-->
            </p>
            <p>
                <label>Surgery Eircode</label>
                <br><!--pattern is the irish eircode-->
                <input type="text" name="amendSurEir" id="amendSurEir" maxlength="8" placeholder="A65 F4E2" pattern="[a-zA-Z]{1}[0-9]{2}[ ]{1}[a-zA-Z0-9]{4}" disabled><!--disabled input box-->
            </p>
            <p>
                <label>Surgery Telephone: </label> 
                <br><!--the pattern makes the format of the phone 000 000 0000-->
                <input type="text" name="amendSurPhone" id="amendSurPhone"maxlength="20"  placeholder="xxx xxx xxxx" pattern="[0-9]{3}[ ]{1}[0-9]{3}[ ]{1}[0-9]{4}" disabled><!--disabled input box-->
            </p>
        </div>
        
        <div class="home">
            <p>
                <label for="amendHomeAdd">Home Address</label>
                <br>
                <textarea type="text" name="amendHomeAdd" id="amendHomeAdd" maxlength="70" rows="5" cols="25" pattern="[a-zA-Z0-9 ]" disabled></textarea><!--disabled input box-->
            </p>
            <p>
                <label>Home Eircode</label> 
                <br><!--pattern is the irish eircode-->
                <input type="text" name="amendHomeEir" id="amendHomeEir" maxlength="8" placeholder="A65 F4E2" pattern="[a-zA-Z]{1}[0-9]{2}[ ]{1}[a-zA-Z0-9]{4}" disabled><!--disabled input box-->
            </p>
            <p>
                <label>Home Telephone</label>  
                <br><!--the pattern makes the format of the phone 000 000 0000-->
                <input type="text" name="amendHomePhone" id="amendHomePhone" maxlength="20" placeholder="xxx xxx xxxx" pattern="[0-9]{3}[ ]{1}[0-9]{3}[ ]{1}[0-9]{4}" disabled><!--disabled input box-->
            </p>
        </div>
    </div>
        <br><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>