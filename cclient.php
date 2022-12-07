<?php
    $setor = $_POST['setor'];
    $p_nome = $_POST['p_nome'];
    $u_nome = $_POST['u_nome'];
    $email = $_POST['email'];
    $NIF = $_POST['NIF'];
    $localidade = $_POST['localidade'];
    $codpost = $_POST['codpost'];
    $nporta = $_POST['nporta'];
    $conn = new mysqli('localhost', 'root', '', 'teste');
    $sql = "SELECT * FROM clientes WHERE NIF = '$NIF' AND localidade = '$localidade' AND codpost = '$codpost'";
    $r = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($r);
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connection_error);
    }else{
        if(isset($check)){
            echo '<script type="text/javascript">';
            echo 'alert("Dados de localidade e NIF semelhantes já existentes.");';
            echo 'window.location.href="index_2.php";';
            echo '</script>';
        }else{
            $stmt=$conn->prepare("insert into clientes(setor, p_nome, u_nome, email, NIF, localidade, codpost, nporta) values (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssisii", $setor, $p_nome, $u_nome, $email, $NIF, $localidade, $codpost, $nporta);
            $stmt->execute();
            header ("Location: index_2.php");
            $stmt->close();
            $conn->close();
        }
    }
?>