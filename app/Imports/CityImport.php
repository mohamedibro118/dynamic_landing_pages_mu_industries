<?php

namespace App\Imports;

use App\Models\admin\City;
use App\Models\admin\Province;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;


class CityImport implements ToCollection
{
    protected $mapping;

    public function __construct($mapping)
    {
        $this->mapping = $mapping;
    }

    public function collection(Collection $rows)
    {
        $selectedColumns = $this->mapping;
        $header = $rows->first();
        $cities = $rows->skip(1);
        $extradata = [
          
        ];

        //  $fullmapping=array_merge($extradata,$selectedColumns);

        $validatedcities = $cities->map(function ($city) use ($header, $selectedColumns,$extradata) {
           
            
            foreach ($selectedColumns as $key => $selectedColumn) {
               
                $headerIndex = array_search($selectedColumn, $header->toArray());
                if ($headerIndex !== false) {
                    $selectedColumns[$key] = $city[$headerIndex];
                    }

            }
            
            $fullmapping=array_merge($extradata,$selectedColumns);
            // dd($fullmapping);
            $validator = Validator::make($fullmapping, [
                'province_id' =>'required',
                'name_en' => 'required',
                'name_ar' => 'required',
               
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $lineNumber = $city->keys()->first();
                $errorMsg = implode(', ', $errors);
                throw new \Exception("Error on line {$lineNumber}: {$errorMsg}");
            }

            return $fullmapping;

        });




        // dd($validatedProperties);

         City::insert($validatedcities->toArray());
    }
}