<?php

namespace App\Imports;

use App\Models\admin\Compound;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;


class CompoundImport implements ToModel,
WithHeadingRow, 
SkipsOnError,
WithValidation,
SkipsOnFailure
{
    use Importable ,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Compound([
            'admin_id'=>Auth::id(),
            'nhood_id'=>$row['nhood_id'],
            'dev_id'=>$row['dev_id'],
            'payment_down'=>$row['payment_down'],
            'payment_years'=>$row['payment_years'],
            'name_ar' => $row['name_ar'],
            'name_en' => $row['name_en'],
            'slug_ar'=>Str::slug($row['name_ar']),
            'slug_en'=>Str::slug($row['name_en']),
            'description_ar'=>$row['description_ar'],
            'description_en'=>$row['description_en'],
            'logo'=>'images/projects/logo/16641389354.jpg',
           
        ]);
    }
    public function rules(): array
    {
        return [
            '*.nhood_id'=>['required'],
            '*.dev_id'=>['required'],
            '*.payment_down'=>['required'],
            '*.payment_years'=>['required'],
            '*.name_ar' => ['required','unique:compounds,name_ar'],
            '*.name_en' =>['required','unique:compounds,name_en'] ,
        ];
    }

    
}
