<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();

        if (!$adminRole) {
            $this->command->error('❌ El rol admin no existe.');
            return;
        }

        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123456'),
                'role_id' => $adminRole->id,
            ]
        );

        // Create a personal team for the user if they don't have one
        if (is_null($user->current_team_id)) {
            $user->ownedTeams()->save(\App\Models\Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0] . "'s Team",
                'personal_team' => true,
            ]));

            $user->switchTeam($user->ownedTeams()->first());
        }
    }
}
