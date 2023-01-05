<?php
namespace App\Core;
use PDO;

class DBConnection {
    public static function start() {
        try {
            return $pdo = new PDO('mysql:host=127.0.0.1;port=8889;dbname=warehouse', 'root', 'root');           
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}
// class DBConnection {
//     public static function start($config) {
//         try {
//             return new PDO(
//                 $config['driver'].':host='.$config['host'].
//                 ';dbname='.$config['dbname'],
//                 $config['username'],
//                 $config['password'],
//                 $config['options']
//             );
//         } catch (\PDOException $e){
//             dd($e->getMessage());
//         }
//     }
// }