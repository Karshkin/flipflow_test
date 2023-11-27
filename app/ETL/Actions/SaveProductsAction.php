<?php 

namespace App\ETL\Actions;

use App\Models\Product;
use App\ETL\Actions\BaseAction;

class SaveProductsAction
{

    public function execute($params)
    {
        $response = BaseAction::execute($params);

        Product::insert($response);
    }

}