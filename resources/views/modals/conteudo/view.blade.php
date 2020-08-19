<div class="modal fade" id="conteudoModal" tabindex="-1" role="dialog" aria-labelledby="conteudoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="conteudoModalLabel">Conteúdos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-conteudo" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Data de Criação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-conteudo" class="w-100">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#btn-gerenciar-conteudo').on('click', function () {
            $("#body-table-conteudo").html("");
            $.ajax({
                url: "{{ route('conteudo.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var conteudo in response.conteudos){
                            var data = response.conteudos[conteudo].created_at;
                            var str = 
                                "<tr><td>"+response.conteudos[conteudo].titulo
                                +"</td><td>"+response.conteudos[conteudo].categoria.nome
                                +"</td><td>"+response.conteudos[conteudo].genero.nome
                                +"</td><td>"+data
                                +"</td><td><button onclick='_funcao_' class='btn btn-primary m-2'"
                                .replace("_funcao_", 'showModalConteudoEditar('+response.conteudos[conteudo].id+')')
                                +"data-toggle='modal' data-target='#addConteudoModal'>"
                                +"<i class='fa fa-edit'></i></button>"
                                +"<button class='btn btn-danger mr-1'>"
                                +"<i class='fa fa-remove'></i></button>";


                             $("#body-table-conteudo").html(
                                $("#body-table-conteudo").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    function showModalConteudoEditar(conteudo)  {
        loadModalConteudoServicos();
        $("#addConteudoModalLabel").html("Editar Conteúdo");
        $("#success-conteudo").html("Conteúdo cadastrado com sucesso");
        var rota = "{{ route('conteudo.listar.id', ['id' => '_id_']) }}".replace('_id_', conteudo);
        $.ajax({
            url: rota,
            type: "get",
            dataType: 'json',
            success: async function(response){
                if(response.sucesso){
                    $("#conteudo-select-servico option:contains('_servico_')"
                        .replace("_servico_", response.conteudo.categoria.servico.nome)
                    ).attr("selected", true);

                    loadModalConteudoCategorias(response.conteudo.categoria.nome, response.conteudo.genero.nome);

                    disableCampos(true);

                    $("#conteudo-input-titulo").val(
                        response.conteudo.titulo
                    );

                    $("#conteudo-input-descricao").val(
                        response.conteudo.descricao
                    );

                    var diretorio_img = "{{ URL::asset('storage/_imagem_') }}".replace('_imagem_', response.conteudo.imagem)
                    $("#conteudo-imagem").attr("src", diretorio_img);
                    $("#conteudo-imagem").removeClass("d-none");

                    $("#conteudo-diretorio").attr("onclick", detalhesShow(response.conteudo));
                    $("#conteudo-diretorio").html(response.conteudo.titulo);
                    $("#conteudo-diretorio").removeClass("d-none");

                    
                    

                }
            },
        });
    }

    

</script>

 