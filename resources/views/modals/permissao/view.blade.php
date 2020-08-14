<div class="modal fade" id="permissaoModal" tabindex="-1" role="dialog" aria-labelledby="permissaoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissaoModalLabel">Permissões</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-permissao" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Entidade</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Adicionar</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Remover</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-permissao">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    function showModalPermissao(grupo_id){ 
        var rota = "{{ route('permissao.listar.grupo', ['grupo_id' => '_grupo_id_' ]) }}".replace('_grupo_id_', grupo_id);
    
        $("#body-table-permissao").html("");
        $.ajax({
            url: rota,
            type: "get",
            dataType: 'json',
            success: function(response){
                
                if(response.sucesso){
                    for(var permissao in response.permissoes){
                        var icon_check = "<i class='fa fa-check text-success'></i>";
                        var icon_close = "<i class='fa fa-close text-danger'></i>";

                        var ver = response.permissoes[permissao].ver ? icon_check : icon_close;
                        var adicionar = response.permissoes[permissao].adicionar ? icon_check : icon_close;
                        var editar = response.permissoes[permissao].editar ? icon_check : icon_close;
                        var remover = response.permissoes[permissao].remover ? icon_check : icon_close;

                        var str = 
                            "<tr class='align-middle'><td>"+response.permissoes[permissao].entidade.nome
                            +"</td><td>"+ ver
                            +"</td><td>"+ adicionar
                            +"</td><td>"+ editar
                            +"</td><td>"+ remover
                            +"</td><td><button class='btn btn-primary mr-1'>"
                            +"<i class='fa fa-edit'></i>"
                            +"</button><button class='btn btn-danger mr-1'>"
                            +"<i class='fa fa-remove'></i></button>";


                            $("#body-table-permissao").html(
                            $("#body-table-permissao").html().concat(str)
                        );
                    }                        
                }
            },
        });
    }

    

</script>

 