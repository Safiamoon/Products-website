@extends("layouts/app")

@section("title","Welcome")

@section("content")

<p>You get the chance to benefit from our advantages: </p>
    
<?php
    foreach ($avantages as $avantages) {
        echo "$avantages<br>";
    }
?>
{{-- ou bien --}}
    <!--boucle-->
    {{-- @foreach($avantages as $avantage)
        {{$avantage}}
        <br>
    @endforeach --}}

@endsection