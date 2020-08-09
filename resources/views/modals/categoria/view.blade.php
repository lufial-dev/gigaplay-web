<div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="categoriaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoriaModalLabel">Categorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table-categoria" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-categoria">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#btn-gerenciar-categoria').on('click', function () {
            $("#body-table-categoria").html("");
            $.ajax({
                url: "{{ route('categoria.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response.sucesso){
                        for(var categoria in response.categorias){
                            var str = 
                                "<tr><td>"+response.categorias[categoria].nome
                                +"</td><td>"+response.categorias[categoria].servico.nome
                                +"</td><td><button class='btn btn-primary mr-1'><i class='fa fa-edit'></i></button><button class='btn btn-danger mr-1'><i class='fa fa-remove'></i></button>";


                             $("#body-table-categoria").html(
                                $("#body-table-categoria").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    

</script>

 