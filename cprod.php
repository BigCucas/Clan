<?php
    $nome = $_POST['nome'];
    $CodProd = $_POST['CodProd'];
    $descrição = $_POST['descrição'];
    $conn = new mysqli('localhost', 'root', '', 'teste');
    $sql = "SELECT * FROM produtos WHERE CodProd = '$CodProd'";
    $r = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($r);
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connection_error);
    }else{
        if(isset($check)){
            echo '<script type="text/javascript">';
            echo 'alert("Este Código de Produto já está em uso.");';
            echo 'window.location.href="index_2.php";';
            echo '</script>';
        }else{
            $stmt=$conn->prepare("insert into produtos(nome, CodProd, descrição) values (?,?,?)");
            $stmt->bind_param("sis", $nome, $CodProd, $descrição);
            $stmt->execute();
            header ("Location: index_2.php");
            $stmt->close();
            $conn->close();
        }
    }
?>
