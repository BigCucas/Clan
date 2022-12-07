<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "teste";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$ok=mysqli_query($conn, "select * from pre_encomenda");
$ok1=mysqli_query($conn, "select * from pre_encomenda order by ID desc limit 1");
$sim=mysqli_query($conn, "select * from encomenda");
$sim1=mysqli_query($conn, "select * from encomenda order by ID desc limit 1");
$nao=mysqli_query($conn, "select * from clientes");
$nao1=mysqli_query($conn, "select * from clientes order by ID desc limit 1");
$talvez=mysqli_query($conn, "select * from produtos");
$talvez1=mysqli_query($conn, "select * from produtos order by ID desc limit 1");
$okay=mysqli_query($conn, "select * from encomenda");
$okay1=mysqli_query($conn, "select * from encomenda order by ID desc limit 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Clan</title>
</head>
<div class="row">
        <div class="row">
            <div class="col col-2">
                <div class="logo"><img src="logo.png"></div>
            </div>

            <div class="col col-10">
                <nav>
                    <ul>
                        <li><a onclick="openPopup()">Criar Produto</a></li>
                        <li><a onclick="openPopup_c()">Criar Cliente</a></li>
                        <li><a onclick="openpopuppreorder()">Criar Pré-encomenda</a></li>
                    </ul>
                </nav>
            </div>
        </div>


        <div class="row">

        <div class="popup_pre_order" id="popup_pre_order">
            <?php
                  $res1=mysqli_query($conn, "select * from clientes");
                $res2=mysqli_query($conn, "Select * from produtos");
            ?>
            <div class="row">
                <form class="form" action="cpreorder.php" method="post">
                    <div class="row">
                        <div class="col col-6">
                            ID User: 
                            <?php
                                echo "<select name=user_id ID='ID'>";
                                while($row1 = mysqli_fetch_array($res1)){
                                    echo "<option value='".$row1['ID']."'>".$row1['setor']."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                        <div class="col col-6">
                            ID produto:
                            <?php
                                echo "<select name=product_id ID='ID'>";
                                while($row2 = mysqli_fetch_array($res2)){
                                    echo "<option value='".$row2['ID']."'>".$row2['nome']."</option>";
                                }
                                echo "</select>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-6">
                            Quantidade:
                            <input type="number" min="1" name="quantidade" value="<?php echo $row['quantidade']; ?>">
                        </div>
                        <div class="col col-6">
                            Semana:
                            <input type="number" max="54" min="1" name="semana" value="<?php echo $row['semana']; ?>">
                        </div>
                    </div>

                    <div class="col col-6"><button class="btn1" type="button" onclick="closepopuppreorder()">Sair</button></div>
                    <div class="col col-6"><button type="submit" value="submit">Criar</button></div>
                </form>
            </div>
        </div>

                <style>
                    .popup_pre_order form{
                        border: solid 4px white;
                        font-family: Verdana;
                        margin-left: 20px;
                        margin-right: 100px;
                        margin-bottom: 20px;
                        margin-top: 20px;
                    }
                    .popup_pre_order form input{
                        color: black;
                        border: solid purple;
                        border-radius: 10px;
                        height: 25px;
                        background: transparent;
                        width: 190px;
                    }

                    .popup_pre_order form button{
                        cursor: pointer;
                        border-radius: 10px;
                        height: 50px;
                        background: purple;
                        display: inline;
                        margin-left: 40px;
                    }
                    .popup_pre_order form select{
                        color: black;
                        border: solid purple;
                        border-radius: 10px;
                        height: 25px;
                        background: transparent;
                        width: 190px;
                        margin-bottom: 20px;
                    }
                    .popup_pre_order form button{
                        margin-top: 20px;
                        border: solid black;
                    }
                    .popup_pre_order h3{
                        font-family: verdana;
                        font-size: 16px;
                        padding-top: 10px;
                    }
                </style>

                <div class="popup" id="popup">
                    <div class="row">
                        <form class="form" action="cprod.php" method="post">
                            <div class="row">
                                <input class="txt" name="nome" type="text" placeholder="Nome do Produto:" required>
                            </div>
                            <div class="row">
                                <input class="txt" name="CodProd" type="tel" placeholder="Código do Produto:" required>
                            </div>
                            <div class="row">
                                <textarea class="txt" name="descrição" type="text" placeholder="Descrição:" ></textarea>
                            </div>
            
                            <div class="row">
                                <div class="col col-6">
                                    <button class="btn1" type="button" onclick="close2Popup()">Sair</button>
                                </div>
                                <div class="col col-6">
                                    <button class="btn2" type="submit">Criar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="popup_c" id="popup_c">
                    <div class="row">
                        <form class="form" action="cclient.php" method="post">
                            <div class="row">
                                <input class="txt" name="setor" type="text" placeholder="Setor: " required>
                            </div>
                            <div class="row">
                                <div class="col col-6"><input class="txt_2" name="p_nome" type="text" placeholder="Primeiro nome" required></div>
                                <div class="col col-6"><input class="txt_2" name="u_nome" type="text" placeholder="Último nome" required></div>   
                            </div>
                            <div class="row">
                                <input class="txt" name="email" type="email" placeholder="Email: " required>
                            </div> 
                            <div class="row">
                                <input class="txt" name="NIF" type="tel" placeholder="NIF: " required>
                            </div>
                            <div class="row">
                                <input class="txt" name="localidade" type="text" placeholder="Localidade: " required>
                            </div>  
                            <div class="row">
                                <div class="col col-6">
                                    <input class="txt_2" name="codpost" type="text" placeholder="Cod. Postal: " required>
                                </div>
                                <div class="col col-6">
                                    <input class="txt_2" name="nporta" type="tel" placeholder="Nº Porta: " required>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col col-6">
                                    <button class="btn1" type="button" onclick="close2Popup_c()">Sair</button>
                                </div>
                                <div class="col col-6">
                                    <button class="btn2" type="submit">Criar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <div class="col col-2">
                
                    <div class="last">
        
                            <div class="row">

                                <div class="last_">

                                    <div class="row">

                                        <div class="row">

                                            <div class="row">
                                                <div class="col col-12">
                                                    <div class="title"><h2>Última pré-encomenda</h2></div>
                                                    <div class="bag_icon"><center><i class="fa fa-shopping-cart"></i></center></div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <?php
                                                if(mysqli_num_rows($ok)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <?php
                                                        $i=0;
                                                        while($row=mysqli_fetch_array($ok1)){
                                                    ?>
                                                    <h4>Produto</h4>
                                                    <h5><?php echo $row['product_id'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Cliente</h4>
                                                    <h5><?php echo $row['user_id'];?></h5>
                                                </div>
                                            </div> 
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>Quantidade</h4>
                                                    <h5><?php echo $row['quantidade'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Semana</h4>
                                                    <h5><?php echo $row['semana'];?></h5>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                }else{
                                            ?>
                                                <div class="row">
                                                    <div class="col col-6">
                                                        <h4>Produto</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                    <div class="col col-6">
                                                        <h4>Cliente</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                </div> 
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col col-6">
                                                        <h4>Quantidade</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                    <div class="col col-6">
                                                        <h4>Semana</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                </div>
                                                <?php
                                                            }
                                                ?>
                                        </div>
                                        <div class="row">
                                            
                                        </div>

                                    </div>
                                    
                                    
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="last_">

                                    <div class="row">

                                        <div class="row">
                                            <div class="row">
                                                <div class="col col-12">
                                                    <div class="title"><h2>Último Produto</h2></div>
                                                    <div class="bag_icon"><center><i class="fa fa-product-hunt"></i></center></div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <?php
                                                if(mysqli_num_rows($talvez)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <?php
                                                        $i=0;
                                                        while($row=mysqli_fetch_array($talvez1)){
                                                    ?>
                                                    <h4>ID - Produto</h4>
                                                    <h5><?php echo $row['ID'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Código do Produto</h4>
                                                    <h5><?php echo $row['CodProd'];?></h5>
                                                </div>
                                            </div> 
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>Nome do Produto</h4>
                                                    <h5><?php echo $row['nome'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Descrição</h4>
                                                    <h5><?php echo $row['descrição'];?></h5>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                                }else{
                                            ?>
                                            <div class="row">
                                                    <div class="col col-6">
                                                        <h4>ID - Produto</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                    <div class="col col-6">
                                                        <h4>Código do Produto</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                </div> 
                                                <br>
                                                <br>
                                                <div class="row">
                                                    <div class="col col-6">
                                                        <h4>Nome do Produto</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                    <div class="col col-6">
                                                        <h4>Descrição</h4>
                                                        <h5>Sem Resultado</h5>
                                                    </div>
                                                </div>
                                                <?php
                                                            }
                                                ?>
                                        </div>
                                        <div class="row">                  
                                        </div>
                                    </div> 
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="last_">

                                    <div class="row">
                                        <?php
                                            if(mysqli_num_rows($nao)>0){
                                        ?>
                                        <div class="row">

                                            <div class="row">
                                                <div class="col col-11">
                                                    <div class="title"><h2>Último Cliente</h2></div>
                                                </div>
                                                <div class="col col-1">
                                                    <div class="info">
                                                        <a onclick="openinfo()"><i class="fa fa-info"></i></a>
                                                    </div>


                                                    <div class="popinfo" id="popinfo">
                                                        <div class="row">
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <?php
                                                                        $i=0;
                                                                        while($row=mysqli_fetch_array($nao1)){
                                                                    ?>
                                                                    <h3>Primeiro nome</h3>
                                                                    <h4><?php echo $row['p_nome'];?></h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Último nome</h3>
                                                                    <h4><?php echo $row['u_nome'];?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Setor</h3>
                                                                    <h4><?php echo $row['setor'];?></h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>NIF</h3>
                                                                    <h4><?php echo $row['NIF'];?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Email</h3>
                                                                    <h4><?php echo $row['email'];?></h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Localidade</h3>
                                                                    <h4><?php echo $row['localidade'];?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Cód. Postal</h3>
                                                                    <h4><?php echo $row['codpost'];?></h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Nº Porta</h3>
                                                                    <h4><?php echo $row['nporta'];?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn_info" onclick="closepopupinfo()">Sair</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="id_card_icon"><center><i class="fa fa-id-card"></i></center></div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>ID - Cliente</h4>
                                                    <h5><?php echo $row['ID'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Nome do Cliente</h4>
                                                    <h5><?php echo $row['p_nome'];?></h5>
                                                </div>
                                            </div> 
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>Localidade</h4>
                                                    <h5><?php echo $row['localidade'];?></h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Setor</h4>
                                                    <h5><?php echo $row['setor'];?></h5>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                            }else{
                                        ?>
                                            <div class="row">

                                            <div class="row">
                                                <div class="col col-11">
                                                    <div class="title"><h2>Último Cliente</h2></div>
                                                </div>
                                                <div class="col col-1">
                                                    <div class="info">
                                                        <a onclick="openinfo()"><i class="fa fa-info"></i></a>
                                                    </div>


                                                    <div class="popinfo" id="popinfo">
                                                        <div class="row">
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Primeiro nome</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Último nome</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Setor</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>NIF</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Email</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Localidade</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-6">
                                                                    <h3>Cód. Postal</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                                <div class="col col-6">
                                                                    <h3>Nº Porta</h3>
                                                                    <h4>Sem Resultado</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn_info" onclick="closepopupinfo()">Sair</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="id_card_icon"><center><i class="fa fa-id-card"></i></center></div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>ID - Cliente</h4>
                                                    <h5>Sem Resultado</h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Nome do Cliente</h4>
                                                    <h5>Sem Resultado</h5>
                                                </div>
                                            </div> 
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col col-6">
                                                    <h4>Localidade</h4>
                                                    <h5>Sem Resultado</h5>
                                                </div>
                                                <div class="col col-6">
                                                    <h4>Setor</h4>
                                                    <h5>Sem Resultado</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <div class="row">
                                            
                                        </div>

                                    </div>
                                    
                                    
                                </div>
                            </div>
        
        
                    </div>
            </div>

            <div class="col col-10">
                <div class="row">
                        <div class="web">
                            <div class="tab">
                                <button class="tablinks" onclick="openCity(event, 'Lisboa')">Encomendas</button>
                                <button class="tablinks" onclick="openCity(event, 'London')">Pré-encomenda</button>
                                <button class="tablinks" onclick="openCity(event, 'Paris')">Clientes</button>
                                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Produtos</button>
                            </div>
                            <div class="body" id="body">

                                <div id="London" class="tabcontent">
                                    <div id="table-wrapper">
                                    <div id="table-scroll2">
                                        <div id="table-scroll">

                                            <form class="example" action="/action_page.php" style="margin:auto;">
                                                <input type="text" id="myInput" onkeyup="searchTable() " placeholder="Buscar..." name="search2">
                                            </form>
                                            

                                            <style>
                                                .btnsemana{
                                                    width: 60px;
                                                    height: 38px;
                                                    margin-left: 10px;
                                                }
                                            </style>

                                            <?php
                                                $dat = strtotime(date("Y/m/d"));
                                                $week = date("W", $dat);
                                            ?>
                                            <h1>Estamos na semana <?php echo $week;?></h1>
                                            <form method="post" action="checkedorder.php">
                                            <br><input class="checkmark" type="checkbox" onClick="toggle(this)" /> Selecionar todos<br/>

                                            <style>
                                                /* Create a custom checkbox */
                                                .checkmark {
                                                    top: 0;
                                                    left: 0;
                                                    height: 25px;
                                                    width: 25px;
                                                    background-color: #eee;
                                                    margin-bottom: 20px;
                                                }

                                                /* Create the checkmark/indicator (hidden when not checked) */
                                                .checkmark:after {
                                                    content: "";
                                                    position: absolute;
                                                    display: none;
                                                }
                                            </style>

                                            <button class="btn_send" type="submit" name="submit" value="Submit">Enviar</button>

                                            <style>
                                                .btn_send{
                                                    width: 3cm;
                                                    height: 1cm;
                                                    margin-bottom: 0.5cm;
                                                }
                                            </style>    


                                                <table id="potable" class="supTable">
                                                    
                                                    <tr id="quintas">
                                                        <td class="td1"><i onclick="sortTable('supTable', 0)" class="fa fa-filter">ID</i></td>
                                                        <td class="td1"><i onclick="sortTable('supTable', 1)" class="fa fa-filter">Cliente</i></td>
                                                        <td class="td1"><i onclick="sortTable('supTable', 2)" class="fa fa-filter">Produto</i></td>
                                                        <td class="td1"><i onclick="sortTable('supTable', 3)" class="fa fa-filter">Quantidade</i></td>
                                                        <td class="td1"><i onclick="sortTable('supTable', 4)" class="fa fa-filter">Semana</i></td>
                                                    </tr>
                                                    <?php               
                                                        while($row=mysqli_fetch_array($ok)){
                                                        $value=$row['user_id'];
                                                        $value1=$row['product_id'];
                                                        $roww=mysqli_query($conn, "SELECT * FROM clientes WHERE ID='$value'");
                                                        $roww1=mysqli_query($conn, "SELECT * FROM produtos WHERE ID='$value1'");
                                                        $resultt=mysqli_fetch_array($roww);
                                                        $resultt1=mysqli_fetch_array($roww1);
                                                    ?>
                                                    <tr>
                                                        <td><input type="checkbox" value="<?php echo $row['ID']; ?>" name="checkbox_id[]">
                                                        <input type="hidden" value="<?php echo $row['ID']; ?>" name="order_id[]"><?php echo $row['ID']; ?></td>
                                                        <td class="td1"> <input type="hidden" name="user_id[]" value="<?php echo $row['user_id']; ?>"><?php echo $resultt['setor']; ?></td>
                                                        <td class="td1"> <input type="hidden" name="product_id[]" value="<?php echo $row['product_id']; ?>"><?php echo $resultt1['nome']; ?></td>
                                                        <td class="td1"> <input type="hidden" name="quantidade[]" value="<?php echo $row['quantidade']; ?>"><?php echo $row['quantidade']; ?></td>
                                                        <td class="td1"> <input type="hidden" name="semana[]" value="<?php echo $row['semana']; ?>"><?php echo $row['semana']; ?></td>
                                                        <td class="td1">
                                                        <a class="fa fa-pencil" href="editPO.php?ID=<?php echo $row['ID']; ?>"></a>
                                                            <a class="fa fa-arrow-right" href="order.php?ID=<?php echo $row['ID']; ?>"></a>
                                                            <?php
                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                   
                                                </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function toggle(source) {
                                            checkboxes = document.getElementsByName('checkbox_id[]');
                                            for(var i=0, n=checkboxes.length; i<n; i++) {
                                                console.log(checkboxes[i].style);
                                                if(!checkboxes[i].parentElement.parentElement.classList.contains("lol")){
                                                    checkboxes[i].checked = source.checked;
                                                }
                                                    
                                            }
                                        }
                                        </script>
                                </div>

                                <style>

                                    form.example{
                                        float: left;
                                        margin-bottom: 20px;
                                    }
                                    form.example input[type=text] {
                                        padding: 10px;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        float: left;
                                        width: 300px;
                                        background: #f1f1f1;
                                        border-radius: 10px;
                                    }

                                    form.example button {
                                        float: left;
                                        width: 20%;
                                        padding: 10px;
                                        background: #2196F3;
                                        color: white;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        border-left: none;
                                        cursor: pointer;
                                        border-radius: 10px;
                                    }

                                    form.example button:hover {
                                        background: #0b7dda;
                                    }

                                    form.example::after {
                                        content: "";
                                        clear: both;
                                        display: table;
                                    }
                                </style>

                                <div id="Paris" class="tabcontent">
                                    <div id="table-wrapper">
                                    <div id="table-scroll2">
                                        <div id="table-scroll">

                                        <form class="exemplo" action="/action_page.php" style="margin:auto;">
                                            <input type="text" id="myInput2" onkeyup="searchTable2() " placeholder="Buscar..." name="search2">
                                        </form>

                                            <table id="potable2" class="supTable2">
                                                    <tr id="andre">
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 0)" class="fa fa-filter">ID</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 1)" class="fa fa-filter">Primeiro Nome</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 2)" class="fa fa-filter">Último Nome</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 3)" class="fa fa-filter">Setor</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 4)" class="fa fa-filter">Localidade</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 5)" class="fa fa-filter">Código Postal</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 6)" class="fa fa-filter">Nº da Porta</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 7)" class="fa fa-filter">NIF</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 8)" class="fa fa-filter">Email</i></td>
                                                        <td class="td2"><i onclick="sortTable2('supTable2', 9)" class="fa fa-filter">Ativo/Inativo</i></td>
                                                        <td class="td2"></td>
                                                    </tr>
                                                <?php
                                                 while($row=mysqli_fetch_array($nao)){
                                                ?>
                                                <tr>
                                                    <td class="td2"><?php echo $row['ID']; ?></td>
                                                    <td class="td2"><?php echo $row['p_nome']; ?></td>
                                                    <td class="td2"><?php echo $row['u_nome'];?></td>
                                                    <td class="td2"><?php echo $row['setor'];?></td>
                                                    <td class="td2"><?php echo $row['localidade'];?></td>
                                                    <td class="td2"><?php echo $row['codpost'];?></td>
                                                    <td class="td2"><?php echo $row['nporta'];?></td>
                                                    <td class="td2"><?php echo $row['NIF'];?></td>
                                                    <td class="td2"><?php echo $row['email'];?></td>
                                                    <td class="td2"><?php echo $row['status']; ?></td>
                                                    <td class="td1">
                                                    <a class="fa fa-pencil" href="editC.php?ID=<?php echo $row['ID']; ?>"></a>
                                                        <?php
                                                            if($row['status']==1){
                                                                echo '<h6><a href="statusC.php?ID='.$row['ID'].'&status=0">Ativo</a></h6>';
                                                            }else{
                                                                echo '<h6><a href="statusC.php?ID='.$row['ID'].'&status=1">Inativo</a></h6>'; 
                                                                $clienteID=$row['ID'];
                                                                $deleterow=mysqli_query($conn, "DELETE FROM pre_encomenda WHERE user_id='$clienteID'");
                                                            }
                                                        ?>
                                                        <?php
                                                    }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                                 </div>
                                        </div>
                                    </div>
                                </div>


                                <style>

                                    form.exemplo{
                                        float: left;
                                        margin-bottom: 20px;
                                    }
                                    form.exemplo input[type=text] {
                                        padding: 10px;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        float: left;
                                        width: 300px;
                                        background: #f1f1f1;
                                        border-radius: 10px;
                                    }

                                    form.exemplo button {
                                        float: left;
                                        width: 20%;
                                        padding: 10px;
                                        background: #2196F3;
                                        color: white;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        border-left: none;
                                        cursor: pointer;
                                        border-radius: 10px;
                                    }

                                    form.exemplo button:hover {
                                        background: #0b7dda;
                                    }

                                    form.exemplo::after {
                                        content: "";
                                        clear: both;
                                        display: table;
                                    }
                                </style>

                                <div id="Tokyo" class="tabcontent">
                                    <div id="table-wrapper">
                                    <div id="table-scroll2">
                                        <div id="table-scroll">


                                        <form class="exemplo2" action="/action_page.php" style="margin:auto;">
                                            <input type="text" id="myInput3" onkeyup="searchTable3() " placeholder="Buscar..." name="search2">
                                        </form>

                                            <table id="potable3" class="supTable3">
                                                    <tr id="pedro">
                                                        <td class="td3"><i onclick="sortTable3('supTable3', 0)" class="fa fa-filter">ID</i></td>
                                                        <td class="td3"><i onclick="sortTable3('supTable3', 1)" class="fa fa-filter">Nome</i></td>
                                                        <td class="td3"><i onclick="sortTable3('supTable3', 2)" class="fa fa-filter">Código do Produto</i></td>
                                                        <td class="td3">Descrição</td>
                                                        <td class="td3"><i onclick="sortTable3('supTable3', 3)" class="fa fa-filter">Ativo/Inativo</i></td>
                                                        <td class="td3"></td>
                                                    </tr>
                                                <?php
                                                     while($row=mysqli_fetch_array($talvez)){
                                                ?>
                                                <tr>
                                                    <td class="td3"><?php echo $row['ID']; ?></td>
                                                    <td class="td3"><?php echo $row['nome']; ?></td>
                                                    <td class="td3"><?php echo $row['CodProd'];?></td>
                                                    <td class="td3"><?php echo $row['descrição'];?></td>
                                                    <td class="td3"><?php echo $row['status']; ?></td>
                                                    <td class="td1">    
                                                    <a class="fa fa-pencil" href="editP.php?ID=<?php echo $row['ID']; ?>"></a>
                                                        <?php
                                                            if($row['status']==1){
                                                                echo '<h6><a href="statusP.php?ID='.$row['ID'].'&status=0">Ativo</a></h6>';
                                                            }else{
                                                                echo '<h6><a href="statusP.php?ID='.$row['ID'].'&status=1">Inativo</a></h6>'; 
                                                                $product_ID=$row['ID'];
                                                                $deleterow=mysqli_query($conn, "DELETE FROM pre_encomenda WHERE product_id='$product_ID'");
                                                            }
                                                        ?>
                                                        <?php
                                                    }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                                 </div>
                                        </div>
                                    </div>
                                </div>


                                <style>

                                    form.exemplo2{
                                        float: left;
                                        margin-bottom: 20px;
                                    }
                                    form.exemplo2 input[type=text] {
                                        padding: 10px;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        float: left;
                                        width: 300px;
                                        background: #f1f1f1;
                                        border-radius: 10px;
                                    }

                                    form.exemplo2 button {
                                        float: left;
                                        width: 20%;
                                        padding: 10px;
                                        background: #2196F3;
                                        color: white;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        border-left: none;
                                        cursor: pointer;
                                        border-radius: 10px;
                                    }

                                    form.exemplo2 button:hover {
                                        background: #0b7dda;
                                    }

                                    form.exemplo2::after {
                                        content: "";
                                        clear: both;
                                        display: table;
                                    }
                                </style>

                                
                                <div id="Lisboa" class="tabcontent">
                                    <div id="table-wrapper">
                                        <div id="table-scroll2">
                                            <div id="table-scroll">

                                                <form class="exemplo3" action="/action_page.php" style="margin:auto;">
                                                    <input type="text" id="myInput4" onkeyup="searchTable4() " placeholder="Buscar..." name="search2">
                                                </form>


                                                <table id="potable4" class="supTable4">
                                                    <tr id="martins">
                                                        <td type="hidden" class="td1"><i onclick="sortTable4('supTable4', 0)" class="fa fa-filter">Nº da Encomenda</i></td>
                                                        <td class="td1"><i onclick="sortTable4('supTable4', 1)" class="fa fa-filter">Cliente</i></td>
                                                        <td class="td1"><i onclick="sortTable4('supTable4', 2)" class="fa fa-filter">Produto</i></td>
                                                        <td class="td1"><i onclick="sortTable4('supTable4', 3)" class="fa fa-filter">Localidade</i></td>
                                                        <td class="td1"><i onclick="sortTable4('supTable4', 3)" class="fa fa-filter">Semana</i></td>
                                                        <td class="td1"></td>
                                                    </tr>
                                                    <?php
                                                        while($row=mysqli_fetch_array($sim)){
                                                    ?>
                                                    <tr>
                                                        <td type="hidden" class="td1"><?php echo $row['ID']; ?></td>
                                                        <td class="td1"><?php echo $row['setor']; ?></td>
                                                        <td class="td1"><?php echo $row['nome_prod']; ?></td>
                                                        <td class="td1"><?php echo $row['localidade']; ?></td>
                                                        <td class="td1"><?php echo $row['semana']; ?></td>
                                                        <td class="td1"><a onclick="openpopupinfoen()"><i class="fa fa-info"></i></a>
                                                            <?php
                                                        }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if(mysqli_num_rows($okay)>0){
                                ?>
                                <div class="popinfoec" id="popinfoec">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col col-6">
                                            <?php
                                                $i=0;
                                                while($row=mysqli_fetch_array($okay1)){
                                            ?>
                                                <h3>ID</h3>
                                                <h4><?php echo $row['ID']; ?></h4>
                                            </div>
                                            <div class="col col-6">
                                                <h3>User ID</h3>
                                                <h4><?php echo $row['user_id']; ?></h4>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Setor</h3>
                                            <h4><?php echo $row['setor']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Primeiro Nome</h3>
                                            <h4><?php echo $row['p_nome']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Último Nome</h3>
                                            <h4><?php echo $row['u_nome']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Email</h3>
                                            <h4><?php echo $row['email']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>NIF</h3>
                                            <h4><?php echo $row['nif']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Localidade</h3>
                                            <h4><?php echo $row['localidade']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Codigo Postal</h3>
                                            <h4><?php echo $row['codpost']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Nº da Porta</h3>
                                            <h4><?php echo $row['nporta']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Produto ID</h3>
                                            <h4><?php echo $row['product_id']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Nome do Produto</h3>
                                            <h4><?php echo $row['nome_prod']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Código do Produto</h3>
                                            <h4><?php echo $row['cod_prod']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Semana</h3>
                                            <h4><?php echo $row['semana']; ?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-6">
                                            <h3>Quantidade</h3>
                                            <h4><?php echo $row['quantidade']; ?></h4>
                                        </div>
                                        <div class="col col-6">
                                            <h3>Descrição do Produto</h3>
                                            <h4><?php echo $row['descrição_prod']; ?></h4>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="row">
                                        <button class="btn_info_ec" onclick="closepopupinfoen()">Sair</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>

                                <style>

                                    form.exemplo3{
                                        float: left;
                                        margin-bottom: 20px;
                                    }
                                    form.exemplo3 input[type=text] {
                                        padding: 10px;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        float: left;
                                        width: 300px;
                                        background: #f1f1f1;
                                        border-radius: 10px;
                                    }

                                    form.exemplo3 button {
                                        float: left;
                                        width: 20%;
                                        padding: 10px;
                                        background: #2196F3;
                                        color: white;
                                        font-size: 17px;
                                        border: 1px solid grey;
                                        border-left: none;
                                        cursor: pointer;
                                        border-radius: 10px;
                                    }

                                    form.exemplo3 button:hover {
                                        background: #0b7dda;
                                    }

                                    form.exemplo3::after {
                                        content: "";
                                        clear: both;
                                        display: table;
                                    }

                                    h1{
                                        font-size: 20px;
                                        color: white;
                                        padding-top: 1%;
                                        padding-left: 77%;
                                    }
                                </style>


                                <script>
                                    function openCity(evt, cityName) {
                                    var i, tabcontent, tablinks;
                                    tabcontent = document.getElementsByClassName("tabcontent");
                                    for (i = 0; i < tabcontent.length; i++) {
                                        tabcontent[i].style.display = "none";
                                    }
                                    tablinks = document.getElementsByClassName("tablinks");
                                    for (i = 0; i < tablinks.length; i++) {
                                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                                    }
                                    document.getElementById(cityName).style.display = "block";
                                        evt.currentTarget.className += " active";
                                    }

                                    
                                    let popup = document.getElementById("popup");
                                    let popup_c = document.getElementById("popup_c");

                                    function openPopup(){
                                        document.getElementById("body").style.display = "none";
                                        popup.classList.add("open-popup");
                                    }
                                    function close2Popup(){
                                        document.getElementById("body").style.display = "block";
                                        popup.classList.remove("open-popup");
                                    }

                                    function openPopup_c(){
                                        document.getElementById("body").style.display = "none";
                                        popup_c.classList.add("open-popup");
                                    }
                                    function close2Popup_c(){
                                        document.getElementById("body").style.display = "block";
                                        popup_c.classList.remove("open-popup");
                                    }

                                    let popup_pre_order = document.getElementById("popup_pre_order");

                                    function openpopuppreorder(){
                                        document.getElementById("body").style.display = "none";
                                        popup_pre_order.classList.add("open-popup");
                                    }
                                    function closepopuppreorder(){
                                        document.getElementById("body").style.display = "block";
                                        popup_pre_order.classList.remove("open-popup");
                                    }



                                    let popinfoec = document.getElementById("popinfoec");

                                    function openpopupinfoen(){
                                        popinfoec.classList.add("open-popup");
                                    }

                                    function closepopupinfoen(){
                                        document.getElementById("body").style.display = "block";
                                        popinfoec.classList.remove("open-popup");
                                    }


                                    let popinfo = document.getElementById("popinfo");

                                    function openinfo(){
                                        document.getElementById("body").style.display = "none";
                                        popinfo.classList.add("open-popup");
                                    }

                                    function closepopupinfo(){
                                        document.getElementById("body").style.display = "block";
                                        popinfo.classList.remove("open-popup");
                                    }

                                    let popup_c_edit = document.getElementById("popup_c_edit");

                                    function openpopupinfoedit(){
                                        document.getElementById("body").style.display = "none";
                                        popup_c_edit.classList.add("open-popup2");
                                    }
                                    function closepopupinfoedit(){
                                        document.getElementById("body").style.display = "block";
                                        popup_c_edit.classList.remove("open-popup2");
                                    }

                                    let popup_info_p = document.getElementById("popup_info_p");

                                    function openpopupinfopro(){
                                        document.getElementById("body").style.display = "none";
                                        popup_info_p.classList.add("open-popup");
                                    }

                                    function closepopupinfopro(){
                                        document.getElementById("body").style.display = "block";
                                        popup_info_p.classList.remove("open-popup");
                                    }
                                    
                                    function sortTable(tableClass, n) {
                                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

                                        table = document.getElementsByClassName(tableClass)[0];
                                        switching = true;
                                        dir = "asc";
                                        while (switching) {
                                            switching = false;
                                            rows = table.getElementsByTagName("TR");
                                            for (i = 1; i < (rows.length - 1); i++) {
                                                shouldSwitch = false;
                                                x = rows[i].getElementsByTagName("TD")[n];
                                                y = rows[i + 1].getElementsByTagName("TD")[n];
                                                var xContent = (isNaN(x.innerHTML)) 
                                                    ? (x.innerHTML.toLowerCase() === '-')
                                                            ? 0 : x.innerHTML.toLowerCase()
                                                    : parseFloat(x.innerHTML);
                                                var yContent = (isNaN(y.innerHTML)) 
                                                    ? (y.innerHTML.toLowerCase() === '-')
                                                            ? 0 : y.innerHTML.toLowerCase()
                                                    : parseFloat(y.innerHTML);
                                                if (dir == "asc") {
                                                    if (xContent > yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                } else if (dir == "desc") {
                                                    if (xContent < yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                }
                                            }
                                            if (shouldSwitch) {
                                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                switching = true;
                                                switchcount ++;      
                                            } else {
                                                if (switchcount == 0 && dir == "asc") {
                                                    dir = "desc";
                                                    switching = true;
                                                }
                                            }
                                        }
                                        }

                                        function sortTable2(tableClass, n) {
                                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

                                        table = document.getElementsByClassName(tableClass)[0];
                                        switching = true;
                                        dir = "asc";
                                        while (switching) {
                                            switching = false;
                                            rows = table.getElementsByTagName("TR");
                                            for (i = 1; i < (rows.length - 1); i++) {
                                                shouldSwitch = false;
                                                x = rows[i].getElementsByTagName("TD")[n];
                                                y = rows[i + 1].getElementsByTagName("TD")[n];
                                                var xContent = (isNaN(x.innerHTML)) 
                                                    ? (x.innerHTML.toLowerCase() === '-')
                                                            ? 0 : x.innerHTML.toLowerCase()
                                                    : parseFloat(x.innerHTML);
                                                var yContent = (isNaN(y.innerHTML)) 
                                                    ? (y.innerHTML.toLowerCase() === '-')
                                                            ? 0 : y.innerHTML.toLowerCase()
                                                    : parseFloat(y.innerHTML);
                                                if (dir == "asc") {
                                                    if (xContent > yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                } else if (dir == "desc") {
                                                    if (xContent < yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                }
                                            }
                                            if (shouldSwitch) {
                                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                switching = true;
                                                switchcount ++;      
                                            } else {
                                                if (switchcount == 0 && dir == "asc") {
                                                    dir = "desc";
                                                    switching = true;
                                                }
                                            }
                                        }
                                        }

                                        function sortTable3(tableClass, n) {
                                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

                                        table = document.getElementsByClassName(tableClass)[0];
                                        switching = true;
                                        dir = "asc";
                                        while (switching) {
                                            switching = false;
                                            rows = table.getElementsByTagName("TR");
                                            for (i = 1; i < (rows.length - 1); i++) {
                                                shouldSwitch = false;
                                                x = rows[i].getElementsByTagName("TD")[n];
                                                y = rows[i + 1].getElementsByTagName("TD")[n];
                                                var xContent = (isNaN(x.innerHTML)) 
                                                    ? (x.innerHTML.toLowerCase() === '-')
                                                            ? 0 : x.innerHTML.toLowerCase()
                                                    : parseFloat(x.innerHTML);
                                                var yContent = (isNaN(y.innerHTML)) 
                                                    ? (y.innerHTML.toLowerCase() === '-')
                                                            ? 0 : y.innerHTML.toLowerCase()
                                                    : parseFloat(y.innerHTML);
                                                if (dir == "asc") {
                                                    if (xContent > yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                } else if (dir == "desc") {
                                                    if (xContent < yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                }
                                            }
                                            if (shouldSwitch) {
                                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                switching = true;
                                                switchcount ++;      
                                            } else {
                                                if (switchcount == 0 && dir == "asc") {
                                                    dir = "desc";
                                                    switching = true;
                                                }
                                            }
                                        }
                                        }

                                        function sortTable4(tableClass, n) {
                                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

                                        table = document.getElementsByClassName(tableClass)[0];
                                        switching = true;
                                        dir = "asc";
                                        while (switching) {
                                            switching = false;
                                            rows = table.getElementsByTagName("TR");
                                            for (i = 1; i < (rows.length - 1); i++) {
                                                shouldSwitch = false;
                                                x = rows[i].getElementsByTagName("TD")[n];
                                                y = rows[i + 1].getElementsByTagName("TD")[n];
                                                var xContent = (isNaN(x.innerHTML)) 
                                                    ? (x.innerHTML.toLowerCase() === '-')
                                                            ? 0 : x.innerHTML.toLowerCase()
                                                    : parseFloat(x.innerHTML);
                                                var yContent = (isNaN(y.innerHTML)) 
                                                    ? (y.innerHTML.toLowerCase() === '-')
                                                            ? 0 : y.innerHTML.toLowerCase()
                                                    : parseFloat(y.innerHTML);
                                                if (dir == "asc") {
                                                    if (xContent > yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                } else if (dir == "desc") {
                                                    if (xContent < yContent) {
                                                        shouldSwitch= true;
                                                        break;
                                                    }
                                                }
                                            }
                                            if (shouldSwitch) {
                                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                switching = true;
                                                switchcount ++;      
                                            } else {
                                                if (switchcount == 0 && dir == "asc") {
                                                    dir = "desc";
                                                    switching = true;
                                                }
                                            }
                                        }
                                        }
                                        

                                        function searchTable() {
                                            var input, filter, found, table, tr, td, i, j;
                                            input = document.getElementById("myInput");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("potable");
                                            tr = table.getElementsByTagName("tr"); console.log(tr);
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td");
                                                for (j = 0; j < td.length; j++) {
                                                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                        found = true;
                                                    }
                                                }
                                                if (found) {
                                                    tr[i].classList.remove("lol");
                                                    found = false;
                                                } else {
                                                    if(tr[i].id != "quintas"){
                                                        tr[i].classList.add("lol");
                                                    }
                                                }
                                            }
                                        }

                                        function searchTable2() {
                                            var input, filter, found, table, tr, td, i, j;
                                            input = document.getElementById("myInput2");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("potable2");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td");
                                                for (j = 0; j < td.length; j++) {
                                                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                        found = true;
                                                    }
                                                }
                                                if (found) {
                                                    tr[i].classList.remove("lol");
                                                    found = false;
                                                } else {
                                                    if(tr[i].id != "andre"){
                                                       tr[i].classList.add("lol"); 
                                                    }
                                                }
                                            }
                                        }

                                        function searchTable3() {
                                            var input, filter, found, table, tr, td, i, j;
                                            input = document.getElementById("myInput3");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("potable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td");
                                                for (j = 0; j < td.length; j++) {
                                                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                        found = true;
                                                    }
                                                }
                                                if (found) {
                                                    tr[i].classList.remove("lol");
                                                    found = false;
                                                } else {
                                                    if(tr[i].id != "pedro"){
                                                       tr[i].classList.add("lol"); 
                                                    }
                                                }
                                            }
                                        }

                                        function searchTable4() {
                                            var input, filter, found, table, tr, td, i, j;
                                            input = document.getElementById("myInput4");
                                            filter = input.value.toUpperCase();
                                            table = document.getElementById("potable4");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td");
                                                for (j = 0; j < td.length; j++) {
                                                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                                        found = true;
                                                    }
                                                }
                                                if (found) {
                                                    tr[i].classList.remove("lol");
                                                    found = false;
                                                } else {
                                                    if(tr[i].id != "martins"){
                                                        tr[i].classList.add("lol");
                                                    }
                                                }
                                            }
                                        }

                                        
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">

    .lol{
        display: none;
    }


        html{
    background: linear-gradient(to right, rgb(238, 125, 20), rgb(77, 9, 122));
    width: auto;
}
        .body{
            padding: 10px;
        }


        .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 20px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  #table-scroll2{
  width: 1033px;
  overflow: auto;
}
  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 1px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }

  .popup_c button{
    width: 130px;
    margin-top: 50px;
    padding: 10px 0;
    background: purple;
    color: #fff;
    border:0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
  }

  .popup button{
    width: 130px;
    margin-top: 50px;
    padding: 10px 0;
    background: purple;
    color: #fff;
    border:0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
  }


  .popinfo{
    width: 400px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
  }

  .popinfoec{
    width: 400px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
  }

  .popup_c_edit{
    width: 400px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
  }

  .popup_pre_order{
    width: 400px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
  }

  .popup_info_p{
    width: 400px;
    background: #fff;
    border-radius: 10px;
    position: absolute;
    top: 0%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
  }

  .popup_info_p button{
    width: 130px;
    margin-top: 50px;
    padding: 10px 0;
    background: purple;
    color: #fff;
    border:0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
  }

  .popup_pre_order button{
    width: 130px;
    margin-top: 50px;
    padding: 10px 0;
    background: purple;
    color: #fff;
    border:0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
  }
   
  .popup_c_edit button{
    width: 130px;
    margin-top: 50px;
    padding: 10px 0;
    background: purple;
    color: #fff;
    border:0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
  }

  .open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
  }

  .open-popup2{
    visibility: visible;
    top: 0%;
    transform: translate(-75%, -75%) scale(1);
  }

  .open-popup3{
    visibility: visible;
    top: 0%;
    transform: translate(-75%, -75%) scale(1);
  }


    h4{
        padding-left: 1cm;
        font-size: 16px;
        font-family: "Arial";
    }

    h3{
        margin-top: 0.5cm;
    }


    .btn_info{
        margin-top: 1cm;
        width: 130px;
        margin-top: 50px;
        padding: 10px 0;
        background: purple;
        color: #fff;
        border:0;
        outline: none;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .btn_info_ec{
        margin-top: 1cm;
        width: 130px;
        margin-top: 50px;
        padding: 10px 0;
        background: purple;
        cursor: pointer;
        color: #fff;
        border:0;
        outline: none;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    h6{
    display: inline;
  }
a{
    color: white;
}
  a:link { text-decoration: none; }

a:visited { text-decoration: none; color: white;}

a:hover { text-decoration: none; }

a:active { text-decoration: none; }

.txt{
    margin-top: 0.5cm;
    width: 8cm;
    height: 30px;
    font-size:small;
    padding: 10px;
    border-radius: 20px;
    border-color: purple;
}

.txt_2{
  margin-top: 0.5cm;
  width: 2.8cm;
  height: 30px;
  font-size:small;
  padding: 10px;
  border-radius: 20px;
  border-color: purple;
}

.sim{
  margin-top: 1cm;
  border-radius: 10px;
  height: 30px;
}

.web{
    margin: 1cm 0.5cm;
    width: 28cm;
    height: 26.2cm;
    border: solid white 5px;
}

.tab button{
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}
.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  display: none;
}
.td1{
  border: 1px solid rgba(255, 255, 255, 0.507);
  padding-right: 150px;
  text-align: left;
  font-size: 20px;
  clear: both;
  overflow: hidden;
  white-space: nowrap;
  padding-left: 10px;
}
.td2{
  border: 1px solid rgba(255, 255, 255, 0.507);
  padding-right: 150px;
  text-align: left;
  font-size: 20px;
  clear: both;
  overflow: hidden;
  white-space: nowrap;
  padding-left: 10px;
}
.td3{
  border: 1px solid rgba(255, 255, 255, 0.507);
  padding-right: 150px;
  text-align: left;
  font-size: 20px;
  clear: both;
  overflow: hidden;
  white-space: nowrap;
  padding-left: 10px;
}
#table-wrapper{
  position: absolute;
  top: 280px;
  margin-top: 30px;
}
#table-scroll{
  height: 894px;
  overflow: auto;
  margin-top: 20px;
}
#table-wrapper table{
  width: 100%;
}
#table-wrapper table thead {
  background: transparent;
  color: rgb(255, 255, 255);
  font-family: "Montserrat", sans-serif;
  height: 35px;
}
#table-wrapper table tbody {
  background: transparent;
  color: rgba(212, 212, 212, 0.76);
  font-family: "Montserrat", sans-serif;
  height: 25px;
}
#table-wrapper table thead th .text{
  position: absolute;
  top: -20px;
  z-index: 2;
  height: 20%;
  width: 35%;
  border: 1px solid red
}


.last{
    margin: 1cm 4cm;
    height: 8cm;
  }

  .last_{
    margin-bottom: 1cm;
    padding-top: 5px;
    height: 8cm;
    width: 12cm;
    box-shadow: rgba(0, 0, 0, 0.19) 80px 80px 60px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  }

  .title{
    font-size: larger;
    color: white;
    text-align: center;
    padding-top: 0.5cm;
  }

  .info{
    padding-top: 0.75cm;
    color: White;
  }

  .id_card_icon{
    color: black;
    padding-top: 0.2cm;
    font-size: 1.5cm;
  }
  .bag_icon{ 
    color: black;
    padding-top: 0.2cm;
    font-size: 1.5cm;
  }

    </style>
    