<?php

namespace App\Command\Item;

use Minicli\App;
use Minicli\Command\CommandController;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        $this->getPrinter()->info('Run ./minicli help for usage help.');

        $this->getPrinter()->info('Usage:  ');        
        $this->getPrinter()->out("\t warehouse item [option] \r \n");        
        $this->getPrinter()->info('Options: ');        
        $this->getPrinter()->out("\t new - add new item \r \n");        
        $this->getPrinter()->out("\t resupply - resupply item \r \n");        
        $this->getPrinter()->out("\t search - search - search for item by sku, title, or company \r \n");        
        // $this->getPrinter()->display("Hello World");
        // $this->getPrinter()->error("Hello World");
        // $this->getPrinter()->info("Hello World");
        // $this->getPrinter()->success("Hello World");
        // $this->getPrinter()->display("Hello World",true);
        // $this->getPrinter()->error("Hello World",true);
        // $this->getPrinter()->info("Hello World",true);
        // $this->getPrinter()->success("Hello World",true);
        // $this->getPrinter()->out("Hello World!\r\n", 'underline');
        // $this->getPrinter()->out("Hello World!\r\n", 'dim');
        // $this->getPrinter()->out("Hello World!\r\n", 'bold');
        // $this->getPrinter()->out("Hello World!\r\n", 'inverted');
        // $this->getPrinter()->out("Hello World!\r\n", 'italic');
    }
}