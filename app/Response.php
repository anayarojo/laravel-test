<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belognsTo(User::class);
    }

    public function message()
    {
        return $this->belognsTo(Message::class);
    }
}
