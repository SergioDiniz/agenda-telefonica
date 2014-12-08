<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/7/2014
 * Time: 8:09 AM
 */
include "topHTML.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-6">
                <div class="formulario-cadastro">
                    <form action="cadastro.php" method="post" role="form" >

                        <div class="form-group">
                            <label for="nomeResponsavel">seu nome:</label>
                            <input type="text" name="nomeResponsavel" id="nomeResponsavel" class="form-control input-lg"  value="<?php echo $cadastro['nomeResponsavel'] ?>" required/>
                        </div>

                        <div class="form-group">
                            <label for="emailResponsavel">seu email:</label>
                            <input type="email" name="emailResponsavel" id="emailResponsavel" class="form-control input-lg" value="<?php echo $cadastro['emailResponsavel'] ?>" required/>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nomeEstabelecimento">nome do estabelecimento</label>
                                    <input type="text" name="nomeEstabelecimento" id="nomeEstabelecimento" class="form-control input-lg" value="<?php echo $cadastro['nomeEstabelecimento'] ?>"required />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group <?php if($tem_erros && isset($erros['telefone'])){echo 'has-error has-feedback';}?>">
                                    <label for="telefone">telefone: (numeros)</label>
                                    <input type="tel" name="telefone" id="telefone" class="form-control input-lg" placeholder="ex: 55555555" maxlength="8" value="<?php echo $cadastro['telefone'] ?>" required/>
                                    <?php if($tem_erros && isset($erros['telefone'])) : ?>
                                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                        <?php if($tem_erros && isset($erros['telefone'])) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $erros['telefone'] ?>. Se voce não sabe porque <a href="#" class="alert-link">clique aqui.</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">descricao:</label>
                                    <textarea class="form-control" rows="4" maxlength="2000" name="descricao"><?php echo $cadastro['descricao'] ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="rua">rua</label>
                                    <input type="tel" name="rua" id="rua" class="form-control input-lg" value="<?php echo $cadastro['rua'] ?>"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero">numero</label>
                                    <input type="number" name="numero" id="numero" class="form-control input-lg" value="<?php echo $cadastro['numero'] ?>"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complemento">complemento:</label>
                            <input class="form-control input-lg" type="text" id="complemento" name="complemento" value="<?php echo $cadastro['complemento'] ?>"/>
                        </div>
                        
                        <div class="form-group <?php if($tem_erros){echo 'has-warning has-feedback';}?>">
                            <label for="subcategoria">tipo:</label>
                            <select name="subcategoria" id="" class="form-control input-lg" required>
                                <option disabled style="color: #33a7d8;">Restaurantes:</option>
                                <option name="Pizzaria" selected>Pizzaria</option>
                                <option name="Bares e Churrascaria">Bares e Churrascaria</option>
                                <option name="Padaria">Padaria</option>
                                <option name="Lanches">Lanches</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #a3fd39;">Locais diversos:</option>
                                <option name="Supermercados">Supermercados</option>
                                <option name="Frigorificos">Frigorificos</option>
                                <option name="Postos de Gasolina">Postos de Gasolina</option>
                                <option name="Destribuidoras">Destribuidoras</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #fff533;">Beleza e Estética:</option>
                                <option name="Cabeleireiros">Cabeleireiros</option>
                                <option name="Manicure e Pedicure">Manicure e Pedicure</option>
                                <option name="Padaria">Esteticista</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #f9a54b;">Lojas:</option>
                                <option name="Roupas">Roupas</option>
                                <option name="Moveis">Moveis</option>
                                <option name="Informatica">Informatica</option>
                                <option name="Acessórios">Acessórios</option>
                                <option name="Catalogo">Catalogo</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #f04950;">Serviços Gerais:</option>
                                <option name="Limpeza">Limpeza</option>
                                <option name="Pedreiros">Pedreiros</option>
                                <option name="Mototaxistas">Mototaxistas</option>
                                <option name="Taxistas">Taxistas</option>
                                <option name="Serralheiros">Serralheiros</option>
                                <option name="Serviços Gerais">Serviços Gerais</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #e966ac;">Saúde:</option>
                                <option name="Academias">Academias</option>
                                <option name="Farmacias">Farmacias</option>
                                <option name="Clínicas">Clínicas</option>
                                <option name="Consultórios">Consultórios</option>
                                <option name="Hospitais">Hospitais</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #b868ad;">Hoteis e Pousadas:</option>
                                <option name="Pousada">Pousada</option>
                                <option name="Hoteis">Hoteis</option>
                                <option name="Motéis">Motéis</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #8869ad;">Automóveis:</option>
                                <option name="Oficinas">Oficinas</option>
                                <option name="Concessionárias">Concessionárias</option>
                                <option name="Auto Escola">Auto Escola</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #3276b5;">Educação:</option>
                                <option name="Escolas">Escolas</option>
                                <option name="Reforço">Reforço</option>
                                <option name="Professor de Música">Professor de Música</option>
                                <option name="Professor de Dança">Professor de Dança</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #00a88f;">Informática:</option>
                                <option name="Provedor de Internet">Provedor de Internet</option>
                                <option name="Assistência Técnica">Assistência Técnica</option>
                                <option name="Desenvolvedor de Softwares">Desenvolvedor de Softwares</option>
                                <option name="Lan Houses">Lan Houses</option>
                                <option name="Cursos e Treinamento">Cursos e Treinamento</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #f37020;">Publicos:</option>
                                <option name="Prefeitura">Prefeitura</option>
                                <option name="Secretarias">Secretarias</option>
                                <option name="Orelhões">Orelhões</option>
                                <option name="Segurança">Segurança</option>
                                <option name="Serviços Publicos">Serviços Publicos</option>
                                <option disabled>---------------------------------</option>
                                <option disabled style="color: #6b439b;">Outros:</option>
                                <option name="Igrejas">Igrejas</option>
                                <option name="Imobiliárias">Imobiliárias</option>
                                <option name="Bancos">Bancos</option>
                                <option name="Funerarias">Funerarias</option>
                                <option name="Pessoal">Pessoal</option>
                                <option name="Outros">Outros</option>
                            </select>
                            <?php if($tem_erros && isset($erros['telefone'])) : ?>
                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                            <?php endif;?>
                        </div>

                        <br/>
                        <input type="checkbox" name="termo" required/> aceito os termos de cadastro.

                        <br/><br/>
                        <input type="submit" value="enviar" class="btn btn-primary btn-lg"/>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br/><br/><br/><br/>

<?php
include "rodapeHTML.php";
?>