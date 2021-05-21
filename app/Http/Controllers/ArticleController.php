<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Pacades\Validator;
use DB;
class ArticleController extends Controller
{
    function index(){
        // $articles = DB::table('articles')->orderBy('id','DESC')->get(); // get data by query builder
        // $articles = Article::all();//get data by Eloquent ORM
        $articles = Article::orderBy('id','DESC')->get();//get data by Eloquent ORM
        return view(view:'list')->with(compact('articles'));
    }

    function addArticles(){
        return view(view:'addarticle');
    }
    function saveArticles(Request $request){
       $validator = $request->validate([
        'title'=>'required|max:255',
        'description'=>'required',
        'author'=>'required|max:100'
       ]);
       if($validator){
        //insert into DB
        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->author = $request->author;
        $article->save();
        $request->session()->flash('msg','Article saved successfully!');
        return redirect(to:'/');
       }else{
        //return with error
         return Redirect::back()->withInput($request->all())->withErrors($validator);
       }
    }
    function editArticles($id , Request $request){
        // echo $id;
        $article = Article::where('id',$id)->first();
        if(!$article){
            $request->session()->flash('errorMsg','Record not found for update!');
            return redirect(to:'/');
        }
        
        // return view::make("editArticle", compact('article'));
        return view(view:'editArticle')->with(array('article'=>$article));
    }
    function updateArticle($id , Request $request){
        $validator = $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'author'=>'required|max:100'
           ]);
           if($validator){
            //insert into DB
            $article = Article::find($id);
            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;
            $article->save();
            $request->session()->flash('msg','Article updated successfully!');
            return redirect(to:'/');
           }else{
            //return with error
             return Redirect::back()->withInput($request->all())->withErrors($validator);
           }
    }
    function deleteArticles($id , Request $request){
        $article  = Article::where('id',$id)->first();
        if(!$article){
            $request->session()->flash('errorMsg','Record not found!');
            return redirect(to:'/');
        }
        Article::where('id',$id)->delete();
        $request->session()->flash('msg','Record has been deleted successfully');
        return redirect(to:'/');
    }
}
