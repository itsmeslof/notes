<?php

namespace App\Console\Commands;

use App\Models\StaticPage;
use App\Models\User;
use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notebook:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the default configuration and account for the app.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createDefaultAdminAccount();
        $this->createDefaultMarkdownGuide();
        $this->createDefaultSettingsFile();

        return Command::SUCCESS;
    }

    private function createDefaultAdminAccount()
    {
        if (User::where('is_admin', true)->first()) {
            $this->info('Default admin account already exists. To reset it, run `php artisan notebook:reset-admin`.');
            return;
        }

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => true
        ]);

        $this->info('Default admin account created with the following credentials:');

        $header = ['Email', 'Password'];
        $body = [
            ['admin@example.com', 'password'],
        ];
        $this->table($header, $body);

        $this->warn('You should login and change these credentials immediately.');
    }

    private function createDefaultMarkdownGuide()
    {
        $mdGuidePath = base_path() . '//MarkdownGuide.md';

        if (StaticPage::where('slug', 'markdown-guide')->first()) {
            $this->info('Markdown Guide already exists, skipping.');
            return;
        }

        if (!file_exists($mdGuidePath)) {
            $this->warn($mdGuidePath . ' does not exist, skipping.');
            return;
        }

        $contents = file_get_contents($mdGuidePath);
        StaticPage::create([
            'title' => 'Markdown Guide',
            'slug' => 'markdown-guide',
            'md_content' => $contents
        ]);

        $this->info('Default Markdown Guide created successfully!');
    }

    private function createDefaultSettingsFile()
    {
        $settingsFilePath = storage_path('app//settings.json');

        if (file_exists($settingsFilePath)) {
            $this->info('Settings file already exists, skipping.');
            return;
        }

        $defaultSettings = [
            'enable_user_registration' => false,
            'show_home_page' => true
        ];

        settings()->put($defaultSettings);
        $this->info('Default settings created with the following options:');

        $header = ['Option', 'Value'];
        $body = [
            ['Enable User Registration', 'No'],
            ['Show Home Page', 'Yes']
        ];
        $this->table($header, $body);

        $this->info('You can edit these settings by logging into the admin account and visiting ' . route('admin.site-settings.index'));
    }
}
