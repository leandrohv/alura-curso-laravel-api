<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getNomeAttribute($nome): string
    {
        return mb_strtoupper($nome);
    }
}
