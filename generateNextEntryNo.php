<?php
//Require Config file to establish connection to DB
require 'config.php';

function generateNextEntry(){
    require 'config.php';
    $sql="SELECT MAX(resv_no) as max_resv_no FROM test_automations";
    $result=mysqli_query($conn1,$sql);

    $row=mysqli_fetch_array($result);

    if($row > 0){
        $prevResvNo = $row['max_resv_no'];
        $nextResvNo = ++$prevResvNo;
        return $nextResvNo;
    }
}
    /* $newEntryNo = generateNextEntry();
    echo $newEntryNo, "\n";

    /* $entry_code= "INSERT INTO alphanumeric_code(code_no)VALUES ('$newEntryNo')";

    if(mysqli_query($conn1,$entry_code)){
        echo "Code added Successfully!" ;
    } */

?>