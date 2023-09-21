<?php
$sHost      = '127.0.0.1';
$sPort      = '5432';
$sDbName    = 'IPM';
$sUser      = 'postgres';
$sPassword  = 'postgresql';

$sConexao   = "host=$sHost
               port=$sPort
               dbname=$sDbName
               user=$sUser
               password=$sPassword";

$oConexao   = pg_connect($sConexao);


if (isset($_POST['sCidade'])) {
    
    $sCidade = $_POST['sCidade'];
    $sInsert = "INSERT INTO MERCADO.TBCIDADE (CIDNOME)"
            .  "       VALUES('$sCidade')" ;  
    insert($oConexao,$sInsert);
    
} else if (isset($_GET['cidade'])){
    
            $cidade = $_GET['cidade'];
            $sDelete = "DELETE FROM MERCADO.TBCIDADE WHERE CIDCODIGO = '$cidade'";  
            deletar($oConexao,$sDelete);
    
} else if (isset($_POST['cliNome']) && isset($_POST['cliCPF']) ){
    
          $nome = $_POST['cliNome'];
          $cpf = $_POST['cliCPF'];
          $cidade = $_POST['cliCity'];
          $sInsert = "INSERT INTO MERCADO.TBCLIENTE (CLINOME,CLICPF,CIDCODIGO)"
                          . "values ('$nome','$cpf','$cidade')";
          insert($oConexao,$sInsert);
            
} else if (isset($_GET['codigocli'])){
    
        $codigo = $_GET['codigocli'];
        $sDelete = "DELETE FROM MERCADO.TBCLIENTE WHERE CLICODIGO = '$codigo'"; 
        deletar($oConexao,$sDelete);
    
} if (isset($_POST['sCategoria'])){
     
        $sCategoria = $_POST['sCategoria'];
        $sInsert = "INSERT INTO MERCADO.TBCATEGORIA (CATDESCRICAO)"
                .  "       VALUES('$sCategoria')" ;  
        insert($oConexao,$sInsert);   
} else if (isset($_GET['codigocat'])){
    
        $codigo = $_GET['codigocat'];
        $sDelete = "DELETE FROM MERCADO.TBCATEGORIA WHERE CATCODIGO = '$codigo'"; 
        deletar($oConexao,$sDelete);
    
} else if (isset($_POST['forNome']) && isset($_POST['forCNPJ']) ){
    
            $nome = $_POST['forNome'];
            $cnpj = $_POST['forCNPJ'];
            $cidade = $_POST['forCity'];
            $sInsert = "INSERT INTO MERCADO.TBFORNECEDOR (FORNOME,FORCNPJ,CIDCODIGO)"
                            . "values ('$nome','$cnpj','$cidade')";
            insert($oConexao,$sInsert);
            
} else if (isset($_GET['codigofor'])){
    
        $codigo = $_GET['codigofor'];
        $sDelete = "DELETE FROM MERCADO.TBFORNECEDOR WHERE FORCODIGO = '$codigo'"; 
        deletar($oConexao,$sDelete);
        
} if (isset($_POST['sDepartamento'])){
     
        $departamento = $_POST['sDepartamento'];
        $sInsert = "INSERT INTO MERCADO.TBDEPARTAMENTO (DPTDESCRICAO)"
                .  "       VALUES('$departamento')" ;  
        insert($oConexao,$sInsert);   
        
} else if (isset($_GET['departamento'])){
    
    $departamento = $_GET['departamento'];
    $sDelete = "DELETE FROM MERCADO.TBDEPARTAMENTO WHERE DPTCODIGO = '$departamento'"; 
    deletar($oConexao,$sDelete);
    
} else if (isset($_POST['funNome'])){
    
          $nome = $_POST['funNome'];
          $departamento = $_POST['funDep'];
          $sInsert = "INSERT INTO MERCADO.TBFUNCIONARIO (FCNNOME,DPTCODIGO)"
                          . "values ('$nome','$departamento')";
          insert($oConexao,$sInsert);
            
} else if (isset($_GET['codigofcn'])){
    
        $codigo = $_GET['codigofcn'];
        $sDelete = "DELETE FROM MERCADO.TBFUNCIONARIO WHERE FCNCODIGO = '$codigo'"; 
        deletar($oConexao,$sDelete);
    
} else if (isset($_POST['proNome'])){
    
          $nome = $_POST['proNome'];
          $descricao = $_POST['proDescricao'];
          $valor = $_POST['proValor'];
          $estoque = $_POST['proEstoque'];
          $categoria = $_POST['proCat'];
          $fornecedor = $_POST['proFor'];
          $sInsert = "INSERT INTO MERCADO.TBPRODUTO (PRONOME,PRODESCRICAO,PROVALOR,PROESTOQUE,CATCODIGO,FORCODIGO)"
                          . "values ('$nome','$descricao','$valor','$estoque','$categoria','$fornecedor')";
          insert($oConexao,$sInsert);
            
} else if (isset($_GET['codigopro'])){
    
    $codigo = $_GET['codigopro'];
    $sDelete = "DELETE FROM MERCADO.TBPRODUTO WHERE PROCODIGO = '$codigo'"; 
    deletar($oConexao,$sDelete);
}






