<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notebook:reset-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the default admin account.';

    /**
     * Execute the console command.
     *
     * @return int
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
            $admin = User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'is_admin' => true
            ]);
        }

        $this->info('The default admin account has been reset with the following credentials:');

        $header = ['Email', 'Password'];
        $body = [
            ['admin@example.com', 'password'],
        ];
        $this->table($header, $body);

        $this->warn('You should login and change these credentials immediately.');

        return Command::SUCCESS;
    }
}
