<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/6/2014
 * Time: 8:37 PM
 */

include "topHTML.php";
if(!isset($_GET['pesquisa']) && !isset($_GET['letra']) && !isset($_GET['categoria']) && !isset($_GET['numerico']) ){
    header('Location: index.php');
}
?>



<div class="container">
    <br/>
    <span style="font-size: 1.71em; color: #888; text-decoration: underline">
        resultado de busca para:
        <?php
            if(isset($_POST['pesquisa'])){
                echo $_POST['pesquisa'];
            }

            if(isset($_GET['letra'])){
                echo 'letra ' . $_GET['letra'];
            }

            if(isset($_GET['categoria'])){
                echo $_GET['categoria'];
            }
        ?></span>
    <br/>
    <hr/>
    <br/>



        <div class="area-resultado-pesquisa"> <!-- INICIO  AREA RESULTADO PESQUISA-->

            <?php

                foreach($resultados as $resultado) : ?>
                <div class="resultado-pesquisa pesquisa-categoria-<?php echo $resultado['categoria']?>"> <!-- INICIO RESULTADO PESQUISA-->
                    <div class="row">
                        <div class="col-md-5">
                            <span class="pesquisa-estabelecimento"><?php echo $resultado['nomeEstabelecimento']?></span><br/>
                            <span class="pesquisa-subcategoria"><?php echo $resultado['subcategoria']?></span>
                        </div>

                        <div class="col-md-3">
                            <table class="tabela-telefones">
                                <tr>
                                    <td rowspan="2"><span>Telefone:</span></td>
                                    <td><span class="pesquisa-telefone">(83) <?php echo $resultado['telefone']?></span></td>
                                </tr>
                                <!-- <tr><td><span class="pesquisa-telefone">(83) 96551233</span></td></tr> -->
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="pesquisa-descricao">
                                <?php echo $resultado['descricao']?>

                            </div>
                            <div class="pesquisa-endereco">
                                Endereço: <br/>
                                Rua: <?php
                                        if($resultado['rua'] <> ''){echo $resultado['rua'] . ', ';};
                                        if($resultado['numero'] <> -1){echo 'nº ' . $resultado['numero'];};
                                     ?> <br/>
                                Complemento: <?php echo $resultado['complemento']?> <br/>
                                Responsável: <?php echo $resultado['nomeResponsavel']?>
                            </div>
                        </div>
                    </div>
                </div> <!-- FIM RESULTADO PESQUISA-->

                <br/>
            <?php endforeach; ?>
        </div> <!-- FIM area-resultado-pesquisa -->

        <div class="row">
            <div class="col-md-12">
                <div class="paginacao">
                    <nav>
                        <ul class="pagination">
                            <?php for($i = 1; $i < $numPaginas + 1; $i++) : ?>
                                <li <?php if( (!isset($_GET['pagina']) && $i == 1) or (isset($_GET['pagina']) && $i == $_GET['pagina'])) {echo "class='active'";} ?> >
                                    <?php if(isset($_GET['letra'])):?>
                                        <a href="pesquisa.php?letra=<?php echo $_GET['letra']?>&pagina=<?php echo $i?>"><?php echo $i?></a>
                                    <?php endif;?>

                                    <?php if(isset($_GET['categoria'])):?>
                                        <a href="pesquisa.php?categoria=<?php echo $_GET['categoria']?>&pagina=<?php echo $i?>"><?php echo $i?></a>
                                    <?php endif;?>

                                    <?php if(isset($_GET['pesquisa'])):?>
                                        <a href="pesquisa.php?pesquisa=<?php echo $_GET['pesquisa']?>&pagina=<?php echo $i?>"><?php echo $i?></a>
                                    <?php endif;?>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

</div> <!-- FIM CONTAINER -->

    <br/><br/>
<?php include "rodapeHTML.php"; ?>