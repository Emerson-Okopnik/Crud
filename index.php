<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Mercado do Billy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    </head>
    <body>
        <?php include ('main.php'); ?>
        <div id="container1">
            <h3>Cidade.php</h3>
            <hr>
            <div class="nav menu"> 
                <ul class="nav-list "> 
                    <li><a href="#categoria">Categoria</a> | </li> 
                    <li><a href="#departamento">Departamento</a> | </li> 
                    <li><a href="#cidade">Cidade</a> | </li> 
                    <li><a href="#cliente">Cliente</a> | </li> 
                    <li><a href="#fornecedor">Fornecedor</a> | </li> 
                    <li><a href="#funcionario">Funcionario</a> | </li> 
                    <li><a href="#produto">Produto</a></li> 
                </ul>

            </div>
            <div id='cidadediv'>
                <fieldset> <legend id="cidade">Listagem de Cidades</legend>
                   <?php
                     selectCid($oConexao);                   
                   ?>
                </fieldset>
                <fieldset> <legend>Cadastro da Cidade</legend>
                    <form action="index.php" method="post">
                        <table>  
                            <tr>
                                <th>Nome:</th>
                                <th><input type="text" name="sCidade" required="required"></th> 
                            </tr>
                            <tr>                          
                                <td colspan="2"><input type="submit" value="Enviar" name="button" class="botao"></td>
                            </tr>    
                        </table>
                    </form>    
                </fieldset>
            </div>
            <hr>
            <div id="clientediv">
                  <h3>Cliente.php</h3>
                  <hr>
                  <div class="nav menu"> 
                   <ul class="nav-list "> 
                        <li><a href="#categoria">Categoria</a> | </li> 
                        <li><a href="#departamento">Departamento</a> | </li> 
                        <li><a href="#cidade">Cidade</a> | </li> 
                        <li><a href="#cliente">Cliente</a> | </li> 
                        <li><a href="#fornecedor">Fornecedor</a> | </li> 
                        <li><a href="#funcionario">Funcionario</a> | </li> 
                        <li><a href="#produto">Produto</a></li> 
                   </ul>
            </div>
            <fieldset> <legend id="cliente">Listagem de clientes</legend>
               <?php
                  selectCli($oConexao);            
               ?>
            </fieldset>
                  <fieldset> <legend>Cadastro de cliente</legend>
                <form action="index.php" method="post"> 
                <table>
                    <tr>
                      <th>Nome:</th>
                      <th> <input type="text" name="cliNome" required="required"></th>
                    </tr> 
                    <tr>
                        <td>CPF:</td>
                        <td><input type="text" name="cliCPF"  required="required"></td>
                    </tr>
                    <tr>
                        <td>Cidade:</td>
                        <td>
                            <select name="cliCity">
                                <option>Escolha...</option>
                                <?php 
                                  optionCid($oConexao)
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" class="botao"></td>          
                    </tr>
                 </table>
                </form>    
            </fieldset>
            </div>
            <hr>
        </div>
        
        <div id="container2">
            <h3>Categoria.php</h3>
            <hr>
            <div class="nav menu"> 
                <ul class="nav-list "> 
                    <li><a href="#categoria">Categoria</a> | </li> 
                    <li><a href="#departamento">Departamento</a> | </li> 
                    <li><a href="#cidade">Cidade</a> | </li> 
                    <li><a href="#cliente">Cliente</a> | </li> 
                    <li><a href="#fornecedor">Fornecedor</a> | </li> 
                    <li><a href="#funcionario">Funcionario</a> | </li> 
                    <li><a href="#produto">Produto</a></li> 
                </ul>
            </div>
            <div id='produtodiv'>
                <fieldset> <legend id="categoria">Listagem de Categorias</legend>
                   <?php
                     selectCat($oConexao);                   
                   ?>
                </fieldset>
                <fieldset> <legend>Categorias</legend>
                    <form action="index.php" method="post">
                        <table>  
                            <tr>
                                <th>Nome:</th>
                                <th><input type="text" name="sCategoria" required="required"></th> 
                            </tr>
                            <tr>                          
                                <td colspan="2"><input type="submit" value="Enviar" name="button" class="botao"></td>
                            </tr>    
                        </table>
                    </form>    
                </fieldset>
            </div>
            <hr>
            <div id="fornecedordiv">
                  <h3>Fornecedor.php</h3>
                  <hr>
                  <div class="nav menu"> 
                    <ul class="nav-list "> 
                        <li><a href="#categoria">Categoria</a> | </li> 
                        <li><a href="#departamento">Departamento</a> | </li> 
                        <li><a href="#cidade">Cidade</a> | </li> 
                        <li><a href="#cliente">Cliente</a> | </li> 
                        <li><a href="#fornecedor">Fornecedor</a> | </li> 
                        <li><a href="#funcionario">Funcionario</a> | </li> 
                        <li><a href="#produto">Produto</a></li> 
                    </ul>
            </div>
            <fieldset> <legend id="fornecedor">Listagem de fornecedoreses</legend>
               <?php
                  selectFor($oConexao);            
               ?>
            </fieldset>
                  <fieldset> <legend>Cadastro de Fornecedores</legend>
                <form action="index.php" method="post"> 
                <table>
                    <tr>
                      <th>Nome:</th>
                      <th> <input type="text" name="forNome" required="required"></th>
                    </tr> 
                    <tr>
                        <td>CNPJ:</td>
                        <td><input type="text" name="forCNPJ"  required="required"></td>
                    </tr>
                    <tr>
                        <td>Cidade:</td>
                        <td>
                            <select name="forCity">
                                <option>Escolha...</option>
                                <?php 
                                  optionCid($oConexao)
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" class="botao"></td>          
                    </tr>
                 </table>
                </form>    
            </fieldset>
            </div>
            <hr>
        </div>
        
        <div id="container3">
            <h3>Departamento.php</h3>
            <hr>
            <div class="nav menu"> 
                <ul class="nav-list "> 
                    <li><a href="#categoria">Categoria</a> | </li> 
                    <li><a href="#departamento">Departamento</a> | </li> 
                    <li><a href="#cidade">Cidade</a> | </li> 
                    <li><a href="#cliente">Cliente</a> | </li> 
                    <li><a href="#fornecedor">Fornecedor</a> | </li> 
                    <li><a href="#funcionario">Funcionario</a> | </li> 
                    <li><a href="#produto">Produto</a></li>  
                </ul>
            </div>
            <div id='departamentodiv'>
                <fieldset> <legend id="departamento">Listagem de Departamentos</legend>
                   <?php
                     selectDep($oConexao);                   
                   ?>
                </fieldset>
                <fieldset> <legend>Departamento</legend>
                    <form action="index.php" method="post">
                        <table>  
                            <tr>
                                <th>Descrição:</th>
                                <th><input type="text" name="sDepartamento" required="required"></th> 
                            </tr>
                            <tr>                          
                                <td colspan="2"><input type="submit" value="Enviar" name="button" class="botao"></td>
                            </tr>    
                        </table>
                    </form>    
                </fieldset>
            </div>
            <hr>
            <div id="funcionariodiv">
                  <h3>Funcionario.php</h3>
                  <hr>
                  <div class="nav menu"> 
                    <ul class="nav-list "> 
                        <li><a href="#categoria">Categoria</a> | </li> 
                        <li><a href="#departamento">Departamento</a> | </li> 
                        <li><a href="#cidade">Cidade</a> | </li> 
                        <li><a href="#cliente">Cliente</a> | </li> 
                        <li><a href="#fornecedor">Fornecedor</a> | </li> 
                        <li><a href="#funcionario">Funcionario</a> | </li> 
                        <li><a href="#produto">Produto</a></li> 
                    </ul>
            </div>
            <fieldset> <legend id="funcionario">Listagem de funcionarios</legend>
               <?php
                  selectFun($oConexao);            
               ?>
            </fieldset>
                  <fieldset> <legend>Cadastro de Funcionarios</legend>
                <form action="index.php" method="post"> 
                <table>
                    <tr>
                      <th>Nome:</th>
                      <th> <input type="text" name="funNome" required="required"></th>
                    </tr> 
                    <tr>
                        <td>Departameto:</td>
                        <td>
                            <select name="funDep">
                                <option>Escolha...</option>
                                <?php 
                                optionFun($oConexao);
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" class="botao"></td>          
                    </tr>
                 </table>
                </form>    
            </fieldset>
            </div>
            <hr>
        </div>
        
        <div id="container4">
            <div id="produtodiv">
            <h3>Produto.php</h3>
            <hr>
            <div class="nav menu"> 
                <ul class="nav-list "> 
                    <li><a href="#categoria">Categoria</a> | </li> 
                    <li><a href="#departamento">Departamento</a> | </li> 
                    <li><a href="#cidade">Cidade</a> | </li> 
                    <li><a href="#cliente">Cliente</a> | </li> 
                    <li><a href="#fornecedor">Fornecedor</a> | </li> 
                    <li><a href="#funcionario">Funcionario</a> | </li> 
                    <li><a href="#produto">Produto</a></li> 
                </ul>
            </div>
            <fieldset> <legend id="produto">Listagem de Produtos</legend>
                   <?php
                     selectPro($oConexao);                   
                   ?>
            </fieldset>
            <fieldset> <legend>Cadastro de Produtos</legend>
                <form action="index.php" method="post"> 
                <table>
                    <tr>
                      <th>Nome:</th>
                      <th> <input type="text" name="proNome" required="required"></th>
                    </tr> 
                    <tr>
                        <td>Descricao:</td>
                        <td><input type="text" name="proDescricao"  required="required"></td>
                    </tr>
                    <tr>
                        <td>Valor:</td>
                        <td><input type="number" name="proValor"  step="0.1" required="required"></td>
                    </tr>
                     <tr>
                        <td>Estoque:</td>
                        <td><input type="number" name="proEstoque"  required="required"></td>
                    </tr>
                    <tr>
                        <td>Categoria:</td>
                        <td>
                            <select name="proCat">
                                <option>Escolha...</option>
                                <?php 
                                   optionProCat($oConexao)
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>fornecedor:</td>
                        <td>
                            <select name="proFor">
                                <option>Escolha...</option>
                                <?php 
                                   optionProFor($oConexao)
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" value="Enviar" class="botao"></td>          
                    </tr>
                 </table>
                </form>    
            </fieldset>
            </div>
        </div>
    </body>
</html>
