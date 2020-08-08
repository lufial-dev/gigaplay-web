<div class="modal w-100 fade" id="funcionarioModal" tabindex="-1" role="dialog" aria-labelledby="funcionarioModal" aria-hidden="true">
    <div class="modal-dialog w-100" role="document">
        <div class="modal-content w-100">
            <div class="modal-header w-100">
                <h5 class="modal-title" id="funcionarioModalLabel">Funcionários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-100">
                <table id="table-funcionario" class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="body-table-funcionario">
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#btn-gerenciar-funcionario').on('click', function () {
            $("#body-table-funcionario").html("");
            $.ajax({
                url: "{{ route('funcionario.listar') }}",
                type: "get",
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response.sucesso){
                        for(var funcionario in response.funcionarios){
                            var str = 
                                "<tr><td>"+response.funcionarios[funcionario].usuario.nome
                                +"</td><td>"+response.funcionarios[funcionario].cargo
                                +"</td><td>"+response.funcionarios[funcionario].grupo.nome
                                +"</td><td><button class='btn btn-primary mr-1'><i class='fa fa-edit'></i></button><button class='btn btn-danger mr-1'><i class='fa fa-remove'></i></button>";


                             $("#body-table-funcionario").html(
                                $("#body-table-funcionario").html().concat(str)
                             );
                        }                        
                    }
                },
            });
        });
    });

    

</script>

 