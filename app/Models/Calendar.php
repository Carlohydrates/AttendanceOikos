<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $fillable=[
        'calendar_created',
        'email',
        'title',
        'subject',
        'duration',
        'venue',
        'theme',
        'message',
        'color'
    ];
    public $timestamps=false;
    public static function randomColor():string{
        $random_num=0;
        $colors=[
            'red',
            'orange',
            'yellow',
            'green',
            'blue',
            'indigo',
            'violet',
            'peach',
            'pink',
            'brown'
        ];
        $random_num=rand(0,count($colors)-1);
        return $colors[$random_num];
    }
}
