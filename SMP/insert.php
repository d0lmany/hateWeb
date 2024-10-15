<?php
include "connect.php";
$w=$_GET["w"];
switch($w){
    case 1:
        $name=$_POST["name"]; $id_category=$_POST["category"]; $price=$_POST["price"];
        $quantity=$_POST["quantity"]; $ex_date=$_POST["ex_date"];
        try{
            $so = $pdo->prepare("INSERT INTO products(name, id_category, price, quantity, ex_date) VALUES(?, ?, ?, ?, ?)");
            $so->execute([$name, $id_category, $price, $quantity, $ex_date]);
            $that = "Location: redirect.php?meth=2";
        } catch (Exception $e) {
            $that = "Location: redirect.php?error=$e";
        }
        header($that);
        exit();
        break;
    case 2:
        $category=$_POST["category"];
        try{
            $so = $pdo->prepare("INSERT INTO categories(category) VALUE(?)");
            $so->execute([$category]);
            $that = "Location: redirect.php?meth=2";
        } catch (Exception $e) {
            $that = "Location: redirect.php?error=$e";
        }
        header($that);
        exit();
        break;
}
?>