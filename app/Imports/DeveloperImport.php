<?php

namespace App\Imports;

use App\Models\admin\Developer;
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


class DeveloperImport implements ToModel,
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
        return new Developer([
            'admin_id'=>Auth::id(),
            'slug_ar'=>Str::slug($row['name_ar']),
            'slug_en'=>Str::slug($row['name_en']),
            'name_ar'=>$row['name_ar'],
            'name_en'=>$row['name_en'],
            'photo'=>'images/developer/16641254194.jpg',
            'description_ar'=>$row['description_ar'],
            'description_en'=>$row['description_en'], 
        ]);
    }
    public function rules(): array
    {
        return [
            '*.name_ar' => ['required','unique:developers,name_ar'],
            '*.name_en' => ['required','unique:developers,name_en'],
        ];
    }

    
}
