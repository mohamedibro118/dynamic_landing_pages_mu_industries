<?php

namespace App\Imports;

use App\Models\admin\Compound;
use App\Models\admin\Property as AdminProperty;
use App\Models\admin\Type;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class PropertiesImport implements ToCollection
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
        $properties = $rows->skip(1);
        $currentcompound_id = $this->mapping['compound_id'];
        $currentcompound = Compound::findOrFail($currentcompound_id);
        $currenttype = $this->mapping['type_id'];
        $munalpropertydata = [
            'admin_id' => 3,
            'state_id' => 1,
            'nbhood_id' => $currentcompound->neighborhood->id,
            'name_ar' => (Type::select('name_ar')->where('id', $currenttype)->first())->name_ar . ' ' . time(),
            'name_en' => (Type::select('name_en')->where('id', $currenttype)->first())->name_en . ' ' . time(),
            'slug_ar' => Str::slug((Type::select('name_ar')->where('id', $currenttype)->first())->name_ar . ' ' . time()),
            'slug_en' => Str::slug((Type::select('name_en')->where('id', $currenttype)->first())->name_en . ' ' . time()),
            'logo' => 'images/properties/def/def.jpg',
            'date_delivery' => $currentcompound->date_delivery,
            'payment_down' => $currentcompound->payment_down,
            'payment_years' => $currentcompound->payment_years,
        ];

         $fullmapping=array_merge($munalpropertydata,$selectedColumns);

        $validatedProperties = $properties->map(function ($property) use ($header, $selectedColumns,$munalpropertydata) {
           
            
            foreach ($selectedColumns as $key => $selectedColumn) {
               
                $headerIndex = array_search($selectedColumn, $header->toArray());
                if ($headerIndex !== false) {
                    $selectedColumns[$key] = $property[$headerIndex];
                    }

            }
            
            $fullmapping=array_merge($munalpropertydata,$selectedColumns);
            // dd($fullmapping);
            $validator = Validator::make($fullmapping, [
                'name_en' => 'required|string',
                'name_ar' => 'required|string',
                'slug_en' => 'required|string|unique:properties',
                'slug_ar' => 'required|string|unique:properties',
                'logo' => 'nullable|string',
                'gallary' => 'nullable|string',
                'layouts' => 'nullable|string',
                'description_en' => 'nullable|string',
                'description_ar' => 'nullable|string',
                'bedroom' => 'nullable|string',
                'bathroom' => 'nullable|string',
                'parking' => 'nullable|string',
                'price' => 'required',
                'size' => 'nullable',
                'land_area' => 'nullable',

                'garden' => 'nullable|string',
                'floor' => 'nullable|string',
                'date_delivery' => 'nullable|date',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                $lineNumber = $property->keys()->first();
                $errorMsg = implode(', ', $errors);
                throw new \Exception("Error on line {$lineNumber}: {$errorMsg}");
            }

            return $fullmapping;

        });




        // dd($validatedProperties);

         AdminProperty::insert($validatedProperties->toArray());
    }
}
