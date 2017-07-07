<div class="container col-md-9 cadastro">
    <div class="col-md-12">
        <h3 class="page-header">Cadastro de Atendente</h3>
    </div>
    <div class="col-md-12">
        <form method="post" accept-charset="utf-8" action="/usuarios/cadastrar" id="">
          <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="nome" class="control-label">Nome:</label>
                      <?php echo $this->Form->text('nome', ['class' => 'form-control input-sm', 'id' => 'nome', 'placeholder' => 'Insira seu Nome Completo', 'autofocus' => 'true']); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="cpf" class="control-label">CPF:</label>
                      <?php echo $this->Form->text('cpf', ['class' => 'form-control input-sm', 'id' => 'cpf', 'placeholder' => 'Insira seu CPF']); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="rg" class="control-label">RG:</label>
                      <?php echo $this->Form->text('rg', ['class' => 'form-control input-sm', 'id' => 'rg', 'placeholder' => 'Insira seu RG']); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="orgao_expedidor" class="control-label">Órgão Expedidor:</label>
                      <select class="form-control input-sm" name="orgao_expedidor" >
                          <option></option>
                          <?php foreach ($orgaos as $orgao): ?>
                              <option value="<?php echo $orgao['id_orgao_expedidor']; ?>"><?php echo $orgao['nome']; ?> </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="data_nascimento" class="control-label">Data de Nascimento:</label>
                      <input type="date" name="data_nascimento" id="data_nascimento" class="form-control input-sm" value="" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="estado_civil" class="control-label">Estado Civil:</label>
                      <select class="form-control input-sm" name="estado_civil" >
                          <option></option>
                          <?php foreach ($estCivil as $estado): ?>
                              <option value="<?php echo $estado['id_estado_civil']; ?>"><?php echo $estado['descricao']; ?> </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="logradouro" class="control-label">Logradouro:</label>
                      <select class="form-control input-sm" name="logradouro" >
                          <option></option>
                          <?php foreach ($logradouros as $log): ?>
                          <option value="<?php echo $log['id_logradouro']; ?>"><?php echo $log['nome']; ?> </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="complemento" class="control-label">Complemento:</label>
                      <?php echo $this->Form->text('complemento', ['class' => 'form-control input-sm', 'id' => 'complemento', 'placeholder' => 'Insira o Complemento do Endereço']); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="numero" class="control-label">Número:</label>
                      <?php echo $this->Form->text('numero', ['class' => 'form-control input-sm', 'id' => 'numero', 'placeholder' => 'Insira o Número do Endereço']); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="cep" class="control-label">CEP:</label>
                      <?php echo $this->Form->text('cep', ['class' => 'form-control input-sm', 'id' => 'cep', 'placeholder' => 'Insira o CEP']); ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="bairro" class="control-label">Bairro:</label>
                      <?php echo $this->Form->text('bairro', ['class' => 'form-control input-sm', 'id' => 'bairro', 'placeholder' => 'Insira o Bairro']); ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="cidade" class="control-label">Cidade:</label>
                      <?php echo $this->Form->text('cidade', ['class' => 'form-control input-sm', 'id' => 'cidade', 'placeholder' => 'Insira a Cidade']); ?>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="uf" class="control-label">UF:</label>
                      <select class="form-control input-sm" name="uf" >
                          <option></option>
                          <?php foreach ($ufs as $uf): ?>
                          <option value="<?php echo $uf['id_uf']; ?>"><?php echo $uf['uf']; ?> </option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="email" class="control-label">E-mail:</label>
                      <?php echo $this->Form->email('email', ['class' => 'form-control input-sm', 'id' => 'email', 'placeholder' => 'Insira seu E-mail']); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="password" class="control-label">Senha:</label>
                      <?php echo $this->Form->password('password', ['class' => 'form-control input-sm', 'id' => 'password', 'placeholder' => 'Insira sua Senha']); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="tel_fixo" class="control-label">Telefone Residencial:</label>
                      <?php echo $this->Form->text('tel_fixo', ['class' => 'form-control input-sm', 'id' => 'tel_fixo', 'placeholder' => 'Telefone']); ?>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="tel_celular" class="control-label">Telefone Celular:</label>
                      <?php echo $this->Form->text('tel_celular', ['class' => 'form-control input-sm', 'id' => 'tel_celular', 'placeholder' => 'Celular']); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                      <input type="hidden" name="_method" value="POST"/>
                      <?php echo $this->Form->hidden('tipo_pessoa', ['value' => 'Atendente']); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="btn-group">
                      <button type="submit" class="btn btn-success" id="btn_cadastrar">Cadastrar</button>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="alert-danger text-center message form-group" role="alert" id="">
                      <?php echo $this->Flash->render() ?>
                  </div>
                </div>
              </div>
          </fieldset>
        </form>
    </div>
</div>
