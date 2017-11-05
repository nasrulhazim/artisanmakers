<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands\Database;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Database Connection using Artisan Command';

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
        //// ask database name, default is splate
        $connection = $this->ask('What is your connection type?', 'mysql');
        $host       = $this->ask('What is your database host?', '127.0.0.1');
        $port       = $this->ask('What is your database port?', 3306);
        $database   = $this->ask('What is your database name?', 'database_name');
        $username   = $this->ask('What is your database user?', 'database_username');
        $password   = $this->secret('What is your database user\'s password?', 'password');

        $default_connection = $this->laravel['config']['database.default'];
        $connection_details = $this->laravel['config']['database.connections.' . $default_connection];

        file_put_contents($this->laravel->environmentFilePath(), str_replace(
            [
                'DB_CONNECTION=' . $default_connection,
                'DB_HOST=' . $connection_details['host'],
                'DB_PORT=' . $connection_details['port'],
                'DB_DATABASE=' . $connection_details['database'],
                'DB_USERNAME=' . $connection_details['username'],
                'DB_PASSWORD=' . $connection_details['password'],
            ],
            [
                'DB_CONNECTION=' . $connection,
                'DB_HOST=' . $host,
                'DB_PORT=' . $port,
                'DB_DATABASE=' . $database,
                'DB_USERNAME=' . $username,
                'DB_PASSWORD=' . $password,
            ],
            file_get_contents($this->laravel->environmentFilePath())
        ));

        $this->call('clear:cache'); // clear up cache

        if ($this->confirm('Do you want to run migration scripts and seed the data?')) {
            $this->call('migrate', ['--seed' => true]);
        }
    }
}
