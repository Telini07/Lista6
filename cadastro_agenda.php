<?php
include("conexao.php");
$nome_foto = "";
if(file_exists($_FILES['foto']['tmp_name'])){
    $pasta_destino = 'fotos/';
    $extensao = strtolower ( substr($_FILES['foto']['name'],-4));
    $nome_foto = $pasta_destino . date("Ymd-His"). $extensao;
    move_uploaded_file($_FILES['foto']['tmp_name'], $nome_foto);
}

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$fone = $_POST['fone'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$data = date('y-m-d');

$sql = "SELECT email FROM agenda WHERE email = '$email'";
$result= mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0){
    echo "<strong><p>Email já cadastrado!</p></strong>";
}else{
    $sql = "INSERT INTO agenda (nome, apelido, endereco, bairro, cidade, estado, fone, cel, email, foto, dt_cadastro)";
    $sql .= " VALUES ('".$nome."','".$apelido."','".$endereco."','".$bairro."','".$cidade."','".$estado."'
    ,'".$fone."','".$cel."','".$email."','".$nome_foto."','".$data."')";
    
    echo $sql."<br>";
    $result = mysqli_query($con, $sql);
    
    if($result)
        echo "<strong>Dados cadastrados com sucesso!</strong>";
    else
        echo "<strong>Erro ao tentar cadastrar!<strong>";    
}

?>
<a href = "index.php"><button>Voltar</button></a>