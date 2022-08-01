<?php

namespace App\Repositories;

use App\Models\ZipCode;

class ZipCodeRepository {
    
    public function findOneById(string $zipCode)
    {
        return ZipCode::where('zip_code', $zipCode)->get();
    }
}