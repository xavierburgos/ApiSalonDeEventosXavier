<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $nivel1 = Role::create(['name'=>'admin']);
        $nivel2 = Role::create(['name'=>'empleado']);
        $nivel3 = Role::create(['name'=>'cliente']);

        Permission::create(['name' => 'register.users'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'show.users'])->syncRoles([$nivel1]);

        Permission::create(['name' => 'index.branches'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'store.branches'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'update.branches'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'destroy.branches'])->syncRoles([$nivel1]);

        Permission::create(['name' => 'index.clients'])->syncRoles([$nivel1, $nivel2, $nivel3]);
        Permission::create(['name' => 'store.clients'])->syncRoles([$nivel1, $nivel2]);
        Permission::create(['name' => 'update.clients'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'destroy.clients'])->syncRoles([$nivel1]);

        Permission::create(['name' => 'index.appointments'])->syncRoles([$nivel1]);
        Permission::create(['name' => 'store.appointments'])->syncRoles([$nivel1, $nivel2]);
        Permission::create(['name' => 'update.appointments'])->syncRoles([$nivel1, $nivel2]);
        Permission::create(['name' => 'destroy.appointments'])->syncRoles([$nivel1, $nivel2]);
    }
}
