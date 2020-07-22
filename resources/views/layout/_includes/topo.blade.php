<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">  
  <link rel="stylesheet" src="{{ url( 'css/style.css' ) }}">  
  <script src="main.js"></script>
</head>
<body>
  <div class="wrapper">

    <!-- HEADER -->
    <header>
      <nav class="my-nav">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo responsive-img"><img src="{{ url('imagens/logo.png') }}" height="50px"  style="margin: 2px"/></a>   
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="hide-on-med-and-down" style="margin-left: 190px">
            @foreach ($servicos as $servico)
              <li class="servicos 
                @if($servico->nome == $servico_selecionado)
                  servico_selecionado
                @endif
              " ><a href="{{ route('videos', ['servico' => $servico->nome , 'id' => 1]) }}">{{ $servico->nome }}</a></li>
            @endforeach
          </ul>
          <ul class="right hide-on-med-and-down">
            <li><a href="#"><i class="fas fa-search sub-nav-logo"></i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">settings</i></a></li>
          </ul>        
        </div>
      </nav>

      <!--DropDown Configurações-->
      <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!">one</a></li>
          <li><a href="#!">two</a></li>
          <li class="divider"></li>
          <li><a href="#!">three</a></li>
        </ul>

      <!-- Mobile -->
      <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html">Vídeos</a></li>
        <li><a href="badges.html">Músicas</a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Configurações</a></li>
         
      </ul>
    </header>
    <!-- END OF HEADER -->

    

<style>
  /* CSS VARIABLES */

:root {
  --primary: #141414;
  --light: #F3F3F3;
  --dark: 	#686868;
}


.my-nav{
  position: fixed;
  top: 0px;
  left: 0px;
  background-color: rgba(0,0,0, 0.5);
}

.video-container{
    margin-top: 60px;
}

.video-container video{
    width: 70%
}

.my-nav a{
  color: grey;
}

.servico_selecionado a{
  font-weight: bold;
  color: #fff;
}

html, body {
  width: 100vw;
  min-height: 100vh;
  margin: 0;
  padding: 0;
  background-color: var(--primary);
  color: var(--light);
  font-family: Arial, Helvetica, sans-serif;
  box-sizing: border-box;
  line-height: 1.4;
}

img {
  max-width: 100%;
}

.title {
  padding-top: 60px;  
}

.wrapper {
  margin: 0;
  padding: 0;
}

/* HEADER */
header {
  padding: 20px 20px 0 20px;
}

.netflixLogo {
  grid-area: nt;
  object-fit: cover;
  width: 200px;
  max-height: 100%;
  
  padding-left: 30px;
  padding-top: 0px;  
}

.netflixLogo img {  
  height: 35px;     
}

#logo {
  color: #E50914;  
  margin: 0; 
  padding: 0; 
}


.main-nav {
  grid-area: mn;
  padding: 0 30px 0 20px;
}

.main-nav a {
  color: grey;
  text-decoration: none;
  margin: 5px;  
}

.main-nav a:hover {
  color: var(--dark);
}

.sub-nav {
  grid-area: sb;
  padding: 0 40px 0 40px;
}

.sub-nav a {
  color: var(--light);
  text-decoration: none;
  margin: 5px;
}

.sub-nav a:hover {
  color: var(--dark);
}


/* MAIN CONTIANER */
.main-container {
  padding: 50px;
}

.box {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(6, minmax(100px, 1fr));
}

.box a {
  transition: transform .3s;  
}

.box a:hover {
  transition: transform .3s;
  -ms-transform: scale(1.4);
  -webkit-transform: scale(1.4);  
  transform: scale(1.4);
}

.box img {
  border-radius: 2px;
}

/* LINKS */
.link {
  padding: 50px;
}

.sub-links ul {
  list-style: none;
  padding: 0;
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(4, 1fr);
}

.sub-links a {
  color: var(--dark);
  text-decoration: none;
}

.sub-links a:hover {
  color: var(--dark);
  text-decoration: underline;
}

.logos a{
  padding: 10px;
}

.logo {
  color: var(--dark);
}


/* FOOTER */
footer {
  padding: 20px;
  text-align: center;
  color: var(--dark);
  margin: 10px;
}

/* MEDIA QUERIES */

@media(max-width: 900px) {

  header {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(2, 1fr);
    grid-template-areas: 
    "nt nt nt  .  .  . sb . . . "
    "mn mn mn mn mn mn  mn mn mn mn";
  }

  .box {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(4, minmax(100px, 1fr));
  }

}

@media(max-width: 700px) {

  header {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(2, 1fr);
    grid-template-areas: 
    "nt nt nt  .  .  . sb . . . "
    "mn mn mn mn mn mn  mn mn mn mn";
  }

  .box {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(3, minmax(100px, 1fr));
  }

  .sub-links ul {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(3, 1fr);
  }
   
}

@media(max-width: 500px) {

  .wrapper {
    font-size: 15px;
  }

  header {
    margin: 0;
    padding: 20px 0 0 0;
    position: static;
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(1, 1fr);
    grid-template-areas: 
    "nt"    
    "mn"
    "sb";
    text-align: center;
  }

  .netflixLogo {
    max-width: 100%;
    margin: auto;
    padding-right: 20px;
  }

  .main-nav {
    display: grid;
    grid-gap: 0px;
    grid-template-columns: repeat(1, 1fr);
    text-align: center;
  }

  h1 {
    text-align: center;
    font-size: 18px;
  }

 

  .box {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(1, 1fr);
    text-align: center;    
  }

  .box a:hover {
    transition: transform .3s;
    -ms-transform: scale(1);
    -webkit-transform: scale(1);  
    transform: scale(1.2);
  }

  .logos {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(2, 1fr);
    text-align: center;
  }

  .sub-links ul {
    display: grid;
    grid-gap: 20px;
    grid-template-columns: repeat(1, 1fr);
    text-align: center;
    font-size: 15px;
  }

  

  
   
}

</style>