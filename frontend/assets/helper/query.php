<?php
include("backend/auth/sql.php");
//about-section
$aboutSelect = mysqli_query($conn, "SELECT * FROM aboutcontent ORDER by id");

$dataAbout = [];
while ($rowAbout = mysqli_fetch_assoc($aboutSelect)) {
    $dataAbout[] = $rowAbout;
}
// header-section
$headerSelect = mysqli_query($conn, "SELECT * FROM headercontent ORDER by id");

$dataHeader = [];
while ($rowHeader = mysqli_fetch_assoc($headerSelect)) {
    $dataHeader[] = $rowHeader;
}
// services-section

$serviceSelect = mysqli_query($conn, "SELECT * FROM services ORDER by id");

$dataServices = [];
while ($rowService = mysqli_fetch_assoc($serviceSelect)) {
    $dataServices[] = $rowService;
}

//news-section
$newsSelect = mysqli_query($conn, "SELECT * FROM newsarea ORDER by id");

$newsData = [];
while ($newsArray = mysqli_fetch_assoc($newsSelect)) {
    $newsData[] = $newsArray;
}

//contact-section
$contactSelect = mysqli_query($conn, "SELECT * FROM contact ORDER by id");

$dataContact = [];
while ($rowContact = mysqli_fetch_assoc($contactSelect)) {
    $dataContact[] = $rowContact;
}