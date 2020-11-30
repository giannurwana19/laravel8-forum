<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $populars = $this->getPopularForums();

        $forums = Forum::latest()->paginate(4);
        return view('forums.index', compact('forums', 'populars'));
    }

    private function getPopularForums()
    {
        return Forum::join('counterables', 'forums.id', '=', 'counterables.counterable_id')->orderBy('value', 'desc')->take(4)->get(); // .. 2
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Buat pertanyaan forum baru';
        $user = User::findOrFail(auth()->id());
        $lastForum = $user->forums()->orderBy('id', 'desc')->first();
        $forum = new Forum();
        $tags = Tag::all();

        return view('forums.create', compact('tags', 'lastForum', 'forum', 'title'));
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:512'
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

        $forum  = Forum::create($data);

        $forum->tags()->sync($request->tags);

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
        $populars = $this->getPopularForums();

        $forum->incrementCounter('number_of_visitors'); // .. 1
        return view('forums.show', compact('forum', 'populars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        $title = 'Edit pertanyaan forum';
        $tags = Tag::all();
        return view('forums.edit', compact('forum', 'tags', 'title'));
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:512'
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
        $forum->tags()->sync($request->tags);

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

// mencari semua relasi dari tag
// dd($forum->tags()->allRelatedIds());

// p: clue 1
// kita menambahkan 1 jumlah visitor setiap kali membuat page show

// p: clue 2
// kitam mengambil data post yang popular berdasarkan jumlah value yang paling besar pada counternya
