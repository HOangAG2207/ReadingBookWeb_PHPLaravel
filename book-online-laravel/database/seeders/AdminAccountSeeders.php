<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;

class AdminAccountSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $password = Hash::make('12345678');
        $adminRecords = [
            [
                'id'=>1,
                'name'=>'Quản trị viên',
                'email'=>'admin@gmail.com',
                'status'=>1,
                'password'=>$password,
                'phone'=>'0911111111',
                'address'=> 'Long Xuyên - An Giang',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]
        ];
        Admin::insert($adminRecords);
    }
}
