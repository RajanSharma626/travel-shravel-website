<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-admin {email} {--name=} {--username=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote an existing user to admin, or create a new admin user if they do not exist.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->user_type = 'admin';
            $user->save();
            $this->info("Successfully promoted user '{$user->name}' ({$email}) to admin.");
            return 0;
        }

        $this->info("User with email {$email} not found. Creating a new admin user...");

        $name = $this->option('name') ?: $this->ask('Enter Name');
        $username = $this->option('username') ?: $this->ask('Enter Username');
        if (empty($username)) {
            $username = Str::slug($name) . '_' . rand(100, 999);
        }

        // Validate username uniqueness
        if (User::where('username', $username)->exists()) {
            $this->error("Username '{$username}' is already taken.");
            return 1;
        }

        $password = $this->secret('Enter Password (minimum 8 characters)');
        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters long.');
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => Hash::make($password),
            'user_type' => 'admin',
        ]);

        $this->info("Successfully created admin user '{$user->name}' ({$email}) with username '{$username}'.");
        return 0;
    }
}
