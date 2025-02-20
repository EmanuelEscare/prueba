<?php

namespace Database\Seeders;

use App\Contracts\Security\StudentPermissions;
use App\Contracts\Security\SubjectPermissions;
use App\Contracts\Security\UserPermissions;
use App\Contracts\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use ReflectionClass;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_permissions = new ReflectionClass(UserPermissions::class);
        $user_permissions = $user_permissions->getConstants();

        $student_permissions = new ReflectionClass(StudentPermissions::class);
        $student_permissions = $student_permissions->getConstants();

        $subject_permissions = new ReflectionClass(SubjectPermissions::class);
        $subject_permissions = $subject_permissions->getConstants();

        $permissions = array_merge($user_permissions, $student_permissions, $subject_permissions);

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin_role = Role::where('name', UserRoles::ADMIN)->first();

        $admin_role->syncPermissions($permissions);

        $teacher_role = Role::where('name', UserRoles::TEACHER)->first();

        $teacher_role->syncPermissions($permissions);
    }
}
