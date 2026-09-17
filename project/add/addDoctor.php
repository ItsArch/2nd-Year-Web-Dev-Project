<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: Add Doctor - connection to mysql to add a new doctor to the database-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <div class="navbar1"><!--links the css to make the first nav bar-->
        BlueLeaf Pharmacy
    </div>

    <nav class="navbar2"><!--links the css to make the second nav bar-->
            <div class="button"> <a href="#htmlLinking.php">COUNTER SALES</a></div>  <!--links to a form-->

            <div class="button"> <a href="#">DISPENSE DRUGS</a></div> <!--links to a form-->

            <div class="dropdown">STOCK CONRTOL MENU <!--drop down menu for the stock control-->
                <div class="dropdown-content"><!--stock control drop down box-->
                    <a href="#">Reorder Drugs</a>
                    <a href="#">Reorder Other Stock</a><!--dont need this one-->
                    <hr>
                    <a href="#">Recieve Drug Deliveries</a>
                    <a href="#">Reorder other Deliveries</a><!--dont need this one-->
                </div>
            </div>  

            <div class="dropdown"> SUPPLIER ACCOUNTS MENU<!--supplier menu-->
                <div class="dropdown-content"><!--supplier drop down box-->
                    <a href="#">New Invoices from Suppliers</a>
                    <a href="#">Payment to Suppliers</a>
                </div>
            </div>

            <div class="dropdown"> FILE MAINTENENCE MENU<!--file menu-->
                <div class="dropdown-content"><!--file drop down box (will link to forms)-->
                    <a href="#">Add a New Customer</a>
                    <a href="#">Delete a Customer</a>
                    <a href="#">Amend / View a Customer </a>
                    <hr>
                    <a href="addDoctor.html">Add a New Doctor</a>
                    <a href="#">Delete a Doctor</a>
                    <a href="#">Amend / View a Doctor</a>
                    <hr>
                    <a href="#">Add a New Drug</a>
                    <a href="#">Delete a Drug</a>
                    <a href="#">Amend / View a Drug </a>
                    <hr>
                    <a href="#">Add a New Supplier</a>
                    <a href="#">Delete a Supplier</a>
                    <a href="#">Amend / View a Supplier</a>
                    <hr>
                    <a href="#">Add a New Stock Item</a>
                    <a href="#">Delete a Stock Item</a>
                    <a href="#">Amend / View a Stock Item</a>
                </div>
            </div>

            <div class="dropdown"> REPORTS MENU<!--report menu-->
                <div class="dropdown-content"><!--report drop down box-->
                    <a href="#">Drugs Report</a>
                    <a href="#">Prescriptions Report</a>
                    <a href="#">Orders Report</a>
                    <a href="#">Customer/Prescription Report</a>
                </div>
            </div>

            <div class="button"><a href="#">EXIT</a></div><!--will be a button-->
    </nav>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
 <form action="addDoctor.html">
    <?php
            include 'db.inc.php';
            
            $mysql = "INSERT INTO doctor (doctorSurname, doctorFirstname, PhoneNo, SurgeryAddress, SurgeryEircode, SurgeryTelNo, HomeAddress, HomeEircode, HomeTelNo) 
                    VALUES ('$_POST[last_name]', '$_POST[first_name]', '$_POST[mobile_no]', '$_POST[surgery_address]', '$_POST[surgery_eir]'
                    , '$_POST[surgery_phone_no]', '$_POST[home_address]', '$_POST[home_eir]', '$_POST[home_tel_no]')";//the sql query that we will put into mysql

            if(!mysqli_query($con, $mysql))//query gets loaded into mysql
                {
                    echo "There has been an error" . mysqli_error($con);//if there is an error
                }
            
            echo "The following record has been added into the database: " . "<br>";

            echo "Doctor Surname: " . $_POST['last_name'] . "<br>";//gets the firstname from the form
            echo "Doctor Firstname: " . $_POST['first_name'] . "<br>";//gets the surname from the form
            echo "Mobile Telephone number: " . $_POST['mobile_no'] . "<br>";//gets the date of birth in a 00/00/0000 format
            echo "Surgery Address: " . $_POST['surgery_address'] . "<br>";//gets the email address from the form
            echo "Surgery Eircode: " . $_POST['surgery_eir'] . "<br>";//gets the phone number from the form
            echo "Surgery Phone Number: " . $_POST['surgery_phone_no'] . "<br>";//gets the firstname from the form
            echo "Home Address: " . $_POST['home_address'] . "<br>";//gets the surname from the form
            echo "Home Eircode: " . $_POST['home_eir'] . "<br>";//gets the date of birth in a 00/00/0000 format
            echo "Home Telephone Number: " . $_POST['home_tel_no'] . "<br>";//gets the email address from the form

            mysqli_close ($con);//closes mysql
        ?>
        <input type="submit" value="Return to form">
    </form>

</body>
</html>