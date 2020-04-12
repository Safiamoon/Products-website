<div class="row mt-2 mb-5">
    <div class="col">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link {{Request::path()=="/"?"active":""}}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path()=="about"?"active":""}}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path()=="produits"?"active":""}}" href="{{route("produits.index")}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path()=="contact"?"active":""}}" href="/contact">Contact</a>
            </li>
        </ul>
    </div>
</div>