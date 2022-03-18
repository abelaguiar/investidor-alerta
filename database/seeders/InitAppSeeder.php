<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class InitAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Role::first())) {
            Role::create(['name' => 'Administrador']);
            Role::create(['name' => 'Visitante']);
        }

        if (is_null(User::first())) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'phone' => '(85)98888-8888',
                'password' => bcrypt('password'),
                'role_id' => Role::first()->id,
                'authorized' => true
            ]);
        }

        if (is_null(Company::first())) {
            Company::create(['name' => 'Empresa teste', 'cnpj' => '30.313.477/0001-98']);
        }
    }
}
