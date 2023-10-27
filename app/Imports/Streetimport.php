<?php

namespace App\Imports;


use App\Models\admin\Street;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
// use Maatwebsite\Excel\Validators\Failure;


class Streetimport implements ToModel,
WithHeadingRow, 
SkipsOnError,
SkipsOnFailure
{
    use Importable ,SkipsErrors,SkipsFailures;
    public $x=0;
    public function model(array $row)
    { 

        $this->x++;
        $validate=Validator::make($row,[
            'neighborhood_id'=>'required',
            'name_ar' => [
                'required',
                 Rule::unique('streets')->where(function ($query) use($row) {
                    return $query->where('neighborhood_id', $row['neighborhood_id'])
                    ->where('name_en',$row['name_ar']);
                 })
                ],
            'name_en' => [
                'required',
                 Rule::unique('streets')->where(function ($query) use($row) {
                    return $query->where('neighborhood_id', $row['neighborhood_id'])
                    ->where('name_en',$row['name_en']);
                 })
                ],
            ],$this->getmessage($this->x))->validate();

        return new Street([
           'neighborhood_id'=>$row['neighborhood_id'],
           'name_en' => $row['name_en'],
           'name_ar' => $row['name_ar'], 
           'description_en'=>$row['description_en'], 
           'description_ar'=>$row['description_ar'], 
        ]);
    }
     
    
    public function getmessage($x){
        return [
            'neighborhood_id.required'=> 'Please enter the neighborhood_id   at row '.$x,
            'name_ar.required' => 'Please enter the street arabic name at row '.$x,
            'name_ar.unique' => 'arabic name of streets must be unique at row '.$x,
            'name_en.required' => 'Please enter the street english name at row '.$x,
            'name_en.unique' => 'english name of streets must be unique at row '.$x,
            
            
        ];
    }

    
}
