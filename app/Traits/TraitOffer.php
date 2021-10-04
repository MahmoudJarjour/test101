<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

Trait TraitOffer
{
     function saveImages($photo , $folder){
        $file_extension = $photo ->getClientOriginalExtension();
        $file_name= time().'.'.$file_extension;
        $path = $folder;

        $photo->move($path,$file_name);
        return $file_name;

    }

}
