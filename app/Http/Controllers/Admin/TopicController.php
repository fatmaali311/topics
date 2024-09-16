<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;

    public function index()
    {
        $topics = Topic::with('category')->get();
        return view('admin.topics', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get();

        return view('admin.add_topic', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'published' => 'boolean',
            'trending' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['image'] = $this->uploadFile($request->image, 'assets/admin/images/topics');
        Topic::create($data);
        return redirect()->route('topics.index')->with('topic', 'topic added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topic_details', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_topic', compact(['topic', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'published' => 'nullable|boolean',
            'trending' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/admin/images/topics');
        }
        Topic::where('id', $id)->update($data);
        return redirect()->route('topics.index')->with('topic', 'topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->forceDelete();
        return redirect()->route('topics.index');
    }
}
