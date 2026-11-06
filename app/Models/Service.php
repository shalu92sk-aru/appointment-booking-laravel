<?php
namespace App\\Models;
use Illuminate\\Database\\Eloquent\\Model;
class Service extends Model {
 protected $fillable=['name','description','duration_minutes','price','is_active'];
 protected function casts(): array { return ['price'=>'decimal:2','is_active'=>'boolean']; }
}
