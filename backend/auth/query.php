<?php
//user-data for witout navbar & cards-basic
$userdata = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
$rowdata = [];
while ($rowuser = mysqli_fetch_assoc($userdata)) {
    $rowdata[] = $rowuser;
}

//primaey_card
$edit = $_GET['edit'] ?? '';
$make = $_GET['MakeCards'] ?? '';

$id = $edit . $make;
$queryEdit = mysqli_query($conn, "SELECT DISTINCT user.username, user.id as user_id, primary_card.* FROM primary_card LEFT JOIN user ON  primary_card.id_user = user.id" . (!empty($id) ? " WHERE primary_card.id ='$id'" : ''));
$rowEdit   = [];
while ($data = mysqli_fetch_array($queryEdit)) {
    $rowEdit[] = $data;
}

//sub_card
$MakeCards = $_GET['MakeCards'] ?? '';
$CardModify = $_GET['CardModify'] ?? '';

$idCard = $MakeCards . $CardModify;
$query = "SELECT primary_card.id as primary_id, sub_card.* FROM sub_card LEFT JOIN primary_card ON sub_card.id_primary_card = primary_card.id";

if (!empty($idCard)) {
    $query .= " WHERE primary_card.id = '$idCard' OR sub_card.id = '$idCard'";
}

$updateData = mysqli_query($conn, $query);

$rowUpdateCards   = [];
while ($data = mysqli_fetch_array($updateData)) {
    $rowUpdateCards[] = $data;
}