<div class="modal fade detalhes-modal bg-black" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-modal-dialog" role="document">    
        <div class="modal-content bg-black float-left">
            <div class="modal-body">
                <div class = "cabecalho">
                    <img class="img-detalhes" id="detalhes-imagem" src="" alt=""  />
                    <div class="detalhes">
                        <button type="button" class="btn text-white float-right" data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <h1 id="detalhes-titulo">Titulo</h1>
                        <div class="meta-data-icon-label mb-1" >
                            <div class="icon-wrapper rounded-circle pl-2 pr-2 pb-1 pt-1">
                                <svg width="16" height="14" viewBox="0 0 16 14">
                                    <g fill="#FFF">
                                        <path d="M14.129 10.5H1.87C.948 10.5.2 9.828.2 9V2C.2 1.172.948.5 1.871.5H14.13c.923 0 1.671.672 1.671 1.5v7c0 .828-.748 1.5-1.671 1.5zm-12.326-9c-.31 0-.563.224-.563.5v7c0 .276.252.5.563.5h12.394c.31 0 .563-.224.563-.5V2c0-.276-.252-.5-.563-.5H1.803zM11.033 13.5H4.967c-.335 0-.607-.224-.607-.5s.272-.5.607-.5h6.066c.335 0 .607.224.607.5s-.272.5-.607.5z" data-reactid="256"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="label">
                                <a class="genre" id="detalhes-genero" href="/genero/todos/ação">Gênero</a>
                            </div>
                        </div>
                        <div class="descricao" id="detalhes-descricao">
                            Descricao
                        </div>
                        <button class="btn btn-primary my-btn float-left" data-toggle="modal" data-target=".player-modal" onclick="videoShow({{ $conteudo }})">Assistir agora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function detalhesShow(conteudo){
        var url = "{{ URL::asset('storage/') }}".concat("/").concat(conteudo.imagem);

        $("#detalhes-titulo").html(conteudo.titulo);
        $("#detalhes-genero").html(conteudo.genero_id);
        $("#detalhes-descricao").html(conteudo.descricao);
        $("#detalhes-imagem").attr('src', url);
        
    }


    function videoShow(conteudo){
        var url = "{{ URL::asset('storage/') }}".concat("/").concat(conteudo.diretorio);
        $("#video").attr('src', url);
        
    }
</script>



