<div class="container-fluid col-xs-6 col-lg-6 col-md-6 col-sm-6 col-md-offset-3 login">
    <div class="row-fluid col-xs-12 col-lg-12 col-md-12 col-sm-12">
        <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group" id="div_form_login">
                <h3>Login no Sistema</h3>
                <form method="post" accept-charset="utf-8" action="/usuarios/login" id="login_user">
                <div class="form-group clearfix">
                    <input type="hidden" name="_method" value="POST"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <?php echo $this->Form->text('email', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Insira seu E-mail']); ?>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <?php echo $this->Form->password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Insira seu Senha']); ?>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-success" id="btn_logar">Logar</button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Cadastrar <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="/usuarios/cadastrar/1">Atendente</a></li>
                      <li><a href="/usuarios/cadastrar/2">Médico</a></li>
                    </ul>
                </div>
                <div class="alert-danger text-center message clearfix" role="alert" id="div_message_erro_login">
                    <?php echo $this->Flash->render() ?>
                </div>
              </form>
            </div>
        </section>
    </div>
</div>
