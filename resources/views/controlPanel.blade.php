@extends('layouts.master')

@section("head_aggiuntivi")
<link rel="stylesheet" href="./css/control_panel.css">
<script src="./js/control_panel.js" defer></script>
@stop

@section("content")
    <section>
    <table>
        <tr>
            <th class="title" >Nome pianta in asta</th>
            <th class="hiddable">Prezzo corrente</th>
            <th>Follower</th>
        </tr>

    </table>
    </section>
 @stop