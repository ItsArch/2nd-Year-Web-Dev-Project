///*<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: amend/view - javascript for amending a new doctor in the database-->*/
function toggleAmendView()//if the user clicks the button it either disables the text fields or enables them
    {
        if(document.getElementById("amendViewbutton") .value == "Amend Details")//if the button says Amend Details when clicked
            {
                document.getElementById("amendFirstname").disabled = false;//disables the text boxes
                document.getElementById("amendSurname").disabled = false;
                document.getElementById("amendPhone").disabled = false;

                document.getElementById("amendHomeAdd").disabled = false;
                document.getElementById("amendHomeEir").disabled = false;
                document.getElementById("amendHomePhone").disabled = false;

                document.getElementById("amendSurAdd").disabled = false;
                document.getElementById("amendSurEir").disabled = false;
                document.getElementById("amendSurPhone").disabled = false;

                document.getElementById("amendViewbutton").value = "View Details";//changes the display name to view details
            }
        else//if the button says view Details when clicked
            {
                document.getElementById("amendFirstname").disabled = true;//enables the text boxes
                document.getElementById("amendSurname").disabled = true;
                document.getElementById("amendPhone").disabled = true;

                document.getElementById("amendHomeAdd").disabled = true;
                document.getElementById("amendHomeEir").disabled = true;
                document.getElementById("amendHomePhone").disabled = true;

                document.getElementById("amendSurAdd").disabled = true;
                document.getElementById("amendSurEir").disabled = true;
                document.getElementById("amendSurPhone").disabled = true;

                document.getElementById("amendViewbutton").value = "Amend Details";//changes the display name to amend details
            }
    }
function fillListBox()
    {
        var sel = document.getElementById("listboxDoc");//gets all of the records in the database
        var result;//creates a result variable
        result = sel.options[sel.selectedIndex].value;//gets the record the use selected in a string format "1, artjoms, bobrovs etc."
        var details = result.split(', ');//splits the string after a ", " and makes it into an array
        document.getElementById("amendId").value = details[0];//gets the position of personid
        document.getElementById("amendFirstname").value = details[1];//gets the position of firstname
        document.getElementById("amendSurname").value = details[2];//gets the position of the last name
        document.getElementById("amendPhone").value = details[3];//gets the position of the personal phone number

        document.getElementById("amendHomeAdd").value = details[4];//gets the position of the sugery address
        document.getElementById("amendHomeEir").value = details[5];//gets the position of the surgery eircode
        document.getElementById("amendHomePhone").value = details[6];//gets the position of the surgery phone

        document.getElementById("amendSurAdd").value = details[7];//gets the position of the home address
        document.getElementById("amendSurEir").value = details[8];//gets the position of the home eircode
        document.getElementById("amendSurPhone").value = details[9];//gets the position of the home phone
    }
function confirmChecker()
    {
        var result;
        result = confirm("Are you sure you want to proceed with the changes");//upon submit the user is asked to confirm

        if(result) //if the user says okay
            {
                document.getElementById("amendId").disabled = false;
                document.getElementById("amendFirstname").disabled = false;//enables the text boxes
                document.getElementById("amendSurname").disabled = false;
                document.getElementById("amendPhone").disabled = false;

                document.getElementById("amendHomeAdd").disabled = false;
                document.getElementById("amendHomeEir").disabled = false;
                document.getElementById("amendHomePhone").disabled = false;

                document.getElementById("amendSurAdd").disabled = false;
                document.getElementById("amendSurEir").disabled = false;
                document.getElementById("amendSurPhone").disabled = false;

                return true;
            }
        else//if user says cancel
            {
                fillListBox();//the function populates the select box again
                return false;
            }
    }