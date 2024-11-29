<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    // Asegúrate de que Laravel use la tabla "animales"
    protected $table = 'animales';

    protected $fillable = ['nombre', 'especie', 'edad', 'color'];
}
