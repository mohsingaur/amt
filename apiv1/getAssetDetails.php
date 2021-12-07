<?php
    header('Contet-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Contet-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    
    $data = json_decode(file_get_contents("php://input"), true);

    include "../bin/config.php";

    $id = $_GET['n'];

    $qtsql = mysqli_query($con, "SELECT * FROM quotationmaster WHERE QuotationId = {$id}");

    $qtresult = mysqli_fetch_array($qtsql);

    echo $qtno = $qtresult['QuotationNumber']." ";
    echo $qnanme = $qtresult['QuotationName']." ";
    echo $qtqnt = $qtresult['QuotationItemQuantity']." ";
    echo $brid = $qtresult['AssetBrandId']." ";

    $brsql = mysqli_query($con, "SELECT * FROM assetbrandmaster WHERE AssetBrandId = {$brid}");

    $brresult = mysqli_fetch_array($brsql);

    echo $brName = $brresult['AssetBrandName'];
    

    // $result = mysqli_query($con, $sql) or die("SQL Query Failed");

    // if(mysqli_num_rows($result) > 0){
    //     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //     echo json_encode($output);
    // }
?>