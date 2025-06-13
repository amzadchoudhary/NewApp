<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;

class SetupApplication extends Command
{
    protected $signature = 'app:setup';
    protected $description = 'Setup environment, run migrations and seeders, and create an admin user';

    public function handle()
    {
        $this->info("🔧 Setting up the application...");

        // Step 1: Get DB credentials
        $dbName = $this->ask('Enter database name');
        $dbUser = $this->ask('Enter database username');
        $dbPass = $this->secret('Enter database password (input hidden)');
        $dbHost = $this->ask('Enter database host', '127.0.0.1');
        $dbPort = $this->ask('Enter database port', '3306');

        // Step 2: Create or update .env
        $envPath = base_path('.env');
        if (!File::exists($envPath)) {
            File::copy(base_path('.env.example'), $envPath);
        }

        $envContent = File::get($envPath);

        $replacements = [
            'DB_CONNECTION' => 'mysql',
            'DB_HOST' => $dbHost,
            'DB_PORT' => $dbPort,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUser,
            'DB_PASSWORD' => $dbPass,
        ];

        foreach ($replacements as $key => $value) {
            $pattern = "/^{$key}=.*$/m";
            $replacement = "{$key}={$value}";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= "\n{$replacement}";
            }
        }

        File::put($envPath, $envContent);
        $this->info("✅ .env file created/updated.");

        // Step 3: Clear and cache config
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        // Step 4: Run migration & seeder
        $this->info("🏗 Running migrations and seeders...");
        Artisan::call('migrate:fresh', [], $this->getOutput());
        Artisan::call('db:seed', [], $this->getOutput());

        // Step 3: Generate application key
        Artisan::call('key:generate');
        $this->info("🔑 Application key generated.");

        // Step 4: Clear and cache config
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        // Step 5: Create user
        $this->info("👤 Let's create an admin user.");
        $name = $this->ask('Enter full name');
        $email = $this->ask('Enter email');
        $password = $this->secret('Enter password (input hidden)');

        User::create([
            'name' => $name,
            'email' => $email,
            'role' => 'admin',
            'password' => Hash::make($password),
        ]);

        $this->info("🎉 Admin user created successfully!");
    }
}
