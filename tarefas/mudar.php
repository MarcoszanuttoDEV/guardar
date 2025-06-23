<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$iddd=$_POST['idaltera'];

$json = file_get_contents('tarefas.json');
$dadoos = json_decode($json, true);
for ($i=0; $i < count($dadoos) ; $i++) { 
  if ($iddd==$dadoos[$i]['id']) {
    $geral=$dadoos[$i];
    break;
  }
}
// Os inputs la em baixo vão mostrar os valores antigos, o data e o Horario só aceitam valores especificos, que não é igual ao meu json, então tenho que convertelos para esse formato
$data_formatada = date('Y-m-d', strtotime($geral['Data']));
$hora_formatada = date('H:i', strtotime($geral['Horario']));

?>
<h1 style="color: aqua;" >Alterar tarefa</h1>

 
<div class="alternan">
   
 <form class="formnovo" method="post" action="funcoes.php">
    <input type="hidden" name="idaltera" value="<?php echo $geral['id']; ?>"> <!--serve para repassar o valor do id, já que esse valor não passa de form para form-->
 
  <label >Título: <input type="text" name="tituloo" id="titul" required value="<?php echo $geral ['Titulo']; ?>"  style="color: gray;" onfocus="this.style.color='black';"></label> <br>
  <label >Data: <input type="date" name="datta" id="dataa" value="<?php echo  $data_formatada; ?>"  style="color: gray;" onfocus="this.style.color='black';" ></label><br>
  <label >Horario: <input type="time" name="timee" id="hora" value="<?php echo $hora_formatada ?>"  style="color: gray;" onfocus="this.style.color='black';"></label><br>
  <label>Descrição: <input type="text" name="especifica" id="descricaoo" required value="<?php echo $geral ['Descricao']; ?> "  style="color: gray;" onfocus="this.style.color='black';"></label><br>
  <label > Status: <select name="statusss" id="statuss">
<option value="Pendente">Pendete</option>
<option value="concluida">concluida</option>
<option value="atrasada">atrasada</option>
 
 
  </select></label>
  <input type="submit" value="Confirmar" name="confirmar">
 
</form>
 
 
</div>


</body>
</html>