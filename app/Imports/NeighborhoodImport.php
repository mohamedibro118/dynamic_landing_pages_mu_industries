<?php

namespace App\Imports;

use App\Models\admin\Neighborhood;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;



class NeighborhoodImport implements ToCollection
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
        $neiborhoods = $rows->skip(1);
        $extradata = [
          
        ];

        //  $fullmapping=array_merge($extradata,$selectedColumns);

        $validatedneiborhoods = $neiborhoods->map(function ($neighborhood) use ($header, $selectedColumns,$extradata) {
           
            
            foreach ($selectedColumns as $key => $selectedColumn) {
               
                $headerIndex = array_search($selectedColumn, $header->toArray());
                if ($headerIndex !== false) {
                    $selectedColumns[$key] = $neighborhood[$headerIndex];
                    }

            }
            
            $fullmapping=array_merge($extradata,$selectedColumns);
            // dd($fullmapping);
            $validator = Validator::make($fullmapping, [
                'district_id'=>'required',
                'name_en' => 'required',
                'name_ar' => 'required',
               
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $lineNumber = $neighborhood->keys()->first();
                $errorMsg = implode(', ', $errors);
                throw new \Exception("Error on line {$lineNumber}: {$errorMsg}");
            }

            return $fullmapping;

        });




        // dd($validatedProperties);

         Neighborhood::insert($validatedneiborhoods->toArray());
    }
}