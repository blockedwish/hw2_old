
<html>
    <head>
        <title>PLANT COMMUNITY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./css/index.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="./js/login.js" defer></script>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noticia+Text&display=swap" rel="stylesheet">
    </head>
    <body>
        <section>
            <div>
                <img src="./image/logo.png" id="logo">
            </div>

            <div class="login_container">
                <form id="login_form" method="post">
                    @csrf
                    <div class="form_row">
                        <label for="username_textbox">Username</label>
                        <input id="username_textbox" name="username" type="text">
                    </div>
                    <div class="form_row">
                        <label for="password_textbox">Password</label>
                        <input id="pwd_textbox" name="pwd" type="password">
                    </div>
                    <a href="{{url('register')}}">Non ho un account, voglio registrarmi </a>
                    <button >ENTRA</button>
                    
                </form>
                
            </div>
        </section>
    </body>
</html>