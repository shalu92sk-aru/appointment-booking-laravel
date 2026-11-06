<?php
namespace App\\Models;
use Illuminate\\Database\\Eloquent\\Model;
class Appointment extends Model {
 protected $fillable=['service_id','customer_name','customer_email','customer_phone','appointment_date','appointment_time','notes','status'];
 protected function casts(): array { return ['appointment_date'=>'date']; }
 public function service(){ return $this->belongsTo(Service::class); }
}
