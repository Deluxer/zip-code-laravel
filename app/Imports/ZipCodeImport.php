<?php

namespace App\Imports;

use App\Models\ZipCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZipCodeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {
        $data = [
            "zip_code" => $rows["d_codigo"],
            "locality" => $rows["d_ciudad"],
            "federal_key" => $rows["c_estado"],
            "federal_name" => $rows["d_estado"],
            "federal_code" => null,
            "settlements_key" => $rows["id_asenta_cpcons"],
            "settlements_name" => $rows["d_asenta"],
            "settlements_zone" => $rows["d_zona"],
            "settlements_type_name" => $rows["d_tipo_asenta"],
            "municipalty_key" => $rows["c_mnpio"],
            "municipalty_name" => $rows["d_mnpio"],
        ];

        ZipCode::create($data);
    }
}
