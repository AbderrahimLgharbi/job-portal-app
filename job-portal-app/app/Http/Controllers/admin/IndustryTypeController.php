<?php

namespace App\Http\Controllers\Admin;

use App\Services\Notify;
use App\Traits\Searchable;
use App\Models\IndustryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class IndustryTypeController extends Controller
{
    use Searchable;


    public function index(Request $request)
    {
        $query = IndustryType::query();
    
        $this->search($query, ['name']);
    
        $types = $query->paginate(10);
        return view('admin.industry-type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name']
        ]);

        $type = new IndustryType();
        $type->name=$request->name;
        $type->save();

        Notify::createdNotification();
        return to_route('admin.industry-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $industryType = IndustryType::findOrFail($id);
        return view('admin.industry-type.edit',compact('industryType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:industry_types,name,'.$id]
        ]);

        $type = IndustryType::findOrFail($id);
        $type->name=$request->name;
        $type->save();

        Notify::updatedNotification();
        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Attempt to find and delete the record
            IndustryType::findOrFail($id)->delete();
        
            // Trigger a notification for successful deletion
            Notify::deletedNotification();
        
            // Return a success response
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            // Log the exception for debugging
            logger($e);
        
            // Return an error response
            return response(['message' => 'error'], 500);
        }
    }
}
