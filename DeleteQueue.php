<?php
if (isset($_GET['QNumber'], $_GET['QDate'])) {
    $strQDate = $_GET["QDate"];
    //echo "strQDate=" . $strQDate;
    $strQNumber = $_GET["QNumber"];
    //echo "strQNumber=" . $strQNumber;
}
require('connect.php');


$sql = "DELETE  FROM queue WHERE QDate =:QDate AND QNumber=:QNumber ";
$stml = $conn->prepare($sql);
$stml->bindParam(':QDate', $strQDate);
$stml->bindParam(':QNumber', $strQNumber);
//$stml->execute();
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

if ($stml->execute()) {
    // $message = "Successfully delete customer".$_GET['CustomerID'].".";
    echo 'echo "Record deleted successfully";
        
    <script type="text/javascript">        
    $(document).ready(function(){

        swal({
            title: "Success!",
            text: "Successfuly delete queue",
            type: "success",
            timer: 2500,
            showConfirmButton: false
        }, function(){
                window.location.href = "index.php";
        });
    });                    
    </script>
';
} else {
    echo "Error deleting record: " .  $conn->prepare($sql);
    $message = "Fail to delete queue information.";
}

$conn = null;

//header("Location:index.php");
