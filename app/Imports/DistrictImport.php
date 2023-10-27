<?php

namespace App\Imports;

use App\Models\admin\District;
use App\Models\admin\Province;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Illuminate\View\Component;


class DistrictImport implements ToCollection
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
        $districts = $rows->skip(1);
        $extradata = [
          
        ];

        //  $fullmapping=array_merge($extradata,$selectedColumns);

        $validateddistricts = $districts->map(function ($district) use ($header, $selectedColumns,$extradata) {
           
            
            foreach ($selectedColumns as $key => $selectedColumn) {
               
                $headerIndex = array_search($selectedColumn, $header->toArray());
                if ($headerIndex !== false) {
                    $selectedColumns[$key] = $district[$headerIndex];
                    }

            }
            
            $fullmapping=array_merge($extradata,$selectedColumns);
            // dd($fullmapping);
            $validator = Validator::make($fullmapping, [
                'city_id'=>'required',
                'name_en' => 'required',
                'name_ar' => 'required',
               
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $lineNumber = $district->keys()->first();
                $errorMsg = implode(', ', $errors);
                throw new \Exception("Error on line {$lineNumber}: {$errorMsg}");
            }

            return $fullmapping;

        });




        // dd($validatedProperties);

         District::insert($validateddistricts->toArray());
    }
}