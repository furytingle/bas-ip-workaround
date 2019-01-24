<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $hrDepartment = factory(\App\Models\Department::class)->create([
            'name' => 'HR'
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'Recruiter',
                'department_id' => $hrDepartment->id
            ],
            [
                'name' => 'Office manager',
                'department_id' => $hrDepartment->id
            ]
        ]);

        $securityDepartment = factory(\App\Models\Department::class)->create([
            'name' => 'Security'
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'Guard',
                'department_id' => $securityDepartment->id
            ],
            [
                'name' => 'Firefighter',
                'department_id' => $securityDepartment->id
            ]
        ]);

        $helpDeskDepartment = factory(\App\Models\Department::class)->create([
            'name' => 'Helpdesk'
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'System administrator',
                'department_id' => $helpDeskDepartment->id
            ],
            [
                'name' => 'Support',
                'department_id' => $helpDeskDepartment->id
            ]
        ]);

        $salesDepartment = factory(\App\Models\Department::class)->create([
            'name' => 'Sales'
        ]);
        DB::table('positions')->insert([
            [
                'name' => 'Sales manager',
                'department_id' => $salesDepartment->id
            ],
            [
                'name' => 'Head of sales',
                'department_id' => $salesDepartment->id
            ]
        ]);
    }
}
