<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('genre')->truncate();
        $genres = [
            ['Kinh dị'],
            ['Tâm lý tội phạm'],
            ['Lịch sử'],
            ['Văn học'],
            ['Hành động'],
            ['Học đường'],
            ['Tình cảm'],
            ['Lãng mạn'],
            ['Tạp chí'],
            ['Trinh thám'],
            ['Thể thao'],
            ['Trí tuệ'],
        ];
        foreach($genres as $genre){
            Genre::firstOrCreate([
                'genre_name'=>$genre[0],
                'genre_slug'=>Str::slug($genre[0], '-'),
                'created_at'=>Carbon::now(),
                'genre_status'=>'1'
            ]);
        };

        // Schema::enableForeignKeyConstraints();
    }
}
