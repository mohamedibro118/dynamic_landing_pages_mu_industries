<?php

namespace App\Imports;

use App\Models\admin\Province;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Illuminate\View\Component;


class Provinceimport implements ToCollection
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
        $provinces = $rows->skip(1);
        $extradata = [
          
        ];

        //  $fullmapping=array_merge($extradata,$selectedColumns);

        $validatedprovinces = $provinces->map(function ($province) use ($header, $selectedColumns,$extradata) {
           
            
            foreach ($selectedColumns as $key => $selectedColumn) {
               
                $headerIndex = array_search($selectedColumn, $header->toArray());
                if ($headerIndex !== false) {
                    $selectedColumns[$key] = $province[$headerIndex];
                    }

            }
            
            $fullmapping=array_merge($extradata,$selectedColumns);
            // dd($fullmapping);
            $validator = Validator::make($fullmapping, [
                'name_en' => 'required|string',
                'name_ar' => 'required|string',
               
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $lineNumber = $province->keys()->first();
                $errorMsg = implode(', ', $errors);
                throw new \Exception("Error on line {$lineNumber}: {$errorMsg}");
            }

            return $fullmapping;

        });




        // dd($validatedProperties);

         Province::insert($validatedprovinces->toArray());
    }
}