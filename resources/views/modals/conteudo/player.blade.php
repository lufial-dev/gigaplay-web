<div class="modal fade player-modal bg-black" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog my-modal-dialog" role="document">    
        <div class="modal-content bg-black float-left">
            <div class="modal-body .modal-body-detalhes">
            <center>
                <div class="video-container">
                        <button type="button" class="btn text-white float-right" data-dismiss="modal" onclick="videoPause()">
                            <i class="fa fa-close"></i>
                        </button>
                    <video id="video" controls src="">
                        
                    </video>
                </div>
            </center>
                
            </div>
        </div>
    </div>
</div>

<script>
    function videoPause(){
        $('#video').trigger('pause');
    }
</script>