//FUNCOES

function insert($oConexao,$sInsert) {
    
pg_query($oConexao,$sInsert);
 header('Location: ' .$_SERVER['HTTP_REFERER']); 
 
}

function selectCid($oConexao){
$sSelect = "select * from mercado.tbcidade";
$oResult = pg_query($oConexao,$sSelect);
$array = [];
$iCidade = '';

echo '<table>'; 
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Descrição</th>';
echo     '<th>Ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<tr>';
    echo   '<td>'.$array['cidcodigo'].'</td>';
    echo   '<td>'.$array['cidnome'].'</td>';
    $iCidade = $array['cidcodigo'];
    echo   '<td> <a href="index.php?cidade='.$iCidade.'">deletar</a></td>';
    echo '/<tr>';
}
echo '</table>'; 
}

function deletar($oConexao,$sDelete) {    
    
pg_query($oConexao,$sDelete);
}

function optionCid($oConexao){
$sSelect = "select * from mercado.tbcidade";
$oResult = pg_query($oConexao,$sSelect);
$array = [];   

while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<option value='.$array['cidcodigo'].'>'.$array['cidnome'].'</option>'; 
}  
}

function selectCli($oConexao) {
$sSelect = "SELECT TBCLIENTE.CLICODIGO,TBCLIENTE.CLINOME,TBCLIENTE.CLICPF,TBCIDADE.CIDCODIGO,TBCIDADE.CIDNOME 
                   FROM MERCADO.TBCLIENTE
                   JOIN MERCADO.TBCIDADE
                   ON TBCIDADE.CIDCODIGO= TBCLIENTE.CIDCODIGO ";
$oResult = pg_query($oConexao,$sSelect);
$array = [];    
    
echo '<table>';
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Nome</th>';
echo     '<th>cpf</th>';
echo     '<th>cidade-código</th>';
echo     '<th>cidade-nome</th>';
echo     '<th>ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
      $array = $aResult;   
echo   '<tr>';
 echo   '<td>'.$array['clicodigo'].'</td>';
 echo   '<td>'.$array['clinome'].'</td>';
 echo   '<td>'.$array['clicpf'].'</td>';
 echo   '<td>'.$array['cidcodigo'].'</td>';
 echo   '<td>'.$array['cidnome'].'</td>';
 $codigo = $array['clicodigo'];
 echo   '<td><a href="index.php?codigocli='.$codigo.'">deletar</a></td>';
echo   '</tr>';
}                   
echo '</table>';
}

function selectCat($oConexao){
$sSelect = "select * from mercado.tbcategoria";
$oResult = pg_query($oConexao,$sSelect);
$array = [];
$cidade = '';

echo '<table>'; 
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Descrição</th>';
echo     '<th>Ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<tr>';
    echo   '<td>'.$array['catcodigo'].'</td>';
    echo   '<td>'.$array['catdescricao'].'</td>';
    $codigo = $array['catcodigo'];
    echo   '<td> <a href="index.php?codigocat='.$codigo.'">deletar</a></td>';
    echo '/<tr>';
}
echo '</table>'; 
}

function selectFor($oConexao) {
$sSelect = "SELECT TBFORNECEDOR.FORCODIGO,TBFORNECEDOR.FORNOME,TBFORNECEDOR.FORCNPJ,TBCIDADE.CIDCODIGO,TBCIDADE.CIDNOME 
                   FROM MERCADO.TBFORNECEDOR
                   JOIN MERCADO.TBCIDADE
                   ON TBCIDADE.CIDCODIGO= TBFORNECEDOR.CIDCODIGO ";
$oResult = pg_query($oConexao,$sSelect);
$array = [];    
    
echo '<table>';
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Nome</th>';
echo     '<th>Cnpj</th>';
echo     '<th>cidade-código</th>';
echo     '<th>cidade-nome</th>';
echo     '<th>ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
      $array = $aResult;   
echo   '<tr>';
 echo   '<td>'.$array['forcodigo'].'</td>';
 echo   '<td>'.$array['fornome'].'</td>';
 echo   '<td>'.$array['forcnpj'].'</td>';
 echo   '<td>'.$array['cidcodigo'].'</td>';
 echo   '<td>'.$array['cidnome'].'</td>';
 $codigo = $array['forcodigo'];
 echo   '<td><a href="index.php?codigofor='.$codigo.'">deletar</a></td>';
echo   '</tr>';
}                   
echo '</table>';
}

