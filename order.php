<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="teste";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    $result=mysqli_query($conn, "select * from pre_encomenda where ID='" . $_GET['ID'] . "'");
    $row = mysqli_fetch_array($result);
    $r3=mysqli_query($conn, "select * from clientes where ID='" . $row['user_id'] . "'");
    $rw=mysqli_fetch_array($r3);
    $r4=mysqli_query($conn, "select * from produtos where ID='" . $row['product_id'] . "'");
    $rw2=mysqli_fetch_array($r4);
    $r5=mysqli_query($conn, "select * from pre_encomenda where ID='" . $row['ID'] . "'");
    $rw3=mysqli_fetch_array($r5);
    $stmt = $conn->prepare("INSERT INTO encomenda(user_id, setor, p_nome, u_nome, email, nif, localidade, codpost, nporta, product_id, nome_prod, cod_prod, descrição_prod, semana, quantidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("issssssiiisssii", $rw['ID'], $rw['setor'], $rw['p_nome'], $rw['u_nome'], $rw['email'],  $rw['NIF'],  $rw['localidade'], $rw['codpost'], $rw['nporta'], $rw2['ID'], $rw2['nome'], $rw2['CodProd'], $rw2['descrição'], $rw3['semana'], $rw3['quantidade']);
    $stmt->execute();
    echo "registration successfully"; 
    $stmt->close();
    $conn->close();
?>