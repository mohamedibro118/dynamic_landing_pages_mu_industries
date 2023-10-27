<?php
namespace App\Facades;
use App\Helber\Helbing;
use Illuminate\Support\Facades\Facade;

class Helber extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Helbing::class;
    }
}
