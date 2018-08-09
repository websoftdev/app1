<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    //

    public function index(){
        $photos = Photo::all();
        return view('media.index', compact('photos'));
    }

    public function create(){

        return view('media.upload');
    }

    public function store(Request $request){

            $file = $request->file('file');
            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);
        }

        public function destroy($id){

            $photo = Photo::findOrFail($id);
            unlink(public_path().$photo->file);
            $photo->delete();
            return redirect('admin/media/index');
        }

        public function deleteMedia(Request $request){

        $photos = Photo::find($request->checkBoxArray);

        foreach($photos as $photo){
            $photo->delete();
        }

        return redirect()->back();
        }

}
