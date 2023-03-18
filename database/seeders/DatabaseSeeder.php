<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Chiiya\FilamentAccessControl\Enumerators\RoleName;
use Chiiya\FilamentAccessControl\Models\FilamentUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = FilamentUser::firstOrCreate(
            [
                'first_name' => 'Thorsten',
                'last_name' => 'Ruppenstein',
                'email' => 'thorsten@ddev.site',
            ],
            [
                'first_name' => 'Thorsten',
                'last_name' => 'Ruppenstein',
                'email' => 'thorsten@ddev.site',
                'password' => Hash::make('thorsten@ddev.site')
            ]
        );

        $user->assignRole(RoleName::SUPER_ADMIN);
        $user->save();
    }
}
