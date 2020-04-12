@extends("layouts.app")

@section("title","Edit product ".$produit->id)

@section("content")

<form method="POST" action="/produits/{{$produit->id}}" enctype="multipart/form-data">

    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="nom">Name</label>
        <input type="text" class="form-control {{ $errors->has("nom") ? "border border-danger" : "" }}" name="nom" id="nom" value="{{ $produit->nom }}">
        @if($errors->has("nom"))
            <p class="text-danger">{{ $errors->first("nom") }}</p>
        @endif
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Picture</label>
                <div class="custom-file {{ $errors->has("media") ? "border border-danger" : "" }}">
                    <input type="file" class="custom-file-input " name="media" id="media" value="{{ old("media") }}">
                    <label class="custom-file-label" for="media"></label>
                </div>
                @if($errors->has("media"))
                    <p class="text-danger">{{ $errors->first("media") }}</p>
                @endif
            </div>
        </div>
        <div class="col">
            <div id="preview"></div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error("description") border border-danger @enderror" name="description" id="description">{{ $produit->description }}</textarea>
        @error("description")
            <p class="text-danger">{{ $errors->first("description") }}</p>
        @enderror
    </div>

    <button type="edit" class="btn btn-info">Edit</button>
    
</form>

@endsection