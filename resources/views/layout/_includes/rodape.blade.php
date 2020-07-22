      
      
    <!-- LINKS -->
    <section class="link">
      <div class="logos">
        <a href="#"><i class="fab fa-facebook-square fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-twitter fa-2x logo"></i></a>
        <a href="#"><i class="fab fa-youtube fa-2x logo"></i></a>
      </div>
      <div class="sub-links">
        <ul>
          <li><a href="#">Audio and Subtitles</a></li>
          <li><a href="#">Audio Description</a></li>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">Gift Cards</a></li>
          <li><a href="#">Media Center</a></li>
          <li><a href="#">Investor Relations</a></li>
          <li><a href="#">Jobs</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Legal Notices</a></li>
          <li><a href="#">Corporate Information</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </section>
    <!-- END OF LINKS -->

    <!-- FOOTER -->
    <footer>
      <p>&copy 1997-2018 Netflix, Inc.</p>
      <p>Carlos Avila &copy 2018</p>
    </footer>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
  <!--Gera Cookie-->
  <script>
    function valor_cookie(nome_cookie) {
      var cname = ' ' + nome_cookie + '=';
      var cookies = document.cookie;
      if (cookies.indexOf(cname) == -1) {
          return false;
      }
      cookies = cookies.substr(cookies.indexOf(cname), cookies.length);
      if (cookies.indexOf(';') != -1) {
          cookies = cookies.substr(0, cookies.indexOf(';'));
      }
      cookies = cookies.split('=')[1];
      return decodeURI(cookies);
    }

    var cookie = document.cookie;
    if(!valor_cookie("servico_selecionado"))
      document.cookie = "servico_selecionado = 1;"
  </script>

  <script>
    function selecionar_servico (id){
      document.cookie = "servico_selecionado = "+id+";";
    }
    var item = document.getElementById(valor_cookie("servico_selecionado"));
    item.classList.add("servico_selecionado");
  </script>
  
  <script>
    
    $(document).ready(function(){
      //Mobile
      $('.sidenav').sidenav();

      //DopDown
      $(".dropdown-trigger").dropdown();

      //Carousel
      $('.carousel').carousel();
    });

    

    
  </script>

</body>
</html>
