<?php
use App\Models\User;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\User::factory(10)->create();

        User::factory()->create([
            'email' => 'danielotomo34@gmail.com',
            'password' => Hash::make('007665123')
        ]);
        $options = Option::factory(12)->create();
        Property::factory(50)->hasAttached($options->random(3))->create();
    }
}
