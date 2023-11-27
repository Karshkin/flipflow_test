<?php 

namespace App\ETL\Actions;

use App\Models\Product;
use App\ETL\Actions\BaseAction;

class ShowProductsJsonAction
{
    public function execute($params)
    {
        $response = BaseAction::execute($params);

        return json_encode($response);
    }

}