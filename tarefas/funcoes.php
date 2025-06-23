<?php
 
include("index.php");
 
 
 
 
if (isset($_POST['criando'])) {
    $titulo=$_POST['titulo'];
    $dat=$_POST['data'];
    $time=$_POST['horario'];
    $descri=$_POST['descricao'];
    $statu=$_POST['statu'];
   
    guardar($titulo,$dat,$time,$descri, $statu);
}
 
 
 
if (isset($_POST['excluir'])) {
    excluir();
    }
if (isset($_POST['exibir'])) {
 
   exibir();
}
if (isset($_POST['limpar'])) {
 
}
if (isset($_POST['confirmar'])) {
    alterar();
}
 
 
 
 
 
function guardar($titulo,$dat,$time,$descri,$statu){
 
   
   
 
    $json= file_get_contents('tarefas.json');
 
    $dados= json_decode($json, true );
 
    $maior=0;
 
    for ($i=0; $i < count($dados) ; $i++) {
        if ($dados[$i]['id'] > $maior) {
            $maior=$dados[$i]['id'];
        }
    }
    $idmaior=$maior +1;
 
 
   
 
   
   
     
    $informacao=array( 'id'=>$idmaior, 'Titulo'=>$titulo, 'Data'=>$dat, 'Horario'=> $time, 'Descricao'=>$descri, 'status'=>$statu);
 
 
    $dados[]=$informacao;
 
    $novo= json_encode($dados, JSON_PRETTY_PRINT);
    file_put_contents('tarefas.json', $novo);
 
 
}
 
 
 
 
    function exibir(){
       
    $jason= file_get_contents('tarefas.json');
    $dadosgeral= json_decode($jason, true);
  

    //Aqui eu to mexendo na ordem da variavel $dadosgeral e não no json, só seu eu usar file put, ai sim eu troco.

   for ($i=0; $i < count($dadosgeral) -1 ; $i++) {  //esse loop é pra comparar, ele sempre vai vir antes do outro, o -1 serve para ele não chegar no ultimop ja que ele vem antes do outro
   for ($k=$i+1; $k< count($dadosgeral) ; $k++) {  // esse aqui tambem compara, vem depois do i, ou seja, se i tiver no 1 ele ta no dois, vai comparar logo abaixo
    $primeiro= $dadosgeral[$i]['Data'].''.$dadosgeral[$i]['Horario']; // aqui eu junto o elemento Data e o Horario de uma tarefa em uma variavel, para poder ver qual a maior dpois
    $segundo= $dadosgeral[$k]['Data'].''.$dadosgeral[$k]['Horario']; // aqui é o mesmo, só que com o segundo item para comparar depois

      if ($primeiro>$segundo) { // aqui eu comparo os dois, se o pimeiro for maior do que o que vem depois, faz a troca
        $troca=$dadosgeral[$i]; // essa aqui serve só para eu não perder o valor inicial, já que, o a sempre tem que ser menor que j, vindo antes
        $dadosgeral[$i]=$dadosgeral[$k];// aqui o maior(vem antes) vira o menor(ta vindo depois no loop)
        $dadosgeral[$k]=$troca; // aqui o depois recebe o antigo valor do que vem antes, que tava guardado na $troca
    }
   }

}
    
        for ($i=0; $i < count($dadosgeral) ; $i++) { 
            # code...
        
        echo "<div class='a' style='border:1px solid #ccc;  margin:10px 0;'>";
        echo"<h1> Titulo:".$dadosgeral[$i]['Titulo']. "</h1>";
        echo"<h1> Titulo:".$dadosgeral[$i]['Data']." </h1>";
        echo"<h1> Titulo:".$dadosgeral[$i]['Horario'] ."</h1>";
        echo"<h1> Titulo:".$dadosgeral[$i]['Descricao'] ."</h1>";
        echo"<h1> id:".$dadosgeral[$i]['id'] ."</h1>";
        echo "<form method='post' action='funcoes.php'>";
        echo "<input type='submit' name='excluir' value='excluir' >";
     echo "<input type='hidden' name='teste' value='{$dadosgeral[$i]['id']}'>"; //é um input invisivel, não aparece na tela
        echo "</form>";
        echo "<form method='post' action='mudar.php'>";
        echo "<input type='submit' name='alterar' value='alterar' >";
     echo "<input type='hidden' name='idaltera' value='{$dadosgeral[$i]['id']}'>"; //é um input invisivel, não aparece na tela
        echo "</form>";
 echo "</div>";
 
       }
    }






 
 
 
 
function excluir(){
 
   
 
$jason= file_get_contents('tarefas.json');
    $dadosgeraal= json_decode($jason, true);
   
    if ($_POST['excluir']) {  
        $id=$_POST['teste'];  //peguei o valor do hidden la encima
 
for ($i=0; $i < count($dadosgeraal); $i++) {
    if ($id == $dadosgeraal[$i]['id']) {
     unset($dadosgeraal[$i]);  
     $dadosgeraal = array_values($dadosgeraal); // reorganiza os índices
     $decodifica= json_encode($dadosgeraal, JSON_PRETTY_PRINT);
     file_put_contents('tarefas.json', $decodifica);
   
    }
}
 
 }
   
 exibir(); // chama a função de exibir de novo depois de excluir
}  
 
 
 
 
function alterar(){
   
$json= file_get_contents('tarefas.json');
    $dadosg= json_decode($json, true);
 
    if (isset($_POST['confirmar'])) {
        $idd=$_POST['idaltera'];
 
 
 
for ($i=0; $i < count($dadosg)  ; $i++) {
    if ($idd== $dadosg[$i]['id']) {
 
$dadosg[$i]['Titulo'] = $_POST['tituloo'];
$dadosg[$i]['Data'] = $_POST['datta'];
$dadosg[$i]['Horario'] = $_POST['timee'];
$dadosg[$i]['Descricao'] = $_POST['especifica'];
$dadosg[$i]['status'] = $_POST['statusss'];
 
 
    }
}
$alter=json_encode($dadosg, JSON_PRETTY_PRINT);
file_put_contents('tarefas.json',$alter );
    }
 
}
 
 
?>