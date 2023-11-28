<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ETL\Actions\SaveProductsAction;

class SaveProductsCommand extends Command
{
    protected $signature = 'save-products {--url=}';
    protected $description = 'Save products of its corresponding category';
     
    private SaveProductsAction $action;

    public function __construct(SaveProductsAction $action)
    {
        parent::__construct();
        $this->action = $action;
    }

    public function handle(): void
    {
        $params = $this->options();
        $this->action->execute($params);
    }
}