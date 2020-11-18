<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use App\Models\Terminal;

class Acceptor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Terminal::truncate();
        Terminal::create([
            'terminalId' => 123625346124,
            'userName' => "admin",
            'userPassword' => "admin",
            'url' => "http://mvc.dev",
            'amount' => 10000000,
        ]);
    }
}
