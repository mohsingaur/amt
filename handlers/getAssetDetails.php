<?php
    include "../bin/config.php";
    $id = $_GET['n'];
    $sql = mysqli_query($con, "SELECT * FROM quotationmaster WHERE QuotationId=$id");
    while($row=mysqli_fetch_array($sql)){
        echo "Vendor Name: ";
        echo "Brand Name: ";
        echo "Model: ";
        echo "Quantity: ".$row['QuotationItemQuantity'];
    }
?>