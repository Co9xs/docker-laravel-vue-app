<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    public function reviews(): HasMany
    {
        return $this->HasMany('App\Review');
    }
}