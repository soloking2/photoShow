<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Import Storage to delete the picture from the storage
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        //
        return view('photos.create')->with('album_id', $album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'title' => 'required',
          'photo' => 'image|max:1999'
        ]);

        //Get image original name
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        //Get the filename without extenson
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //Get the extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        //create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Upload the image
        $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

        //store the variables
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $photo = Photo::find($id);
        return view('photos.edit')->with('photo', $photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the photo
        $photo = Photo::find($id);
        //delete from storage
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
          //delete from database
          $photo->delete();

          //redirect
          return redirect('/')->with('success', 'Photo Deleted');
        }
    }
}
