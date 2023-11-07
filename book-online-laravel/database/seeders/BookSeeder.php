<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['Sách 1'],
            ['Sách 2'],
            ['Sách 3'],
            ['Sách 4'],
            ['Sách 5'],
            ['Sách 6'],
            ['Sách 7'],
            ['Sách 8'],
            ['Sách 9'],
            ['Sách 10'],
        ];
        foreach($books as $book){
            Book::firstOrCreate([
                'book_name'=>$book[0],
                'book_slug'=>Str::slug($book[0], '-'),
                'created_at'=>Carbon::now(),
                'book_status'=>'1'
            ]);
        };
    }
}
