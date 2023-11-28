<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ETL\Actions\ShowProductsJsonAction;

class ShowProductsJsonCommand extends Command
{
    protected $signature = 'show-products-json {--url=}';
    protected $description = 'Shows a JSON of products of its corresponding category';
     
    private ShowProductsJsonAction $action;

    public function __construct(ShowProductsJsonAction $action)
    {
        parent::__construct();
        $this->action = $action;
    }

    public function handle(): void
    {
        $params = $this->options();
        echo $this->action->execute($params);
    }
}