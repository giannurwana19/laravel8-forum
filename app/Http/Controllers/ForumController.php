<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ok';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        $data = $request->all();

        $slug  = Str::slug($request->title);
        $image = $request->file('image');

        if ($image) {
            $imageName = Str::random(50) . '.' .  $image->extension();
            $imageUrl = $image->storeAs('images/forums', $imageName);
        } else {
            $imageUrl = null;
        }

        $data['image'] = $imageUrl;
        $data['slug'] = $slug;
        $data['user_id'] = auth()->id();

        Forum::create($data);

        session()->flash('success', 'Forum berhasil ditambahkan!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        return view('forums.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        $data = $request->all();

        $slug  = Str::slug($request->title);
        $image = $request->file('image');

        if ($image) {
            if($forum->image){
                Storage::delete($forum->image);
            }

            $imageName = Str::random(50) . '.' .  $image->extension();
            $imageUrl = $image->storeAs('images/forums', $imageName);
        } else {
            $imageUrl = $forum->image;
        }

        $data['image'] = $imageUrl;
        $data['slug'] = $slug;
        $data['user_id'] = auth()->id();

        $forum->update($data);

        session()->flash('success', 'Forum berhasil diubah!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}










// h: DOKUMENTASI
// untuk slug biasanya tidak diubah meski judulnya berubah
// karena itu untuk link seo nya
// takut nya ketika slug nya diubah
// link lama tidak bisa digunakan lagi
// makanya kita harus daftarkan lagi slug nya di google
// nanti kita cari tahu caranya

// untuk file_systems.php
// pada baris 48
// kita juga bisa mengubahnya menjadi public_path('posts')
// dalam contoh ini
// jadi kita simpan file di storage/public/posts
