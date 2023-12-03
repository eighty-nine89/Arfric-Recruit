<?php
// importing necessary files
require_once(realpath(__DIR__ . "/../core/utility_functions.php"));

$errors = []; // array to hold errors


if (!isset($_POST["fullname"]) || strlen($_POST["fullname"]) > 100 || !preg_match("/^[A-za-z][A-Za-z\s]{2,}/", $_POST["fullname"])) {
    $errors[] = 1; // fullname not set or fullname format invalid
}
if (!isset($_POST["email"]) || strlen($_POST["email"]) > 100 || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 2; // email not set or email format invalid
} else if (!checkdnsrr(getEmailDomain($_POST["email"]), "MX")) {
    $errors[] = 3; // invalid MX domain name
}
if (!isset($_POST["position"])) {
    $errors[] = 4; // position not set or invalid
}
if (!isset($_POST["password"]) || !validatePasswordFormat($_POST["password"])) {
    $errors[] = 5; // password not set or invalid format
}
if (!isset($_POST["confirm-password"]) || ($_POST["password"] !== $_POST["confirm-password"])) {
    $errors[] = 6; // passwords don't match
}

echo json_encode($errors);