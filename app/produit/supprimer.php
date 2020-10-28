<?php
include('../../includes/connect.php');
if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $query = "DELETE FROM `produit` WHERE `id` = '$id'";
    $run = mysqli_query($connect, $query);
    if ($run) {
        header('location:../index.php');
    } 
}