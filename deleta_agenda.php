<?php
include('conexao.php');
$id_agenda = $_GET['id_agenda'];

$sql = "DELETE FROM agenda WHERE id_agenda = $id_agenda";

echo $sql;

$result = mysqli_query($con,$sql);

if($result)
{
    echo "<h3>Dados deletados com sucesso!</h3><br>";
}else{
    echo "<h3>Erro ao deletar dados: ". mysqli_error($con)."!</h3>";
}

?>
<a href = "listar_agenda.php"><button>Voltar</button></a>