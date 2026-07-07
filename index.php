<?php
include_once "functions.php";
include_once 'ui.php';

if (isset($_GET["json"])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(getallfrds());
    exit();
}

html_header();
if (isset($_GET["apply"])) {
    html_applysection();
    html_backtohome();
} else {
    $links = getallfrds();
    html_showlinks($links);
    html_applyforlinks();
}
html_footer();
