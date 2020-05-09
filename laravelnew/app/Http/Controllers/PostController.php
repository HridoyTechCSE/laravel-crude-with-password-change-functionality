<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Str;
class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request ){
        
         $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required|min:4|max:10',
        'tag' => 'required',
        'description' => 'required',
             
             
    ]);
        
    $post = new Post;
    $post->title = $request->title;
    $post->author = $request->author;
    $post->tag = $request->tag;
    $post->description = $request->description;
    $post->save();
        
        
    if ($post->save()) {
        
        $notification=array(
            'messege'=>'Post Added Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    else{
        
        return redirect()->back();
    }  
        
        
    }
    
    
    
    
    public function AllPost()
    {
        $post=Post::all();
        
        return view('all_post')->with('post',$post);
    }
    
    
    public function delete($id)
    {
       $post = Post::find($id);
        $post->delete();
        
        
        
        if ($post->delete()) {
        
        $notification=array(
            'messege'=>'Post deleted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    else{
        
        return redirect()->back();
    }  
        
    }
    
    public function edite($id)
    {
        
       $post = Post::findorfail($id);
        return view('editpost',compact('post'));
        
        
        
    }
    
    public function update(request $request,$id)
    {
          $validatedData = $request->validate([
        'title' => 'required||max:255',
        'author' => 'required|min:4|max:10',
        'tag' => 'required',
        'description' => 'required',
             
             
    ]);
        
      $post= Post::findorfail($id);  
         $post->title = $request->title;
    $post->author = $request->author;
    $post->tag = $request->tag;
    $post->description = $request->description;
   $update= $post->save();
        
     if ($update) {
         
        $notification=array(
            'messege'=>'Post update Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('home')->with($notification);
    }
    else{
        
        return redirect()->back();
    }  
           
        
        
    }
    
    
    
    public function news()
    {
        return view('news_add');
        
    }
    
    
    
    public function insertnews(request $request)
    {
         $validatedData = $request->validate([
        'title' => 'required||max:255',
        'author' => 'required|min:4|max:10',
        'image' => 'required',
        'details' => 'required',
             
             
    ]);
        
    $data=array();
    $data['title']=$request->title;
    $data['details']=$request->details;
    $data['author']=$request->author;
        $image=$request->image;
        
        if($image)
        {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension() );
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/post/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            
            if($success)
            {
                $data['image']=$image_url;
                $post=db::table('newss')->insert($data);
                if($post)
                {
                     $notification=array(
                        'messege'=>'News added Successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('news.add')->with($notification);
                    
                }else{
                    return redirect()->back();
                }
                
            }
        }else{
            return redirect()->back();
        }
        
    }
    
    
    public function allnews()
    {
        $news=DB::table('newss')->get();
        return view('all_news', compact('news'));
        
    }
    
    
    
    public function deleteNews($id)
    {
        $img=DB::table('newss')->where('id',$id)->first();
        
        $image_path=$img->image;
        $done=unlink($image_path);
        
        $delete=DB::table('newss')->where('id',$id)->delete();
        if($delete)
                {
                     $notification=array(
                        'messege'=>'News delete Successfully',
                        'alert-type'=>'success'
                    );
                    return redirect()->route('all.news')->with($notification);
                    
                }else{
                    return redirect()->back();
                }
                
        
        
        
    }
    
    
}
