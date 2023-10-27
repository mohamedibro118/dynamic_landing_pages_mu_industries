<?php

namespace App\Repositories;

interface TemporaryDataRepository
{
    public function storeTemporaryData($key, $data);
    public function getTemporaryData($key);
    public function clearTemporaryData($key);
}
