<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class AppendRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $TeacherRole = Role::create(['name' => 'teacher']);
//        $AdminRole = Role::create(['name' => 'admin']);
//        $StudentRole = Role::create(['name' => 'student']);
//
//        $UploadPermission = Permission::create(['name' => 'upload files']);
//        $WatchPermission = Permission::create(['name' => 'watch files']);
//        $AdminPanelPermission = Permission::create(['name' => 'watch admin']);
//        $UpdateStudentsPermission = Permission::create(['name' => 'update students']);

//        $StudentRole->givePermissionTo($WatchPermission);
//        $TeacherRole->givePermissionTo(['watch files','upload files','update students']);
//        $AdminRole->givePermissionTo(['watch files','upload files','update students','watch admin']);

        $admin = User::find(13);
        $teacher = User::find(14);
        $student = User::find(15);

        $admin->assignRole('admin');
        $teacher->assignRole('teacher');
        $student->assignRole('student');
    }
}
