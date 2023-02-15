<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5) // array of tag
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    // show create form
    public function create()
    {
        return view('listings.create');
    }

    // store listing data (create)
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'nullable',
        ]);
        if ($request->hasFile('logo')) {
            $form_fields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($form_fields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // show update form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data (edit)
    public function update(Request $request, Listing $listing)
    {
        $form_fields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'nullable',
        ]);
        if ($request->hasFile('logo')) {
            $form_fields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($form_fields);
        return back()->with('message', 'Listing updated successfully!');
    }

    // Delete listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
