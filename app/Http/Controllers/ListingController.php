<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(8)]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $data['created_by'] = Auth::id();

        Listing::create($data);

        return redirect('/')->with('message', 'Listing Added');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Listing $listing, Request $request)
    {
        if (Auth::id() != $listing->created_by)
            return abort(403, 'Unauthorized');

        $data = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);



        Listing::where(['id' => $listing->id])->update($data);

        return redirect('/')->with('message', 'Listing Updated');
    }

    public function destroy(Listing $listing)
    {
        if (Auth::id() != $listing->created_by)
            return abort(403, 'Unauthorized');

        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted');
    }
}
