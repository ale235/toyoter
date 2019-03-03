<?php

namespace App\Console\Commands;

use App\Imports\RepuestosImport;
use Illuminate\Console\Command;

class ImportsExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Excel importer';

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
        $this->output->title('Starting import');
        (new RepuestosImport())->withOutput($this->output)->import('Listado para APP.xls');
        $this->output->success('Import successful');
    }
}
