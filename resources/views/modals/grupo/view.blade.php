
@php 
    $permissaoPermissao = $user->permissao("Permissão");
@endphp

<div class="modal fade" id="grupoModal" tabindex="-1" role="dialog" aria-labelledby="grupoModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="grupoModalLabel">Grupos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-grupo" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Estado</th>
                            @if($permissaoPermissao and $permissaoPermissao->ver)
                                <th scope="col">Permissões</th>
                            @endif
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-grupo">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#btn-gerenciar-grupo').on('click', function () {
            $("#body-table-grupo").html("");
            $.ajax({
                url: "{{ route('grupo.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var grupo in response.grupos){
                            var estado = response.grupos[grupo].status == 1 ? "Ativo" : "Inativo";
                            var str = 
                                "<tr><td>"+response.grupos[grupo].nome
                                +"</td><td>"+ estado
                                @if($permissaoPermissao and $permissaoPermissao->ver)
                                    +"</td><td><a onclick='_funcao_' href='#'"
                                    .replace("_funcao_", 'showModalPermissao('+response.grupos[grupo].id+')')
                                    +"data-toggle='modal' data-target='#permissaoModal'>Permissões"
                                    +"</a>"
                                @endif
                                +"</td><td><button class='btn btn-primary mr-1'><i class='fa fa-edit'></i></button><button class='btn btn-danger mr-1'><i class='fa fa-remove'></i></button>";


                             $("#body-table-grupo").html(
                                $("#body-table-grupo").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    

</script>

 