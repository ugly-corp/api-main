<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];
    protected $additionalHidden = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->hidden = array_merge($this->hidden, $this->additionalHidden);
    }
}
