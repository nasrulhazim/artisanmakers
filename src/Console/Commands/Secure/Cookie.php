<?php

namespace NasrulHazim\ArtisanMakers\Console\Commands\Secure;

use Illuminate\Console\Command;

class Cookie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secure:cookie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update cookie details, do not use default value.';

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
        file_put_contents(config_path('session.php'), str_replace(
            [
                "'cookie' => 'laravel_session',",
                "'encrypt' => false,",
            ],
            [
                "'cookie' => '" . str_random(32) . "',",
                "'encrypt' => true,",
            ],
            file_get_contents(config_path('session.php'))
        ));

        $this->info('Your Cookies has been secured.');
    }
}
