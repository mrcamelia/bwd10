<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $this->data['recipes'] = Recipe::orderBy('id', 'DESC')->paginate(5);
        return view('user.partials.main', $this->data);
        
    }
    public function favorite($slug){
        // $favorites = Favorite::where('user_id', Auth::user()->id)
        //     ->orderBy('resep_id','desc')->count();
        $recipes = Recipe::select('id','user_id','judul','slug','description','foto')->where('slug',$slug)->firstorFail;
        $favorites = Favorite::where('resep_id',$recipes->id)->count();
        return view('user.partials.main', compact('favorites'));
    }
    public function create(){
        $this->data['resep'] = null;
        $this->data['resepID'] = 0;

        return view('user.components.add', $this->data);
    }
    public function store(RecipeRequest $request)
    {

        if($request->hasFile('foto'))
        {
            $extension_name = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($extension_name, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filename_save = $filename.'.'.$extension;
            $request->file('foto')->storeAs('/public/foto_resep', $filename_save);

            $request->slug = Str::slug($request->judul);
            $recipe =Recipe::create([
                "judul" =>$request->judul,
                "slug" =>$request->slug,
                "id" =>$request->id,
                "user_id" =>auth()->user()->id, 
                "description" =>$request->description,
                "foto" =>$filename_save,
            ]);
            $jumlah1 = count($request->bahan);
            $jumlah2 = count($request->langkah);
            for($i = 0;$i<$jumlah1;$i++){
                Ingredient::create([
                    'resep_id' => $recipe->id,
                    'bahan_resep' => $request->bahan[$i]
                ]);
            }
            for($j = 0;$j<$jumlah2;$j++){
                Step::create([
                    'resep_id' => $recipe->id,
                    'langkah_resep' => $request->langkah[$j]
                ]);
            }
            $recipe->save();
        }
        return redirect('home');
    }
    public function show($slug)
    {
        if(Recipe::where('slug',$slug)->exists()){
            // $recipes= Recipe::where('slug',$slug)->first();
            // $ingredients = Ingredient::where('resep_id',$recipes->id)->get();
            // $steps=Step::where('resep_id',$recipes->id)->get();
            // $this->data['recipes']= Recipe::All();
            // $this->data['ingredients'] = Ingredient::All();
            // $this->data['steps']=Step::All();
            // $this->data['users']=User::All();
            // if(Recipe::where('slug',$slug)->exists()){
            $this->data['recipes']= Recipe::where('slug',$slug)->first();
            $this->data['ingredients'] = Ingredient::orderBy('id', 'ASC')->get();
            $this->data['steps']=Step::orderBy('id','ASC')->get();
            $this->data['users']=User::orderBy('id','ASC')->get();
        }
        // $this->data['recipes']= Recipe::All();
        //     $this->data['ingredients'] = Ingredient::All();
        //     $this->data['steps']=Step::All();
        //     $this->data['users']=User::All();
        return view('user.components.detail', $this->data);
        // return view('user.components.detail',compact('recipes','ingredients','steps'));
    }
}
