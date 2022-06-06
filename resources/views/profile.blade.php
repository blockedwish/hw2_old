@extends('layouts.master')
@section("head_aggiuntivi")
    <link rel="stylesheet" href="./css/profile.css">
    <script src="./js/profile.js" defer></script>
@stop

@section("content")
            <div id="pop_up" class="hidden">
                <h1> ✅ </h1>
                <h1>LA PASSWORD E' STATA CAMBIATA CON SUCCESSO</h1>

            </div>

   

    <section>
        <div class="container">
            <div class="box">
                <div>
                    <div class="containerimg">
                        <img id="profileimg" src={{ session("img_link") }}>
                    </div>
                </div>
                <div>
                    <p>Username:{{session("username")}}</p>
                    <form method="post">
                         <button  id="logout" > logout </a>
                         @csrf
                    </form>
                </div>
            </div>
            <form action="changeimgprofile" method ="post">
                @csrf
                
                 <input name ="img_link" type="button" id="img_profile_widget" value="Cambia immagine profilo"></input>
            </form>
            <div class="password_changer_container">
                <button id="reimposta_password" >Reimposta password</button>
                <div id="sub_window" class="hidden">
                    <div class="row">
                        <label for="old_password">Vecchia password</label>
                        <input id="old_password">
                    </div>
                    <div class="row">
                        <label for="new_password">Nuova password </label>
                        <input id="new_password">
                    </div>
                    <button id="button_changer" > Cambia </button>
                </div>
            </div>
    </div>

    </section>

@stop