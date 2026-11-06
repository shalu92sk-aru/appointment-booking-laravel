<?php
namespace App\\Http\\Controllers;
use App\\Models\\Appointment;
use App\\Models\\Service;
use Illuminate\\Http\\Request;
use Illuminate\\Support\\Facades\\Auth;
class AdminController extends Controller {
 public function loginForm(){return view('admin.login');}
 public function login(Request $r){$d=$r->validate(['email'=>'required|email','password'=>'required']); if(Auth::attempt($d+['is_admin'=>true])){$r->session()->regenerate();return redirect()->route('admin.dashboard');} return back()->withErrors(['email'=>'Invalid admin credentials.']);}
 public function logout(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('admin.login');}
 public function dashboard(){ $appointments=Appointment::with('service')->latest()->paginate(12); $stats=['total'=>Appointment::count(),'pending'=>Appointment::where('status','pending')->count(),'confirmed'=>Appointment::where('status','confirmed')->count(),'services'=>Service::count()]; return view('admin.dashboard',compact('appointments','stats')); }
 public function status(Request $r,Appointment $appointment){$d=$r->validate(['status'=>'required|in:pending,confirmed,cancelled,completed']);$appointment->update($d);return back()->with('success','Status updated.');}
 public function services(){ $services=Service::orderBy('name')->get();return view('admin.services',compact('services')); }
 public function addService(Request $r){$d=$r->validate(['name'=>'required|max:120','description'=>'nullable|max:1000','duration_minutes'=>'required|integer|min:10|max:480','price'=>'required|numeric|min:0']);Service::create($d+['is_active'=>$r->boolean('is_active')]);return back()->with('success','Service added.');}
 public function toggle(Service $service){$service->update(['is_active'=>!$service->is_active]);return back()->with('success','Service availability updated.');}
}
