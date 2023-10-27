<?php
namespace App\Facades;
use App\Helber\Helbing;
use App\Repositories\TemporaryDataRepository;
use Illuminate\Support\Facades\Facade;

class Temp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TemporaryDataRepository::class;
    }
}
