<?php


namespace App\Traits;

use Illuminate\Http\Request;


trait Searchable{
    function search($query,array $searchableFields){

        if(request()->has('search')){
            return $query->where(
                function($subquery) use ($searchableFields){
                    foreach ($searchableFields as $field) {
                        $subquery->orWhere($field,'like','%'.request('search').'%');
                    }
                }
            );
        }
    }
}