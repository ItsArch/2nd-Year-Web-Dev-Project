//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/03/2026 SCREEN: Reorder javascript for the manual reorder
function populateDrug()
    {
        var sel = document.getElementById("drugListbox");//gets all of the records in the database
        var result;//creates a result variable
        result = sel.options[sel.selectedIndex].value;//gets the record the use selected in a string format "1, artjoms, bobrovs etc."
        document.getElementById("selectedDrug").value = result;//gets the position of personid
        document.getElementById("reorderAmount").hidden = false;//makes the field appear

    }
function populateSupplier()
    {
        var sel = document.getElementById("suppListbox");//gets all of the records in the list box
        var result;
        result = sel.options[sel.selectedIndex].value;//makes result the value the user chose
        document.getElementById("selectedSupplier").value = result;//sets the selectedSupplier field as what the user chose
        document.supplierForm.submit();//submit the form as the function is called
    }
function confirmChecker()
    {
        var result;
        result = confirm("Are you sure you want to proceed with the reorder");

        if(!result)
            {
                return false;
            }
    }