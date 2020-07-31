<div class="modal fade" id="addConteudoModal" tabindex="-1" role="dialog" aria-labelledby="addConteudoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addConteudoModalLabel">Adicionar Conteúdo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            
            <div class="text-center p-2 mt-4 mb-4 alert-danger d-none rounded" id="errors">
                
            </div>

            <div class="text-center p-2 mt-4 mb-4 alert-success d-none rounded" id="success">
                Conteúdo cadastrado com sucesso
            </div>  

            <form id="form-cadastrar-conteudo" method="post" action="{{ route('conteudo.store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class= "col">
                        <label>Tipo:</label>
                        <select class="form-control" name="tipo" id="select-servico" disabled>
                            <option value="-1" selected disabled>Selecione...</option>
                        </select>
                    </div>

                    <div class= "col">
                        <label>Categoria:</label>
                        <select class="form-control" name="categoria"  id="select-categoria" disabled>
                            <option value="-1" selected disabled>Selecione...</option>
                        </select>
                    </div>

                    <div class= "col">
                        <label>Titulo:</label>
                        <input class="form-control" type="text" name="titulo" id="input-titulo" disabled/>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label>Descrição:</label>
                        <input class="form-control" type="text" name="descricao"  id="input-descricao" disabled/>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label id="label-conteudo">Conteúdo:</label>
                        <input class="form-control p-1" type="file" name="conteudo"  id="input-conteudo" disabled/>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label id="label-conteudo">Imagem:</label>
                        <input class="form-control p-1" type="file" name="imagem"  id="input-imagem" disabled/>
                    </div>
                </div>
            
            </div>
      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button id="btn-salvar-conteudo" type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>

    $(function () {
        $('#btn-add-conteudo').on('click', function () {
            var div_errors = $('#errors');
            div_errors.addClass("d-none");

            $("#select-servico").html('<option value="-1" selected disabled>Selecione...</option>');
            
            $.ajax({
                url: "{{ route('servico.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var servico in response.servicos){
                            var str = "<option value=".concat(response.servicos[servico].id).concat(">").concat(response.servicos[servico].nome).concat("</option");
                             $("#select-servico").html(
                                $("#select-servico").html().concat(str)
                             );
                        }
                        
                        $("#select-servico").removeAttr('disabled');
                        
                    }
                },
            });
        });

        $('#select-servico').on('change', function () {
            var servico_id = $('#select-servico option:selected').val();
            var rota = "{{ route('categoria.listar.servico', ['servico_id' => '_servico_id_' ]) }}".replace('_servico_id_', servico_id);
            
            $("#select-categoria").html('<option value="-1" selected disabled>Selecione...</option>');
            
            $.ajax({
                url:  rota,
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var i in response.categorias){
                            var str = "<option value=".concat(response.categorias[i].id).concat(">").concat(response.categorias[i].nome).concat("</option");
                             $("#select-categoria").html(
                                $("#select-categoria").html().concat(str)
                             );
                        }
                        
                        $("#select-categoria").removeAttr('disabled');
                        
                        
                        
                    }
                },
            });
        });

        $('#select-categoria').on('change', function () {
            $('#input-titulo').removeAttr('disabled');
            $('#input-descricao').removeAttr('disabled');
            $('#input-conteudo').removeAttr('disabled');
            $('#input-imagem').removeAttr('disabled');
        });

        $('#form-cadastrar-conteudo').on('submit', function(event){
            
            event.preventDefault();
            var form = $(this);
            var formData = new FormData(this);
           

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                contentType : false,
                processData : false,
                enctype: form.attr('enctype'),
                
                success: function(response){
                    console.log(response);

                    var div_errors = $('#errors');
                    var div_sucess = $('#success');

                    if(response.sucesso){
                        div_errors.addClass('d-none');
                        div_sucess.removeClass('d-none');
                    }else{
                        div_sucess.addClass('d-none');
                        div_errors.html(response.mensagem);
                        div_errors.removeClass('d-none');
                    }
                },
                error: function(response){
                    var div_sucess = $('#success');
                    div_sucess.addClass("d-none");
                    var errors = response.responseJSON.errors;
                    var div_errors = $('#errors');
                    div_errors.html('');
                    div_errors.removeClass('d-none');
                    for(var error in errors){
                        text = div_errors.html().concat(errors[error].concat("<br>")).replace(',','');
                        div_errors.html(text);
                    }
                }
            });
           
        });

       
        
    });

    

</script>

 