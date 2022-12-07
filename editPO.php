<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname="teste";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(count($_POST)>0){
        mysqli_query($conn, "update pre_encomenda set user_id='" . $_POST['user_id'] . "', product_id='" . $_POST['product_id'] . "', quantidade='" . $_POST['quantidade'] . "',semana='" . $_POST['semana'] . "' where ID='" . $_POST['ID'] . "'");
        $message = "<p style='color:green;'>Atualizado com Sucesso! </p>";
    }
    $result=mysqli_query($conn, "select * from pre_encomenda where ID='" . $_GET['ID'] . "'");
    $row = mysqli_fetch_array($result);
    $result1=mysqli_query($conn, "select * from clientes");
    $result2=mysqli_query($conn, "Select * from produtos");
?>
<html>
    <head>
        <title>Atualizar Dados</title>
    </head>
    <body>
        <form name="frmPreEnc" method="post" action="">
            <div><?php if(isset($message)) { echo $message; } ?>
            </div>
            <div style="padding-bottom:5px;">
            <a href="index_2.php">Voltar</a>
            </div>
            <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
            ID User: 
            <?php
                echo "<select name= user_id ID='ID'>";
                while($row = mysqli_fetch_array($result1)){
                    echo "<option value='".$row['ID']."'>".$row['setor']."</option>";
                }
                echo "</select>";
            ?>
            <br>
            ID produto:
            <?php
                echo "<select name= product_id ID='ID'>";
                while($row = mysqli_fetch_array($result2)){
                    echo "<option value='".$row['ID']."'>".$row['nome']."</option>";
                }
                echo "</select>";
            ?>
            <br>
            Quantidade:
            <input type="number" min="1" name="quantidade" value="<?php echo $row['quantidade']; ?>"required>
            <br>
            Semana:
            <input type="number" max="54" min="1" name="semana" value="<?php echo $row['semana']; ?>"required>
            <br><br>
            <button type="submit" value="submit">Atualizar Dados</button>
        </form>
    </body>
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
</html>
