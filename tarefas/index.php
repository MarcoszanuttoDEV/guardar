<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
 
 
<div class="titulooo"><h1>Geerenciador de tarefas</h1></div>
   
    <form action="funcoes.php" method="post">
 
<div class="geral">
 
<h3> Titulo da Tarefa: <input type="text" placeholder="Titulo" name="titulo" required></h3>
<input type="date" name="data" required> <br>
<input type="time" name="horario" >  
<h3>Descrição: <input type="text" placeholder="Especifique" name="descricao" ></h3>
<label > Status: <select name="statu" >
<option value="Pendente">Pendete</option>
<option value="concluida">concluida</option>
<option value="atrasada">atrasada</option>
 </select></label>

 <input type="submit" value="criar" name="criando">
</div>
 
 
 </form>
   
 <form action="funcoes.php" method="post">
<h1>exibir</h1>
<input type="submit" value="mostrar" name="exibir">
<input type="submit" value="limpar" name="limpar">
 
 
 </form>
 
   
   
   
    <?php
   
 
   
    ?>
</body>
</html>