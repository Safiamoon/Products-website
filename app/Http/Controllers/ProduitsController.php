<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitsController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         if (request("tag")) {
             $tag=Tag::where("slug",request("tag"))->first();
             //$tag=Tag::findOrFail(request("tag"));//404 si non trouvé
             if ($tag) {
                 $produits = $tag->produits;
             } else {
                 //redirection
                 //return redirect("/produits");
                 $produits=collect([]);
             }
         } else {
             $produits = Produit::all();
         }
         return view("produits.index", compact("produits"));
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("produits.create", ["tags"=>Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $champsValides=$this->validateProduct();
        if (request("media") != null) {
            $uploadPath=request()->file("media")->store("public/medias");
            $champsValides["media"]=$uploadPath;
        }else{
            $champsValides["media"]="";
        }
        $champsValides["user_id"]=Auth::user()->id;
        $produit = Produit::create($champsValides);
        $produit->tags()->attach(request("tags"));
        return redirect("/produits");
    }
//Ou bien
        // $produit = new Produit();
        // $produit->nom = request("nom");
        // $produit->description = request ("description");
        // $produit->save();

        // Produit::create([
        //     "nom"=>request("nom"),
        //     "description"=>request("description")
        // ]);return redirect("/produits");


 
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        
        return view("produits.show",compact("produit"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    //public function edit($idproduit)
    public function edit(Produit $produit)
    {
        $tags=Tag::all();
        return view("produits.edit",compact("produit", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Produit $produit)
    {
        $champsValides=$this->validateProduct();
        if (request("media") != null) {
            $uploadPath=request()->file("media")->store("public/medias");
            $champsValides["media"]=$uploadPath;
        }else{
            $champsValides["media"]=$produit->media;
        }
        // $champsValides["user_id"]=1;
        $produit->update($champsValides);

        $produit->tags()->sync(request("tags"));
        return redirect("/produits");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        //redirection
        return redirect("/produits");
    }

    protected function validateProduct(){
        //dd(request()->all());
        return request()->validate([
            "nom"=>"required",
            "media"=>"nullable|mimes:jpeg,jpg,png,gif,svg,mp4,ogx,oga,ogv,ogg,webm|max:10240",
            "description"=>"required|min:10|max:255"
        ]);
    }
}
