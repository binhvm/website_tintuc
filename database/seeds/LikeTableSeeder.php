<?php

use Illuminate\Database\Seeder;
use App\Like;
use App\User;
use App\News;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::truncate();
        $userIds = User::select('id')->pluck('id', 'id')->toArray();
        $newsIds = News::select('id')->pluck('id', 'id')->toArray();

        for ($i = 0; $i < 10000; $i++)
        {
            Like::create(
                [
                    'idUser' => array_rand($userIds),
                    'idTinTuc' => array_rand($newsIds),
                ]
            );
        }
    }
}
