           <div class="card my-2" style="width: 18rem;">
                @if($produit->media)
                    <img src="{{ Storage::url($produit->media) }}" class="card-img-top" alt="{{ $produit->nom }}">
                    @else
                    <img src="{{ "https://picsum.photos/240/180?id=".rand() }}" class="card-img-top" alt="{{ $produit->nom }}">
                @endif
                <div class="card-body">
                    <p class="text-muted">Sold by {{ $produit->vendeur->name }}</p>
                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p class="card-text">{{ $produit->description }}</p>
                </div>

                <div class="card-body">
                    @foreach($produit->tags as $tag)
                         <a href="/produits?tag={{$tag->slug}}" class="badge badge-info">{{$tag->nom}}</a>
                    @endforeach
                </div>

                @if($showButtonSee)
                <div class="card-body">
                    <a href="/produits/{{ $produit->id}}" class="card-link">Check it out</a>
                </div>
                @endif
            </div>
           
            