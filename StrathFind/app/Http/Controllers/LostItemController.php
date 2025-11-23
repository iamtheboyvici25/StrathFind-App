<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LostItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    // GET /lost-items
    public function index()
    {
        // paginated list, newest first
        $items = LostItem::with('user')->latest()->paginate(12);
        return view('lost_items.index', compact('items'));
    }

    // GET /lost-items/{id}
    public function show(LostItem $lostItem)
    {
        return view('lost_items.show', ['item' => $lostItem->load('user','claims')]);
    }

    // GET /lost-items/create
    public function create()
    {
        return view('lost_items.create');
    }

    // POST /lost-items
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120', // 5MB
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'date_lost' => 'nullable|date',
        ]);

        $data['user_id'] = $request->user()->id;

        if ($request->hasFile('image')) {
            // store in storage/app/public/items
            $path = $request->file('image')->store('items', 'public');
            $data['image'] = $path;
        }

        $item = LostItem::create($data);

        // Option: fire event or create notifications here

        return redirect()->route('lost-items.show', $item)->with('success', 'Lost item created.');
    }

    // GET /lost-items/{id}/edit
    public function edit(LostItem $lostItem)
    {
       
        return view('lost_items.edit', compact('lostItem'));
    }

    // PUT/PATCH /lost-items/{id}
    public function update(Request $request, LostItem $lostItem)
    {
       

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'date_lost' => 'nullable|date',
            'status' => 'nullable|in:active,found,returned',
        ]);

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($lostItem->image) {
                Storage::disk('public')->delete($lostItem->image);
            }
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        $lostItem->update($data);

        return redirect()->route('lost-items.show', $lostItem)->with('success', 'Lost item updated.');
    }

    // DELETE /lost-items/{id}
    public function destroy(LostItem $lostItem)
    {
       

        if ($lostItem->image) {
            Storage::disk('public')->delete($lostItem->image);
        }

        $lostItem->delete();

        return redirect()->route('lost-items.index')->with('success', 'Lost item deleted.');
    }
}
