<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;use App\Models\User;use App\Models\Service;
class DatabaseSeeder extends Seeder {public function run():void{User::updateOrCreate(['email'=>'admin@bookease.test'],['name'=>'BookEase Admin','password'=>Hash::make('ChangeMe123!'),'is_admin'=>true]);foreach([['Consultation','Initial consultation.',30,25],['Standard Appointment','One-to-one appointment.',45,40],['Extended Session','Extended consultation.',60,60]] as $s){Service::firstOrCreate(['name'=>$s[0]],['description'=>$s[1],'duration_minutes'=>$s[2],'price'=>$s[3],'is_active'=>true]);}}}
