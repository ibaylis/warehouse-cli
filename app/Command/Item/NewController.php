<?php

namespace App\Command\Item;
use App\Model\Item;

use Minicli\App;
use Minicli\Command\CommandController;

class NewController extends CommandController
{
    public function handle(): void
    {
        $item = new Item;
        $data = [];
        $this->getPrinter()->out("Please enter item information \r \n");        
        $data['sku'] = readline('SKU: ');
        $data['title'] = readline('title: ');
        $data['company'] = readline('company: ');
        $data['location'] = readline('location: ');
        $data['quantity'] = readline('quantity: ');
        $item->insert($data);
        $this->getPrinter()->out("Item saved successfully \r \n");      
        //dd($data);

    }
}