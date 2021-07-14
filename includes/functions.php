<?php 

function getStat(){
    global $conn;
    $result = $conn->query("SELECT it_asset_inventory.status FROM it_asset_inventory INNER JOIN it_asset 
ON it_asset_inventory.asset_id=it_asset.asset_id WHERE Status=1 AND location_id='".$location."' ");
$itasset = $result->fetchAll();



}























