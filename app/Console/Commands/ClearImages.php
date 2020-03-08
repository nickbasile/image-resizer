<?php

namespace App\Console\Commands;

use App\Image;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all images stored in the app.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Are you sure you want to delete all of the images?')) {
            Image::query()->delete();
            Storage::disk('public')->deleteDirectory('resized');
        }
    }
}
