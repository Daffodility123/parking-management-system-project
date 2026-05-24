<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

use Illuminate\Support\Facades\DB;

echo "Exporting data from SQLite...\n";

$data = [
    'parking_spots' => DB::table('parking_spots')->get()->toArray(),
    'tickets' => DB::table('tickets')->get()->toArray(),
    'users' => DB::table('users')->get()->toArray()
];

file_put_contents('database_export.json', json_encode($data, JSON_PRETTY_PRINT));

echo "Data exported to database_export.json\n";
echo "Parking spots: " . count($data['parking_spots']) . "\n";
echo "Tickets: " . count($data['tickets']) . "\n";
echo "Users: " . count($data['users']) . "\n";
