<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="teste";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(count($_POST)>0){
        mysqli_query($conn, "update clientes set setor='" . $_POST['setor'] . "', p_nome='" . $_POST['p_nome'] . "', u_nome='" . $_POST['u_nome'] . "', email='" . $_POST['email'] . "', NIF='" . $_POST['NIF'] . "', localidade='" . $_POST['localidade'] . "', codpost='".$_POST['codpost']."', nporta='" . $_POST['nporta'] . "' where ID='" . $_POST['ID'] . "'");
        $message = "<p style='color:green;'>Atualizado com Sucesso! </p>";
    }
    $result=mysqli_query($conn, "select * from clientes where ID='" . $_GET['ID'] . "'");
    $row = mysqli_fetch_array($result);
?>
<html>
    <head>
        <title>Atualizar Dados</title>
    </head>
    <body>
        <form name="frmUser" method="post" action="">
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <a href="index_2.php">Voltar</a>
            </div>
            <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
            <div class="row">
                <div class="col col-6">
            Setor: 
            <input type="text" name="setor" value="<?php echo $row['setor']; ?>">
</div>
<div class="col col-6">
            Primeiro Nome: 
            <input type="text" name="p_nome" value="<?php echo $row['p_nome']; ?>">
</div>
</div>
<div class="row">
    <div class="col col-6">
            Último Nome: 
            <input type="text" name="u_nome" value="<?php echo $row['u_nome']; ?>">
</div>
<div class="col col-6">
            Email: 
            <input type="text" name="email" value="<?php echo $row['email']; ?>">
</div>
</div>
<div class="row">
    <div class="col col-6">
            NIF: 
            <input type="text" name="NIF" value="<?php echo $row['NIF']; ?>">
            </div>
            <div class="col col-6">
            Localidade: 
            <input type="text" name="localidade" value="<?php echo $row['localidade']; ?>">
            </div>
            </div>
            <div class="row">
    <div class="col col-6">
            Cód. Postal: 
            <input type="text" name="codpost" value="<?php echo $row['codpost']; ?>">
</div>
<div class="col col-6">
            Nº Porta: 
            <input type="text" name="nporta" value="<?php echo $row['nporta']; ?>">
</div>
</div>
            <button type="submit" value="submit">Atualizar Dados</button>
        </form>
    </body>
</html>
<style>
        html{
        background: linear-gradient(to right, rgb(238, 125, 20), rgb(77, 9, 122));
    }
    .ok{
        border: solid 4px white;
        padding: 20px 20px;
        margin-top: 15%;
        margin-left: 30%;
        margin-right: 30%;
    }

    form{
        border: solid 4px white;
        padding: 20px 20px;
        margin-top: 15%;
        margin-left: 30%;
        margin-right: 30%;
    }
    form input{
        color: black;
        padding-left: 20px;
        border: solid white;
        border-radius: 10px;
        height: 25px;
        background: transparent;
        width: 350px;

    }

    form button{
        cursor: pointer;
        border-radius: 10px;
        height: 30px;
        background: transparent;
    }
    form select{
        color: black;
        padding-left: 20px;
        border: solid white;
        border-radius: 10px;
        height: 25px;
        background: transparent;
        width: 200px;
        }
    form button{
        margin-top: 20px;
        border: solid black;
    }
    h3{
        font-family: verdana;
        font-size: 16px;
        padding-top: 10px;
    }
    .col-1{width: 8.33%;}
    .col-2{width: 16.66%;}
    .col-3{width: 25%;}
    .col-4{width: 33.33%;}
    .col-5{width: 41.66%;}
    .col-6{width: 50%;}
    .col-7{width: 58.33%;}
    .col-8{width: 66.66%;}
    .col-9{width: 75%;}
    .col-10{width: 83.33%;}
    .col-11{width: 91.66%;}
    .col-12{width: 100%;}

    .col{
        vertical-align: top;
        display: table-cell;
    }

    .row{
        display: table;
        width: 100%;
        padding-top: 20px;
        margin:auto;
    }
    a{
        color: white;
        font-family: verdana;
        font-size: 13px;
        margin-left: 90%;
    }
</style>