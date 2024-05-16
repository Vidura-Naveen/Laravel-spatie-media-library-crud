<?php

namespace App\Http\Controllers;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Illuminate\Http\Request;
use App\Models\NewPost;
use App\Http\Requests\NewPostReqest;

class NewPostController extends Controller
{
    public function index()
    {
        $posts = NewPost::all();

        return view('newposts.index', compact('posts'));
    }
    public function create()
    {
        return view('newposts.create');
    }

    public function store(NewPostReqest $request)
    {
        $newpost = NewPost::create($request->validated());
        if ($request->hasFile('image')) {
            $newpost->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {
            $newpost->addMediaFromRequest('download')->withResponsiveImages()->toMediaCollection('downloads');
        }
        return to_route('newposts.index');
    }
    public function edit($id)
    {
        $newpost = NewPost::findOrFail($id);
        return view('newposts.edit', compact('newpost'));
    }

    public function update(NewPostReqest $request, $id)
    {
        $newpost = NewPost::findOrFail($id);
        $newpost->update($request->validated());
        if ($request->hasFile('image')) {
            $newpost->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {
            $newpost->addMediaFromRequest('download')->withResponsiveImages()->toMediaCollection('downloads');
        }

        return to_route('newposts.index');
    }

    public function destroy($id)
    {
        $newpost = NewPost::findOrFail($id);
        $newpost->delete();
        return to_route('newposts.index');
    }

    public function download($id)
    {
        $newpost = NewPost::findOrFail($id);
        $media = $newpost->getFirstMedia('downloads');

        return $media;
    }

    public function downloads()
    {
        // $media = Media::where('collection_name', 'downloads')->get();

        return MediaStream::create('downloads.zip')->addMedia(Media::all());
    }

    public function resImage($id)
    {
        $post = NewPost::findOrFail($id);

        return view('newposts.show', compact('post'));
    }
}
