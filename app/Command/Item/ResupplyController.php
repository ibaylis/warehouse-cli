<?php

namespace App\Command\Item;
use App\Model\Item;
use Minicli\Command\CommandController;

class ResupplyController extends CommandController
{
    public function handle(): void
    {
        $item = new Item;
        $type = '';
        $data = [
            'sku' => '',
            'number' => 0,
        ];

        if($this->hasParam('sku')) {
            $data['sku'] = $this->getParam('sku');      
            if($this->hasParam('minus')) {
                $type = 'minus';                
                $data['number'] = $this->getParam('minus');                 
            }
            if($this->hasParam('plus')) {
                $type = 'plus';                
                $data['number'] = $this->getParam('plus');   
            }
            if($this->hasParam('equal')) {
                $type = 'equal';
                $data['number'] = $this->getParam('equal');   
            }
            $item->update($data, $type);
            $this->getPrinter()->out("Updated Successfully \r\n");
        }
    }
}