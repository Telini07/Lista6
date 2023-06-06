<?php
    include('conexao.php');
    $id_agenda = $_POST['id_agenda'];
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $fone = $_POST['fone'];
    $cel = $_POST['cel'];
    $email = $_POST['email'];
    $nome_foto = "";
    if(file_exists($_FILES['foto']['tmp_name'])){
        $pasta_destino = 'fotos/';
        $extensao = strtolower ( substr($_FILES['foto']['name'],-4));
        $nome_foto = $pasta_destino . date("Ymd-His"). $extensao;
        move_uploaded_file($_FILES['foto']['tmp_name'], $nome_foto);
    }

    echo "<h1>Alterar dados de agenda</h1><hr>";
    echo "<h2>Usuario:$nome</h2>";
    $sql = "UPDATE agenda set nome = '$nome', 
    apelido = '$apelido', 
    endereco = '$endereco', 
    bairro = '$bairro',
    cidade = '$cidade',
    estado = '$estado',
    fone = '$fone',
    cel = '$cel',
    email = '$email',
    foto = '$nome_foto'

    WHERE id_agenda = $id_agenda";

    echo $sql;
    $result = mysqli_query($con,$sql);
    if($result){
        echo "<h3>Dados alterados com sucesso!</h3><br>";
    }else{
        echo "<h3>Erro ao alterar dados: ". mysqli_error($con)."!</h3>";
    }
    
?>
 <a href = "listar_agenda.php"><button>Voltar</button></a>