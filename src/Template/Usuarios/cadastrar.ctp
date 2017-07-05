<div class="container-fluid col-xs-12 col-lg-12 col-md-12 col-sm-12">
    <div class="row-fluid">
        <section class="">
            <div class="form-group" id="">
                <h3>Cadastro de Atendente</h3>
                <form method="post" accept-charset="utf-8" action="" id="">
                <div class="form-group clearfix">
                    <input type="hidden" name="_method" value="POST"/>
                </div>
                <div class="form-group">
                    <label for="email">Nome:</label>
                    <?php echo $this->Form->text('nome', ['class' => 'form-control', 'id' => 'nome', 'placeholder' => 'Insira seu Nome Completo']); ?>
                </div>
                <div class="form-group">
                    <label for="password">CPF:</label>
                    <?php echo $this->Form->text('cpf', ['class' => 'form-control', 'id' => 'cpf', 'placeholder' => 'Insira seu CPF']); ?>
                </div>
                <div class="form-group">
                    <label for="password">RG:</label>
                    <?php echo $this->Form->text('rg', ['class' => 'form-control', 'id' => 'rg', 'placeholder' => 'Insira seu RG']); ?>
                </div>


                <div class="btn-group">
                    <button type="submit" class="btn btn-success" id="btn_logar">Cadastrar</button>
                </div>
                <div class="alert-danger text-center message clearfix" role="alert" id="div_message_erro_login">
                    <?php echo $this->Flash->render() ?>
                </div>
              </form>
            </div>
        </section>
    </div>
</div>
