<?php 

namespace App\ETL\Actions;

use Goutte\Client;
use InvalidArgumentException;
use App\Models\Product;

class ShowProductsJsonAction
{
    public function execute($params)
    {
        $client = new Client();

        $website = $client->request('GET', $params['category']);
        
        $url = parse_url($params['category']);

        $baseUrl = $url['scheme'].'/'.$url['host'];

        $response = $website->filter('.product-card-list__list')->children()->each(function ($node) use ($baseUrl) {
            try{
                return [
                    'price' => str_replace(" €", "", $node->children()->filter('.product-card__detail')->children()->filter('.product-card__prices-container')->filter('.product-card__price')->text()) ?? '',
                    'title' => $node->children()->filter('.product-card__detail')->children()->filter('.product-card__title')->filter('.product-card__title-link')->text() ?? '',
                    'img' => $node->children()->filter('.product-card__media')->children()->children()->attr('src') ?? '',
                    'link' => $baseUrl.$node->children()->filter('.product-card__detail')->children()->filter('.product-card__title')->filter('.product-card__title-link')->attr('href') ?? '',
                ];
            } catch(InvalidArgumentException $e) {
                // Node list is empty
            }
        });

        $response = array_slice($response, 0, 5);

        return json_encode($response);
    }

}