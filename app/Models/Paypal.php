<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    private $id;
    private $secret;
    public function __construct($id,$secret)
    {
        $this->id=$id;
        $this->secret=$secret;
    }

    public function doSomething()
    {
        return "esto es desde Paypal";
    }
}
