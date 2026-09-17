<!--//NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: --/02/2026 connection to mysql-->
<?php
    //NAME: ARTJOMS BOBROVS CODE: C00308488 COURSE: IT MANAGEMENT DATE: 30/01/2026 TASK3
    $hostname = "localhost";// name of host or ip address
    $username = "BlueLeafDatabase";//MySQL username 
    $myPassword = "C3!qfeddlCls7r_3";//MySQL Password 

    $dbname = "healthfirst_";//database Name 

    $con = mysqli_connect($hostname, $username, $myPassword, $dbname);

    if (!$con)
        {
            echo "Failed to connect to MySQL" . mysqli_connect_error();
        }
?>