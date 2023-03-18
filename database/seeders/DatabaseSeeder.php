<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\User;
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

        /**
         * Admin User
         */
        $adminuser = FilamentUser::firstOrCreate(
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

        $adminuser->assignRole(RoleName::SUPER_ADMIN);
        $adminuser->save();

        /**
         * App User
         */
        $user = User::firstOrCreate(
            [
                'name' => 'Thorsten',
                'email' => 'thorsten@ddev.site',
            ],
            [
                'name' => 'Thorsten',
                'email' => 'thorsten@ddev.site',
                'password' => Hash::make('thorsten@ddev.site')
            ]
        );


        /**
         * Personal Team
         */
        $user->ownedTeams()->create(
            [
                'name' => 'Thorsten\'s Team',
                'personal_team' => true,
            ]

        );
    }
}
