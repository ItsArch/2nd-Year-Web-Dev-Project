///*<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 SCREEN: Add Doctor - javascript for adding a new doctor to the database-->*/
function verifySend()//sends out a confirm box
    {
        user_value = confirm("Are you sure you want to insert the record");
        if(user_value)
            {
                return true;
            }
        else
            {
                return false;
            }
    }