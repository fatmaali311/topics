<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use common;
    public function index()
    {
        $topics = Topic::where('published', 1)->latest()->take(2)->orderBy('views', 'desc')->get();
        $categories = Category::with(['topics' => function ($query) {
            $query->where('published', 1)->orderBy('views', 'desc')->latest()->take(3);
        }])
            ->limit(5)
            ->get();

        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();

        return view('public.index', compact(['categories', 'testimonials', 'topics']));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::get();
        return view('public.testimonials', compact('testimonials'));
    }
    public function topicListing()
    {
        $topics = Topic::where('published', 1)
            ->orderBy('views', 'desc')
            ->paginate(3);

        $trending = Topic::where('published', 1)
            ->where('trending', 1)
            ->latest()
            ->take(2)
            ->orderBy('views', 'desc')
            ->get();

        return view('public.topics-listing', compact(['trending', 'topics']));
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => 'required|string|max:100',
            'email' => 'required|string|max:50',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        Contact::create($data);
        Mail::to('your_email@gmail.com')->send(new ContactMail($data));
        return redirect()->route('contactus');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $topic = Topic::with('category')->findOrFail($id);
        return view('public.topics-detail', compact('topic'));
    }

    public function increaceViews(string $id)
    {

        $topic = Topic::findOrFail($id);
        $topic->views = $topic->views + 1;
        $topic->save();
        return redirect()->back();
    }
    public function contact()
    {
        return view('public.contact');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
