<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserEmployee;
use App\Models\UserAdmin;
use App\Models\BioEmployee;
use App\Models\UserCompany;
use App\Models\BioCompany;
use App\Models\Category;
use App\Models\EmployeeCompany;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // UserAdmin::create([
        //     'name'=>'Riski Meji',
        //     'email'=>'riskimeji6@gmail.com',
        //     'password'=>'jelek123',
        //     'password_confirmation'=>'jelek123',
        //     'phone_number'=>'085363779773',
        //     'status'=>'N',
        //     'roles'=>'A'
        // ]);
        // UserCompany::create([
        //     'name'=>'Alvin',
        //     'email'=>'alvin@gmail.com',
        //     'password'=>'jelek123',
        //     'password_confirmation'=>'jelek123',
        //     'phone_number'=>'085363779774',
        //     'roles'=>'B'
        // ]);
        Category::create([
            'name'=>'Guru'
        ]);
    }
}
