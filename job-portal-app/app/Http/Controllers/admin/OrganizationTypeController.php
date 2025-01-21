<?php

namespace App\Http\Controllers\Admin;

use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\OrganisationType;
use App\Traits\Searchable;

use App\Http\Controllers\Controller;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Searchable;

    public function index()
    {
        $query = OrganisationType::query();
    
        $this->search($query, ['name']);
    
        $organizationTypes = $query->paginate(10);
        return view('admin.organization-type.index',compact('organizationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organisation_types,name']
        ]);

        $type = new OrganisationType();
        $type->name=$request->name;
        $type->save();

        Notify::createdNotification();
        return to_route('admin.organization-types.index');
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
        $organizationType = OrganisationType::findOrFail($id);
        return view('admin.organization-type.edit',compact('organizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organisation_types,name,'.$id]
        ]);

        $type = OrganisationType::findOrFail($id);
        $type->name=$request->name;
        $type->save();

        Notify::updatedNotification();
        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Attempt to find and delete the record
            OrganisationType::findOrFail($id)->delete();
        
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
