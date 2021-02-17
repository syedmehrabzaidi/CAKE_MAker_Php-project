<?php

$db = new mysqli("localhost", "root", "", "mfors");

if ($db->connect_error) {
    die("Connection error" . $con->connect_error);
}
