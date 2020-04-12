<?php

use Illuminate\Database\Seeder;
use App\tag;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //compte admin
        $admin = factory("App\User")->create([
        "name"=>'Safia',
        "email"=>'safia@gmail.com',
        "password"=>'$2y$10$89AoM7ULezAcziS7TULvpO8YPPEQICa5V/RxfQ7b8jz0u8WZZCco2'
        ]);
        // 5 users
        $users = factory("App\User",5)->create();

        // 10 products
        $produits = factory("App\Produit",10)->create();

        //4 tags
        $nomsTags=["Sold","Recommend","Satisfied","refund"];
        foreach($nomsTags as $nomTag) {
            factory("App\Tag")->create(["nom"=>$nomTag, "slug"=>Str::slug($nomTag)]);
        }

        //liaison produit tag
        //je parcours l'ensemble des produits
        foreach($produits as $produit){
            for($i=0;$i<3;$i++){
            //A partir de ces tags, j'en récupère un au hasard
            Tag::all()->random()->produits()->syncWithoutDetaching($produit->id);
            }
        }
        
    }
}
