<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;

class ForceDeleteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ForceDelete:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data akan dihapus permanent setiap 1 menit';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        // Student::onlyTrashed()->forceDelete();
        // $this->info('Successfully sent daily quote to everyone.');
    }
}