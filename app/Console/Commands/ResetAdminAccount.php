<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdminAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notes:reset-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the default admin account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $admin = User::where('is_admin', true)->first();

        if ($admin) {
            $admin->update([
                'email' => 'admin@example.com',
                'password' => Hash::make('password')
            ]);
        } else {
            $admin = User::factory()->admin()->create();
        }

        $this->showMessage();
        return Command::SUCCESS;
    }

    public function showMessage()
    {
        $this->info('Admin account created with default credentials:');

        $this->table(
            ['Email', 'Password'],
            [['admin@example.com', 'password']]
        );

        $this->warn('You should change these credentials immediately.');
    }
}
