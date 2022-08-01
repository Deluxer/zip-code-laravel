<?php

namespace App\Http\Controllers;

use App\Imports\ZipCodeImport;
use App\Repositories\ZipCodeRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ZipCodeController extends Controller
{
    public function __construct(
        private readonly ZipCodeRepository $zipCodeRepository
    ) {
    }

    /**
     * Route::get('api/zip-codes/{zipCode}')
     */
    public function index(Request $request, string $zipCode)
    {
        $_zipCode = $this->zipCodeRepository->findOneById($zipCode);
        if(count($_zipCode) === 0){
            return Response()->json([
                'msg' => 'Zip code not found',
                'data' => []
            ]);
        }

        foreach($_zipCode as $key => $code) {
            $settlements[$key] = [
                'key' => $code['settlements_key'],
                'name' => $this->removeAccent(Str::upper($code['settlements_name'])),
                'zone_type' => $this->removeAccent(Str::upper($code['settlements_zone'])),
                'settlement_type' => [
                    'name' => $code['settlements_type_name']
                ]
            ];
                
            $data = [
                'zip_code' => $code['zip_code'],
                'locality' => $this->removeAccent(Str::upper($code['locality'])),
                'federal_entity' => [
                    'key' => $code['federal_key'],
                    'name' => $this->removeAccent(Str::upper($code['federal_name'])),
                    'code' => $code['federal_code']
                ],
                'settlements' => $settlements,
                'municipality' => [
                    'key' => $code['municipalty_key'],
                    'name' => $this->removeAccent(Str::upper($code['municipalty_name']))
                ]
            ];
        }

        return Response()->json($data);
    }

    private function removeAccent(string $word): string
    {
        return iconv("utf-8", "ascii//TRANSLIT", $word);
    }

    /**
     * Route::post('/import')
     */
    public function import(Request $request)
    {
        Excel::import(new ZipCodeImport, $request->file('zip_codes'));
        
        //Session::flash('success', 'Category created successfully');

        return back();
    }
}
