<h2>New Asset Procurement</h2>

<div class="resp-table">
    <table>
        <tr>
            <?php
                $brcols = mysqli_query($con, "SHOW COLUMNS FROM quotationMaster");
                $i = mysqli_num_rows($brcols);
                while ($cols=mysqli_fetch_assoc($brcols)) {
                    echo "<th>".$cols['Field']."</th>";
                }
            ?>
            <th>Modify</th>
        </tr>
        <tr>
            <?php
                $qtsql = mysqli_query($con, "SELECT * FROM quotationMaster");
                while ($row=mysqli_fetch_array($qtsql)) {
                    echo "<tr>";
                    for ($j=0; $j < $i ; $j++) { 
                        echo "<td>".$row[$j]."</td>";
                    }
                    echo "<td> <a href=''>Edit</a> / <a href=''>Delete</a> </td> </tr>";
                }
            ?>
        </tr>        
    </table>
</div>


<div class="container">
    <div class="card">
        <h1 class="card_title">Generate New Quote</h1>
        <p class="card_title-info"></p>
        <form class="card_form" method="post">
        <div class="input">
                <input type="text" name="qtno" class="input_field" required />
                <label class="input_label">Quotation Number</label>
            </div>
            <div class="input">
                <input type="text" name="qtname" class="input_field" required />
                <label class="input_label">Quotation Name</label>
            </div>
            <div class="input">
                <input type="text" name="quantity" class="input_field" required />
                <label class="input_label">Item Quantity</label>
            </div>
            <div class="select">
            
                    <select name="qtittype" class="select_option">
                    <option>Asset Type</option>
                        <?php
                            $tpsql = mysqli_query($con, "SELECT * FROM assettypemaster");
                            while ($row=mysqli_fetch_assoc($tpsql)) {
                                echo "<option value=".$row['AssetTypeId'].">".$row['AssetType']."</option>";
                            }
                        ?>
                    </select>
                        </div>
                    <div class="select">
                    <select name="qtitmodel" class="select_option">
                    <option>Asset Model</option>
                        <?php
                            $tpsql = mysqli_query($con, "SELECT * FROM assetmodelmaster");
                            while ($row=mysqli_fetch_assoc($tpsql)) {
                                echo "<option value=".$row['AssetModelId'].">".$row['AssetModelName']."</option>";
                            }
                        ?>
                    </select>
                        </div>
                <div class="select">
                    <select name="ramsize" class="select_option">
                        <option>Ram SIze</option>
                        <option value="4">4 GB</option>
                        <option value="8">8 GB</option>
                        <option value="16">16 GB</option>
                        <option value="32">32 GB</option>
                        <option value="64">64 GB</option>
                        <option value="128">128 GB</option>
                        <option value="256">256 GB</option>
                        <option value="512">512 GB</option>
                    </select>
                        </div>
                <div class="select">
                    <select name="ramtype" class="select_option">
                    <option>RAM Type</option>
                        <option value="1">DDR 1</option>
                        <option value="2">DDR 2</option>
                        <option value="3">DDR 3</option>
                        <option value="4">DDR 4</option>
                        <option value="5">DDR 5</option>
                    </select>
                        </div>
                
                    <div class="select">
                    <select name="processortype" class="select_option">
                        <option>Processor Type</option>
                        <option value="i3">i3</option>
                        <option value="i5">i5</option>
                        <option value="i7">i7</option>
                        <option value="i9">i9</option>
                        <option value="ryzen3">Ryzen 3</option>
                        <option value="ryzen5">Ryzen 5</option>
                        <option value="ryzen7">Ryzen 7</option>
                        <option value="ryzen9">Ryzen 9</option>
                        <option value="ryzenthread">Ryzen Threadripper</option>
                    </select>
                        </div>
                <div class="select">
                    <select name="storagesize" class="select_option">
                        <option>Storage Size</option>
                        <option value="64">64 GB</option>
                        <option value="128">128 GB</option>
                        <option value="250">250 GB</option>
                        <option value="256">256 GB</option>
                        <option value="500">500 GB</option>
                        <option value="512">512 GB</option>
                        <option value="1000">1000 GB</option>
                        <option value="1024">1024 GB</option>
                        <option value="2000">2000 GB</option>
                        <option value="2048">2048 GB</option>
                    </select>
                        </div>
                <div class="select">
                    <select name="storagetype" class="select_option">
                        <option>Storage Type</option>
                        <option value="1">SSD</option>
                        <option value="2">HDD</option>
                    </select>
                        </div>
                <div class="radio">
                    <input type="radio" name="isactive" value="1" checked> Active
                    <input type="radio" name="isactive" value="0"> InActive
                        </div>
                    <input type="submit" class="card_button" name="save" value="Save">
            </form>
            <div class="card_info">
            <?php

if (isset($_POST['save'])) {
    extract($_POST);

    $query = "INSERT INTO quotationmaster (QuotationNumber, QuotationName, QuotationForItemType, QuotationForItemModel, QuotationForItemRAMSize, QuotationForItemRAMType, QuotationForItemProcessor, QuotationForItemStorage, QuotationForItemStorageType, IsActive) VALUES ('$qtno','$qtname','$qtittype','$qtitmodel','$ramsize','$ramtype','$processortype','$storagesize','$storagetype','$isactive')";
           
    $sql = mysqli_query($con, $query);
    if ($sql) {
        echo "Saved Successfully...";
    }
}
?>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>