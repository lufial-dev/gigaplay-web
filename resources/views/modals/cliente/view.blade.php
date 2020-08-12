<div class="modal w-100 fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="clienteModal" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
        <div class="modal-content w-100">
            <div class="modal-header w-100">
                <h5 class="modal-title" id="clienteModalLabel">Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-100">
                <table id="table-cliente" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Conexões</th>
                            <th scope="col">Conexões Ativas</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-cliente">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#btn-gerenciar-cliente').on('click', function () {
            $("#body-table-cliente").html("");
            $.ajax({
                url: "{{ route('cliente.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var cliente in response.clientes){
                            var str = 
                                "<tr><td>"+response.clientes[cliente].usuario.nome
                                +"</td><td>"+response.clientes[cliente].quant_conexoes
                                +"</td><td>"+response.clientes[cliente].quant_conexoes_ativas
                                +"</td><td><button class='btn btn-primary mr-1'><i class='fa fa-edit'></i></button><button class='btn btn-danger mr-1'><i class='fa fa-remove'></i></button>";


                             $("#body-table-cliente").html(
                                $("#body-table-cliente").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    

</script>

 