<?php
    $conn = new mysqli('localhost', 'root', '', 'teste');
    if(isset($_POST['submit'])){
        $checked_array=$_POST['checkbox_id'];
        foreach($_POST['order_id'] as $key => $value){
            if(in_array($_POST['order_id'][$key], $checked_array)){
                $order_id=$_POST['order_id'][$key];
                $user_id=$_POST['user_id'][$key];
                $product_id=$_POST['product_id'][$key];
                $quantidade=$_POST['quantidade'][$key];
                $semana=$_POST['semana'][$key];

                $r=mysqli_query($conn, "SELECT * FROM clientes WHERE ID='$user_id'");
                $row=mysqli_fetch_array($r);
                $r1=mysqli_query($conn, "SELECT * FROM produtos WHERE ID='$product_id'");
                $row1=mysqli_fetch_array($r1);
                $stmt=$conn->prepare("INSERT INTO encomenda(user_id, setor, p_nome, u_nome, email, nif, localidade, codpost, nporta, product_id, nome_prod, cod_prod, descrição_prod, semana, quantidade) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
                $stmt->bind_param("issssssiiisssii", $row['ID'], $row['setor'], $row['p_nome'], $row['u_nome'], $row['email'], $row['NIF'], $row['localidade'], $row['codpost'], $row['nporta'], $row1['ID'],$row1['nome'],$row1['CodProd'],$row1['descrição'], $semana, $quantidade);
                $stmt->execute();
                $deleterow=mysqli_query($conn, "DELETE FROM pre_encomenda WHERE ID='$order_id'");
            }
        }
    }
    echo'<script type="text/javascript">';
    echo'alert("Sucesso! Encomendas introduzidas.");';
    echo'window.location.href="index_2.php";';
    echo'</script>';
    $stmt->close();
    $conn->close();
?>