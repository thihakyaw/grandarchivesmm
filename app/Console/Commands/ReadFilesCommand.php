<?php

namespace App\Console\Commands;

use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ReadFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Read the file names and cache those in redis.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('down');

        Cache::forget(File::FILES_CACHE_NAME);
        Cache::forever(File::FILES_CACHE_NAME, Storage::disk('public')->files(File::DIRECTORY));

        Cache::forget(File::FILES_CACHE_COUNT);
        Cache::forever(File::FILES_CACHE_COUNT, count(Storage::disk('public')->files(File::DIRECTORY)));

        Artisan::call('up');
        $this->info('Files has read and stored in cache.');
    }
}
