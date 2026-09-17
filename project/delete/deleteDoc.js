///*<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 javascript for deleting doctor from the database-->*/
function fillListBox()
    {
        var sel = document.getElementById("listboxDoc");//gets all of the records in the database
        var result;//creates a result variable
        result = sel.options[sel.selectedIndex].value;//gets the record the use selected in a string format "1, artjoms, bobrovs etc."
        var details = result.split(', ');//splits the string after a ", " and makes it into an array
        document.getElementById("delId").value = details[0];//gets the position of personid
        document.getElementById("delFirstname").value = details[1];//gets the position of firstname
        document.getElementById("delSurname").value = details[2];//gets the position of the last name
        document.getElementById("delPhone").value = details[3];//gets the position of the personal phone number

        document.getElementById("delSurAdd").value = details[4];//gets the position of the sugery address
        document.getElementById("delSurEir").value = details[5];//gets the position of the surgery eircode
        document.getElementById("delSurPhone").value = details[6];//gets the position of the surgery phone

        document.getElementById("delHomeAdd").value = details[7];//gets the position of the home address
        document.getElementById("delHomeEir").value = details[8];//gets the position of the home eircode
        document.getElementById("delHomePhone").value = details[9];//gets the position of the home phone

    }
function confirmChecker()
    {
        var result;
        result = confirm("Are you sure you want to mark this doctor for deletion");

        if(result)
            {
                document.getElementById("delId").disabled = false; //enables the id box so that it can be loaded into the sql query
                document.getElementById("delFirstname").disabled = false;
                document.getElementById("delSurname").disabled = false;
                return true
            }
        else
            {
                fillListBox();
                return false
            }
    }