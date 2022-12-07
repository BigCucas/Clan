<?php
  $quantidade= $_POST['quantidade'];
  $semana=$_POST['semana'];
  $setor=$_POST['user_id'];
  $product_id=$_POST['product_id'];
  $conn = new mysqli('localhost', 'root', '', 'teste');
  $sql = "SELECT * FROM pre_encomenda WHERE user_id = '$setor' AND product_id = '$product_id' AND semana = '$semana'";
  $r = mysqli_query($conn, $sql);
  $check = mysqli_fetch_array($r);

  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    if(isset($check)){
      echo '<script type="text/javascript">';
      echo 'alert("Utilizador, produto e semana iguais já se encontram na base de dados. Edite os valores na tabela!");';
      echo 'window.location.href="index_2.php";';
      echo '</script>';
  }else{
    $sql1 = "SELECT ID FROM clientes WHERE setor='$setor'";
    $r1 = mysqli_query($conn, $sql1);
    $c1 = mysqli_fetch_array($r1);
      $stmt = $conn->prepare("insert into pre_encomenda(user_id,product_id,quantidade,semana)values(?,?,?,?)");
      $stmt->bind_param("isii",$setor ,$product_id, $quantidade, $semana);
      $stmt->execute();
      header ("Location: index_2.php");
      $stmt->close();
      $conn->close();
   }
}
?>