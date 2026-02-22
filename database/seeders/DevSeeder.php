<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'id' => 1,
                'book_code' => 'BK001',
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2005,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'book_code' => 'BK002',
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'publisher' => 'Hasta Mitra',
                'year' => 1980,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'book_code' => 'BK003',
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'publisher' => 'Gramedia',
                'year' => 2009,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'book_code' => 'BK004',
                'title' => 'Ayat-Ayat Cinta',
                'author' => 'Habiburrahman El Shirazy',
                'publisher' => 'Republika',
                'year' => 2004,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'book_code' => 'BK005',
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'author' => 'J.K. Rowling',
                'publisher' => 'Bloomsbury',
                'year' => 1997,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'book_code' => 'BK006',
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'publisher' => 'George Allen & Unwin',
                'year' => 1937,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'book_code' => 'BK007',
                'title' => '1984',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'year' => 1949,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'book_code' => 'BK008',
                'title' => 'Animal Farm',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'year' => 1945,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'book_code' => 'BK009',
                'title' => 'Dilan 1990',
                'author' => 'Pidi Baiq',
                'publisher' => 'Pastel Books',
                'year' => 2014,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'book_code' => 'BK010',
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'publisher' => 'Bentang Pustaka',
                'year' => 2009,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'book_code' => 'BK011',
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'publisher' => 'HarperOne',
                'year' => 1988,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'book_code' => 'BK012',
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'publisher' => 'J.B. Lippincott & Co.',
                'year' => 1960,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'book_code' => 'BK013',
                'title' => 'Pulang',
                'author' => 'Tere Liye',
                'publisher' => 'Republika',
                'year' => 2015,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'book_code' => 'BK014',
                'title' => 'Sang Pemimpi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'year' => 2006,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'book_code' => 'BK015',
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'publisher' => 'Doubleday',
                'year' => 2003,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        User::create(
            [
                'id' => 0,
                'school_id' => 0,
                'name' => 'ADMIN PERPUSTAKAAN',
                'class' => '',
                'major' => '',
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('admin'),
                'email' => 'perpustakaan@smktelkom-jkt.sch.id',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
