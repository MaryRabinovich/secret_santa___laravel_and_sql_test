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
        shuffle($allUsersIDs);

        $i = 0;
        while ($i < $usersCount - 1) {
            SantaRelation::create([
                'santa_id' => $allUsersIDs[$i],
                'client_id' => $allUsersIDs[++$i]
            ]);
        }

        SantaRelation::create([
            'santa_id' => $allUsersIDs[$usersCount - 1],
            'client_id' => $allUsersIDs[0]
        ]);
    }
}
