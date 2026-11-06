<?php
namespace App\\Http\\Controllers;
use App\\Models\\Appointment;
use App\\Models\\Service;
use Illuminate\\Http\\Request;
use Illuminate\\Validation\\ValidationException;
class BookingController extends Controller {
 public function index(){ $services=Service::where('is_active',true)->orderBy('name')->get(); return view('home',compact('services')); }
 public function store(Request $r){
  $d=$r->validate(['service_id'=>'required|exists:services,id','customer_name'=>'required|string|max:120','customer_email'=>'required|email|max:160','customer_phone'=>'nullable|string|max:30','appointment_date'=>'required|date|after_or_equal:today','appointment_time'=>'required|date_format:H:i','notes'=>'nullable|string|max:1000']);
  Service::where('is_active',true)->findOrFail($d['service_id']);
  if(Appointment::where('appointment_date',$d['appointment_date'])->where('appointment_time',$d['appointment_time'])->whereIn('status',['pending','confirmed'])->exists()) throw ValidationException::withMessages(['appointment_time'=>'This time is already booked. Choose another slot.']);
  $a=Appointment::create($d+['status'=>'pending']); return redirect()->route('booking.success',$a);
 }
 public function success(Appointment $appointment){ $appointment->load('service'); return view('success',compact('appointment')); }
}
