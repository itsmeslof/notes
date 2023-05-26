<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notes:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the default admin account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (User::where('is_admin', true)->first()) {
            $this->info('An admin account already exists. To reset it, run `php artisan notes:reset-admin`.');
            return Command::SUCCESS;
        }

        User::factory()->admin()->create();
        $this->info('Admin account created with default credentials:');

        $this->table(
            ['Email', 'Password'],
            [['admin@example.com', 'password']]
        );

        $this->warn('You should change these credentials immediately.');
        return Command::SUCCESS;
    }
}
