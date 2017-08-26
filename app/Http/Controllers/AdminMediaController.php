<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminMediaController extends Controller
{
    //
    public function index(){
        $photos = Photo::paginate(10);
        //return $photos;
        return view('admin.media.index',compact('photos'));
    }

    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request){
        if($file = $request->file('file')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['path'=>$name]);
        }
    }

    public function destroy($id){
        $photo = Photo::find($id);
        unlink(public_path(). $photo->path);
        $photo->delete();
        return redirect('admin/media');
    }
}
