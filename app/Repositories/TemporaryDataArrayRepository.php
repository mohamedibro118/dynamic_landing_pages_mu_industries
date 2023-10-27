<?php

namespace App\Repositories;

class TemporaryDataArrayRepository implements TemporaryDataRepository
{
    protected $temporaryData = [];

    public function storeTemporaryData($key, $data)
    {
        $this->temporaryData[$key] = $data;
    }

    public function getTemporaryData($key)
    {
        return $this->temporaryData[$key] ?? null;
    }

    public function clearTemporaryData($key)
    {
        unset($this->temporaryData[$key]);
    }
}
