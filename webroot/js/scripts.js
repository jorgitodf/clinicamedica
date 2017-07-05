$(document).ready(function () {

  //CADASTRO DE ENDEREÇO
   $(function () {
      $("#login_user").submit(function(e) {
          //$(".msgError").html("");
          //$(".msgError").css("display", "none");
          e.preventDefault();
          $.ajax({
              type: "POST",
              url: $(this).attr("action"),
              data: $(this).serialize(),
              dataType: 'json',
              success: function (retorno) {
                  if (retorno.status === 'error' ){
                      //$('.retorno').html('<div class="alert alert-danger msgError" id="div_ret_cad_end">' + retorno.message + '</div>');
                      alert(retorno.message);
                  } else if (retorno.status === 'success'){
                      //$('.retorno').html('<div class="alert alert-success msgSuccess" id="msgEndCadSucesso">' + retorno.message + '</div>');
                  }
                  else {
                      alert(retorno);
                  }
              },
              fail: function(){
                  alert('ERRO: Falha ao carregar o script.');
              }
          });
      });
  });

});
