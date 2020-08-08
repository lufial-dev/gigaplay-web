<div class="modal w-100 fade" id="servicoModal" tabindex="-1" role="dialog" aria-labelledby="servicoModal" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
        <div class="modal-content w-100">
            <div class="modal-header w-100">
                <h5 class="modal-title" id="servicoModalLabel">Servicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-100">
                <table id="table-servico" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-servico">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#btn-gerenciar-servico').on('click', function () {
            $("#body-table-servico").html("");
            $.ajax({
                url: "{{ route('servico.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    if(response.sucesso){
                        for(var servico in response.servicos){
                            var str = 
                                "<tr><td>"+response.servicos[servico].nome
                                +"</td><td>"+response.servicos[servico].descricao
                                +"</td><td><button class='btn btn-primary mr-1'><i class='fa fa-edit'></i></button><button class='btn btn-danger mr-1'><i class='fa fa-remove'></i></button>";


                             $("#body-table-servico").html(
                                $("#body-table-servico").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    

</script>

 