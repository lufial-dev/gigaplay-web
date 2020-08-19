<div class="modal" id="addConteudoModal" tabindex="-1" role="dialog" aria-labelledby="addConteudoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addConteudoModalLabel">Adicionar Conteúdo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            
            <div class="text-center p-2 mt-4 mb-4 alert-danger d-none rounded" id="errors-conteudo">
                
            </div>

            <div class="text-center p-2 mt-4 mb-4 alert-success d-none rounded" id="success-conteudo">
                Conteúdo cadastrado com sucesso
            </div>  

            <form id="form-cadastrar-conteudo" method="post" action="{{ route('conteudo.store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class= "col">
                        <label>Tipo:</label>
                        <select class="form-control" name="tipo" id="conteudo-select-servico" onclick="loadModalConteudoCategorias(null)" disabled>
                            <option value="-1" selected disabled>Selecione...</option>
                        </select>
                    </div>

                    <div class= "col">
                        <label>Categoria:</label>
                        <select class="form-control" name="categoria"  onclick="disableCampos()" id="conteudo-select-categoria" disabled>
                            <option value="-1" selected disabled>Selecione...</option>
                        </select>
                    </div>

                    <div class="col">
                        <label>Gênero</label>
                        <select name="genero" id="conteudo-select-genero" class="form-control" disabled>
                            <option value="-1" selected disabled>Selecione...</option>
                        </select>
                    </div>
                    

                </div>

                <div class="row">
                    <div class= "col">
                        <label>Titulo:</label>
                        <input class="form-control" type="text" name="titulo" id="conteudo-input-titulo" disabled/>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label>Descrição:</label>
                        <textarea rows="3" class="form-control" type="text" name="descricao"  id="conteudo-input-descricao" disabled></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label id="label-conteudo">Imagem:</label>
                        <img id="conteudo-imagem" class="d-none m-2" src="" width="100px"/>
                        <input class="form-control p-1" type="file" name="imagem"  id="conteudo-input-imagem" disabled/>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label id="label-conteudo">Conteúdo:</label>
                        <a href="d-none" id="conteudo-diretorio" class="" data-toggle="modal" data-target=".detalhes-modal"></a>
                        <input class="form-control p-1" type="file" name="conteudo"  id="conteudo-input-diretorio" disabled/>
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

    function loadModalConteudoServicos(){
        var div_errors = $('#errors');
        div_errors.addClass("d-none");

        var div_success = $('#success');
        div_success.addClass("d-none");

        $("#conteudo-select-servico").html('<option value="-1" selected disabled>Selecione...</option>');
        
        $.ajax({
            url: "{{ route('servico.listar') }}",
            type: "get",
            dataType: 'json',
            success: function(response){
                if(response.sucesso){
                    for(var servico in response.servicos){
                        var str = "<option value=".concat(response.servicos[servico].id).concat(">").concat(response.servicos[servico].nome).concat("</option");
                        $("#conteudo-select-servico").html(
                            $("#conteudo-select-servico").html().concat(str)
                        );
                    }
                    
                    $("#conteudo-select-servico").removeAttr('disabled');
                    
                }
            },
        });
    }

    function loadModalConteudoCategorias(categoria_nome, genero_nome){
        var servico_id = $('#conteudo-select-servico option:selected').val();
        var rota = "{{ route('categoria.listar.servico', ['servico_id' => '_servico_id_' ]) }}".replace('_servico_id_', servico_id);
        
        $("#conteudo-select-categoria").html('<option value="-1" selected disabled>Selecione...</option>');
        
        $.ajax({
            url:  rota,
            type: "get",
            dataType: 'json',
            success: function(response){
                if(response.sucesso){
                    for(var i in response.categorias){
                        var selected = "";
                        if(response.categorias[i].nome == categoria_nome){
                            $('#conteudo-select-categoria option:selected').attr("selected", false);
                            selected ="selected";
                        }
                        var str = "<option value=".concat(response.categorias[i].id).concat(selected).concat(">").concat(response.categorias[i].nome).concat("</option");
                            $("#conteudo-select-categoria").html(
                            $("#conteudo-select-categoria").html().concat(str)
                            );
                    }
                    
                    if($("#conteudo-select-categoria option").length>1)
                        $("#conteudo-select-categoria").removeAttr('disabled');
                }
            },
        });

        var rota = "{{ route('genero.listar.servico', ['servico_id' => '_servico_id_' ]) }}".replace('_servico_id_', servico_id);
        
        $("#conteudo-select-genero").html('<option value="-1" selected disabled>Selecione...</option>');
        

        $.ajax({
            url: rota,
            type: "get",
            dataType: 'json',
            success: function(response){
                if(response.sucesso){
                    for(var genero in response.generos){
                        var selected = "";
                        if(response.generos[genero].nome == genero_nome){
                            $('#conteudo-select-genero option:selected').attr("selected", false);
                            selected ="selected";
                        }
                        var str = "<option value=".concat(response.generos[genero].id).concat(selected).concat(">").concat(response.generos[genero].nome).concat("</option");
                        $("#conteudo-select-genero").html(
                            $("#conteudo-select-genero").html().concat(str)
                        );
                    }   
                }
            },
        });

        
    }

    function disableCampos(disable) {
        if($("#conteudo-select-categoria option:selected").val()!=-1 || disable){
            $('#conteudo-input-titulo').removeAttr('disabled');
            $('#conteudo-input-descricao').removeAttr('disabled');
            $('#conteudo-input-diretorio').removeAttr('disabled');
            $('#conteudo-input-imagem').removeAttr('disabled');
            $('#conteudo-select-genero').removeAttr('disabled');
        }
    }

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

                    var div_errors = $('#errors-conteudo');
                    var div_sucess = $('#success-conteudo');

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
                    var div_sucess = $('#success-conteudo');
                    div_sucess.addClass("d-none");
                    var errors = response.responseJSON.errors;
                    var div_errors = $('#errors-conteudo');
                    div_errors.html('');
                    div_errors.removeClass('d-none');
                    for(var error in errors){
                        text = div_errors.html().concat(errors[error].concat("<br>")).replace(',','');
                        div_errors.html(text);
                    }
                }
            });
           
        });    

</script>

 