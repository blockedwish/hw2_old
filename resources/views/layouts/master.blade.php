<html>
<head>
    <title>Bacheca </title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/master.css">
    @section("head_aggiuntivi")
    @show()
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noticia+Text&display=swap" rel="stylesheet">
  

</head>
<body>
<nav>
        <div class="options">
            
            
            <a id="a_bacheca" href="bacheca"><img  href="bacheca" src = "./image/bacheca.ico"></a>
            <a id ="a_control_panel" href="control_panel"> <img id="image_control_panel" src ="./image/controlpanel.png"></a>
            
        </div>  
        <div class="profile_info">
            <img src={{ session("img_link") }}>
            <a href="profile"> {{session("username")}}  </a>
        </div>
        
    </nav>
    @yield("content")

    <p id="auth_code" hidden> {{session("auth_code")}} </p>
</body>
</html>