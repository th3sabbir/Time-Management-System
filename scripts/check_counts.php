<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "TimeEntries: " . App\Models\TimeEntry::count() . PHP_EOL;
echo "Projects: " . App\Models\Project::count() . PHP_EOL;
echo "WorkTypes: " . App\Models\WorkType::count() . PHP_EOL;
echo "Users: " . App\Models\User::count() . PHP_EOL;
