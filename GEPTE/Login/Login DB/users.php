<?php
session_start();

$_SESSION['users'] = array(
    "gab" => array(
        "password" => "123",
        "img" => "./images/gab.jpg"),
    "sam" => array(
        "password" => "abc",
         "img" => "./images/sam5.jpg"),
    "sam2" => array(
            "password" => "abc",
             "img" => ""),
    "aries" => array(
        "password" => "musni",
        "img" => "./images/aries.jpg"),
    "kong" => array(
        "password" => "banana",
        "img" => "./images/kong.jpg"),
    "king" => array(
        "password" => "banana",
        "img" => "./images/king.jpg")

    );

?>