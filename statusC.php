<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname='teste';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $ID=$_GET['ID'];
    $status=$_GET['status'];
    $q = "UPDATE clientes SET status=$status WHERE ID=$ID";
    mysqli_query($conn, $q);
    header('location:index_2.php');
?>