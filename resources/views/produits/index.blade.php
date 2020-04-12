@extends("layouts.app")

@section("title","Products")

@section("content")

<div class="row">
    
    @forelse($produits as $produit)
        <div class="col d-flex justify-content-center col-sm-6 col-md-4">
            @include("partiels._produit",["showButtonSee"=>true])
        </div>
    @empty
    <p>Sorry,no product was found !
    @endforelse

</div>

@auth
<div class="row">
    <div class="col">
        <hr>
        <a class="btn btn-info" href="/produits/create">Add product</a>
</div>
</div>
@endauth

@endsection