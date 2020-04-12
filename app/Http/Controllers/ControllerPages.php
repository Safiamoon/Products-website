<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\Contact2;

class ControllerPages extends Controller
{
    public function home() {
        $avantages=["Expertise", "Reactivity", "Listening team"];;
        return view('welcome',["avantages"=>$avantages]);
        //return view('welcome')->withAvantages($avantages);
        //return view('welcome', compact("avantages"));
    }    
    public function about() {
        return view('about');
    }    
    public function contact() {
        
        return view('contact');
        
    }
    public function store() {
        
         $champsValides=request()->validate([
             "nom"=>"required",
             "email"=>"required|email",
             "message"=>"required"
         ]);
        //envoi de l'email
        $content= "Message : ".request("nom")."<".request("email").">:\n".request("message");

        //Mail brut
        // Mail::raw($content,function($message){
        //     $message->from(request("email"))->to("safia@gmail.com")->subject("Site");
        // });

        //Mail HTML ou markdown
        $nom=request("nom");
        $email=request("email");
        $message=request("message");
        //Mail::to("safia@gmail.com")->send(new Contact($nom,$email,$message));
        Mail::to("safia@gmail.com")->send(new Contact2());

        return redirect()->back()->with("success","Your message was send !");
    }
}
