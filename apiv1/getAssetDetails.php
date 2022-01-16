<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Contet-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    
    $data = json_decode(file_get_contents("php://input"), true);

    include "../bin/config.php";

    $id = $_GET['n'];

    $qtsql = mysqli_query($con, "SELECT * FROM quotationmaster WHERE QuotationId = {$id}");

    $qtresult = mysqli_fetch_array($qtsql);

    $qtid = $qtresult['QuotationId'];
    $qtno = $qtresult['QuotationNumber'];
    $qname = $qtresult['QuotationName'];
    $qtqnt = $qtresult['QuotationItemQuantity'];
    $qttypeid = $qtresult['QuotationForItemType'];
    $brid = $qtresult['AssetBrandId'];

    $brandsql = mysqli_query($con, "SELECT * FROM assetbrandmaster WHERE AssetBrandId = {$brid}");

    $brandresult = mysqli_fetch_array($brandsql);

    $brandid = $brandresult['AssetBrandId'];
    $brandName = $brandresult['AssetBrandName'];

    $modelsql = mysqli_query($con, "SELECT * FROM assetmodelmaster WHERE AssetBrandId = {$brandid}");

    $modelresult = mysqli_fetch_array($modelsql);

    $modelname = $modelresult['AssetModelName'];

    $typesql = mysqli_query($con, "SELECT * FROM assettypemaster WHERE AssetTypeId = {$qttypeid}");

    $typeresult = mysqli_fetch_array($typesql);

    $typename = $typeresult['AssetType'];

    $assetsns = mysqli_query($con, "SELECT * FROM assetmaster WHERE AssetQuotationId = {$qtid}");
    $c = mysqli_num_rows($assetsns);
    
    @$sns = null;
    @$srq = null;

    for( $i = 0; $i < $c; $i++){
        $assetresult = mysqli_fetch_array($assetsns);
        $sns[$i] = $assetresult['AssetSerialNumber'];
        $srq[$i] = $assetresult['AssetExpressServiceCode'];
    }
    
    $result = array(
        "Quotation Number" => "$qtno",
        "Quotation Name" => "$qname",
        "Quantity" => "$qtqnt",
        "Brand Name" => "$brandName",
        "Model Name" => "$modelname",
        "Asset Type" => "$typename",
        "Asset Serial Numbers" => $sns,
        "Asset Service Request Number" => $srq
    );
    
    echo json_encode($result);

    // $result = mysqli_query($con, $sql) or die("SQL Query Failed");

    // if(mysqli_num_rows($result) > 0){
    //     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //     echo json_encode($output);
    // }
?>