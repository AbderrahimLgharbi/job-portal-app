<?php
namespace App\Services;


class Notify{

    static function createdNotification(){
        return  notify()->success('created succesful ⚡️','success');
    }
    static function updatedNotification(){
        return  notify()->success('updated succesful ⚡️','success');
    }

    static function deletedNotification(){
        return  notify()->success('deleted succesful ⚡️','success');
    }

    
}
