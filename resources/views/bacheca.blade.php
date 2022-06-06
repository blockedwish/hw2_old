@extends('layouts.master')
@section("head_aggiuntivi")
<link rel="stylesheet" href="./css/bacheca.css">
<script src="./js/bacheca.js" defer></script>
@stop
@section("content")

<body>

    <form id="form_search" >
        <div class="center_flex">
            <input id="text_filtro" placeholder="Filtro username" class="textbox" type="textbox">
        </div>
    </form>

    <div class="center_flex column_direction ">
        <div >
            <input id="onoff_bookmark" type="checkbox">
            <label for="onoff_bookmark">Mostra solo preferiti</label>
        
        </div>
        <button id="add_button" ></button>

        <div id="contenitore_form_crea_nuova_asta"  class="container_new_asta hidden" >  <!-- hidden-->
            <div class="seventy_block image_preview">
                <img id="picture_img_preview"  >
            </div>
            <div class="thirty_block newauctionthirtyblockoverride">
          
                     <input id="nome_pianta" placeholder="Nome pianta" class="textbox eightwidth">
               
                <input type="textbox" placeholder ="www.ex.it/img.jpg" class="textbox link_textbox" id="link_textbox">
                <div >
                    <button id="increment_button">+</button>
                    <h1 id="base_asta"></h1>
                    <button id="decrement_button">-</button>
                </div>

                <div class="interaction_block">


                    <button id="button_new_asta" >PUBBLICA</button>
                </div>
            </div>
        </div>

        <!--
        <div id="contenitore_form_crea_nuova_asta" class="container hidden" > 
            <div class="border padding">
                <div class="container centered">
                  <input id="nome_pianta" placeholder="Nome pianta">
                </div>
                <div  class="image_preview">
                    <img id="picture_img_preview"  >
                </div>
                <div class="container column_direction ">
                    <div>
                        <label for="link_textbox"  >Link </label> 
                        <input type="textbox" placeholder ="www.ex.it/img.jpg"  id="link_textbox">
                    </div>

                    <div>
                        <button id="increment_button">+</button>
                        <h1 id="base_asta"></h1>
                        <button id="decrement_button">-</button>
                    </div>
                    <button id="button_new_asta" >PUBBLICA</button>
                    
                </div>
            </div>
            
        -->


        </div>
    </div>

    </div>
    <section>
       
    </section>

</body>
@stop