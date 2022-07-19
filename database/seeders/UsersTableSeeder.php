<?php

namespace Database\Seeders;

use App\Models\ClientDetails;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'directure']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'client']);

        $users = new User();
        $users->name = 'Director';
        $users->email = 'directure@example.com';
        $users->password = bcrypt('admin123');
        $users->gender = 'male';
        $users->status = 'active';
        $users->save();

        $employee = new EmployeeDetails();
        $employee->user_id = $users->id;
        $employee->job_title = 'Directur';
        $employee->save();

        $users->assignRole('directure');

        /**
         * Add Employee
         */
        $users = new User();
        $users->name = 'Employee';
        $users->email = 'employee@example.com';
        $users->password = bcrypt('employee123');
        $users->gender = 'male';
        $users->status = 'active';
        $users->save();

        $employee = new EmployeeDetails();
        $employee->user_id = $users->id;
        $employee->job_title = 'Employee';
        $employee->save();

        $users->assignRole('employee');

        /**
         * Add Client
         */
        $users = new User();
        $users->name = 'Client';
        $users->email = 'client@example.com';
        $users->password = bcrypt('client123');
        $users->gender = 'male';
        $users->status = 'active';
        $users->save();

        $employee = new ClientDetails();
        $employee->user_id = $users->id;
        $employee->company_name = 'PT. Example Client';
        $employee->save();
        $users->assignRole('client');

        $users = new User();
        $users->name = 'Client-1';
        $users->email = 'clients@example.com';
        $users->password = bcrypt('client123');
        $users->gender = 'male';
        $users->status = 'active';
        $users->save();

        $employee = new ClientDetails();
        $employee->user_id = $users->id;
        $employee->company_name = 'PT. Client 1';
        $employee->save();

        $users->assignRole('client');
    }
}