function selectDep($oConexao){
$sSelect = "select * from mercado.tbdepartamento";
$oResult = pg_query($oConexao,$sSelect);
$array = [];


echo '<table>'; 
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Descrição</th>';
echo     '<th>Ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<tr>';
    echo   '<td>'.$array['dptcodigo'].'</td>';
    echo   '<td>'.$array['dptdescricao'].'</td>';
    $departamento = $array['dptcodigo'];
    echo   '<td> <a href="index.php?departamento='.$departamento.'">deletar</a></td>';
    echo '/<tr>';
}
echo '</table>'; 
}

function optionFun($oConexao){
$sSelect = "select * from mercado.tbdepartamento";
$oResult = pg_query($oConexao,$sSelect);
$array = [];   

while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<option value='.$array['dptcodigo'].'>'.$array['dptdescricao'].'</option>'; 
}  
}

function selectFun($oConexao){
$sSelect = "SELECT TBFUNCIONARIO.FCNCODIGO,TBFUNCIONARIO.FCNNOME,TBDEPARTAMENTO.DPTCODIGO,TBDEPARTAMENTO.DPTDESCRICAO
                   FROM MERCADO.TBFUNCIONARIO
                   JOIN MERCADO.TBDEPARTAMENTO
                   ON TBDEPARTAMENTO.DPTCODIGO= TBFUNCIONARIO.DPTCODIGO";
$oResult = pg_query($oConexao,$sSelect);
$array = [];    
    
echo '<table>';
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Funcionario</th>';
echo     '<th>Departamento-código</th>';
echo     '<th>Departamento-código</th>';
echo     '<th>ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
      $array = $aResult;   
echo   '<tr>';
 echo   '<td>'.$array['fcncodigo'].'</td>';
 echo   '<td>'.$array['fcnnome'].'</td>';
 echo   '<td>'.$array['dptcodigo'].'</td>';
 echo   '<td>'.$array['dptdescricao'].'</td>';
 $codigo = $array['fcncodigo'];
 echo   '<td><a href="index.php?codigofcn='.$codigo.'">deletar</a></td>';
echo   '</tr>';
}                   
echo '</table>';
}

function  selectPro($oConexao){
$sSelect = "SELECT TBPRODUTO.PROCODIGO, TBPRODUTO.PRONOME, TBPRODUTO.PRODESCRICAO,
                   TBPRODUTO.PROVALOR, TBPRODUTO.PROESTOQUE, TBCATEGORIA.CATDESCRICAO,
                   TBFORNECEDOR.FORNOME
	      FROM MERCADO.TBPRODUTO
	      JOIN MERCADO.TBCATEGORIA
                   ON TBCATEGORIA.CATCODIGO= TBPRODUTO.CATCODIGO
	      JOIN MERCADO.TBFORNECEDOR
	           ON TBFORNECEDOR.FORCODIGO = TBPRODUTO.FORCODIGO";
$oResult = pg_query($oConexao,$sSelect);
$array = [];    
    
echo '<table>';
echo   '<tr>';
echo     '<th>Código</th>';
echo     '<th>Nome</th>';
echo     '<th>Descricao</th>';
echo     '<th>Valor</th>';
echo     '<th>Estoque</th>';
echo     '<th>Categoria</th>';
echo     '<th>Fornecedor</th>';
echo     '<th>ações</th>';
echo   '</tr>';
while($aResult = pg_fetch_assoc($oResult)) {
      $array = $aResult;   
echo   '<tr>';
 echo   '<td>'.$array['procodigo'].'</td>';
 echo   '<td>'.$array['pronome'].'</td>';
 echo   '<td>'.$array['prodescricao'].'</td>';
 echo   '<td>'.$array['provalor'].'</td>';
 echo   '<td>'.$array['proestoque'].'</td>';
 echo   '<td>'.$array['catdescricao'].'</td>';
 echo   '<td>'.$array['fornome'].'</td>';
 $codigo = $array['procodigo'];
 echo   '<td><a href="index.php?codigopro='.$codigo.'">deletar</a></td>';
echo   '</tr>';
}                   
echo '</table>';
}  

function optionProCat($oConexao){
$sSelect = "select * from mercado.tbcategoria";
$oResult = pg_query($oConexao,$sSelect);
$array = [];   

while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<option value='.$array['catcodigo'].'>'.$array['catdescricao'].'</option>'; 
}  
}

function optionProFor($oConexao){
$sSelect = "select * from mercado.tbfornecedor";
$oResult = pg_query($oConexao,$sSelect);
$array = [];   

while($aResult = pg_fetch_assoc($oResult)) {
    $array = $aResult;
    echo '<option value='.$array['forcodigo'].'>'.$array['fornome'].'</option>'; 
}  
}