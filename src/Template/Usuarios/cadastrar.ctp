<div class="container-fluid col-xs-9 col-lg-9 col-md-9 col-sm-9 cadastro">
    <div class="row-fluid col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <section class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
          <fieldset>
            <legend>Cadastro de Atendente</legend>
                <form method="post" accept-charset="utf-8" action="" id="">
                    <div class="form-group col-xs-6 col-lg-6 col-md-6 col-sm-6" id="">
                      <div class="input-group">
                        <div class="input-group clearfix">
                            <input type="hidden" name="_method" value="POST"/>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="nome">Nome:</label>
                            <?php echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Insira seu Nome Completo', 'autofocus' => 'true']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="cpf">CPF:</label>
                            <?php echo $this->Form->text('cpf', ['class' => 'form-control', 'id' => 'cpf', 'placeholder' => 'Insira seu CPF']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="rg">RG:</label>
                            <?php echo $this->Form->text('rg', ['class' => 'form-control', 'id' => 'rg', 'placeholder' => 'Insira seu RG']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="orgao_expedidor">Órgão Expedidor:</label>
                            <select class="form-control input-sm" name="orgao_expedidor" >
                                <option></option>
                                <?php foreach ($orgaos as $orgao): ?>
                                    <option value="<?php echo $orgao['id_orgao_expedidor']; ?>"><?php echo $orgao['nome']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="" />
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="estado_civil">Estado Civil:</label>
                            <select class="form-control input-sm" name="estado_civil" >
                                <option></option>
                                <?php foreach ($estCivil as $estado): ?>
                                    <option value="<?php echo $estado['id_estado_civil']; ?>"><?php echo $estado['descricao']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <?php echo $this->Form->hidden('id', ['value' => 'tipo_pessoa']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="email">Email:</label>
                            <?php echo $this->Form->email('email', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Insira seu E-mail']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="password">Senha:</label>
                            <?php echo $this->Form->password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Insira seu Senha']); ?>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-xs-6 col-lg-6 col-md-6 col-sm-6" id="">
                      <div class="input-group">
                        <div class="input-group input-group-sm">
                            <label for="logradouro">Logradouro:</label>
                            <select class="form-control input-sm" name="logradouro" >
                                <option></option>
                                <!-- <?php foreach ($orgaos as $orgao): ?> -->
                                <!--    <option value="<?php echo $orgao['id_orgao_expedidor']; ?>"><?php echo $orgao['nome']; ?> </option> -->
                                <!-- <?php endforeach; ?> -->
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="complemento">Complemento:</label>
                            <?php echo $this->Form->text('complemento', ['class' => 'form-control', 'id' => 'complemento', 'placeholder' => 'Insira o Complemento do Endereço']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="numero">Número:</label>
                            <?php echo $this->Form->text('numero', ['class' => 'form-control', 'id' => 'numero', 'placeholder' => 'Insira o Número do Complemento do Endereço']); ?>
                        </div>
                        <div class="input-group input-group-sm">
                            <label for="cep">CEP:</label>
                            <?php echo $this->Form->text('cep', ['class' => 'form-control', 'id' => 'cep', 'placeholder' => 'Insira o CEP']); ?>
                        </div>

                        <br/>
                        <div class=" btn-group">
                            <button type="submit" class="btn btn-success" id="btn_cadastrar">Cadastrar</button>
                        </div>
                        <div class="alert-danger text-center message clearfix" role="alert" id="div_message_erro_login">
                            <?php echo $this->Flash->render() ?>
                        </div>
                      </div>
                    </div>
                </form>
          </fieldset>
        </section>
    </div>
</div>
