<?php

namespace Database\Seeders;

use App\Models\SantaRelation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SantaRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersCount = User::count();

        $allUsersIDs = range(1, $usersCount);

        $allUsersIDsShuffled = range(1, $usersCount);
        shuffle($allUsersIDsShuffled);

        foreach ($allUsersIDs as $key => $santaID) {
            SantaRelation::create([
                'santa_id' => $santaID,
                'client_id' => $allUsersIDsShuffled[$key]
            ]);
        }
    }
}
