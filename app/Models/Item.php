<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'gender',
        'age',
        'healthCondition',
        'recruitement',
        'detail',
        'image'
    ];

    // public $type = [
    //     1 => '茶トラ',
    //     2 => 'キジトラ',
    //     3 => 'サバトラ',
    //     4 => '白黒',
    //     5 => '三毛',
    //     6 => '白',
    //     7 => '黒',
    //     8 => 'サビ',
    //     9 => 'その他',
    // ];
    // public $gender = [
    //     1 => 'オス',
    //     2 => 'メス',
    //     3 => '不明',
    // ];
    // public $hs = [
    //     1 => '健康',
    //     2 => 'ケガあり',
    //     3 => '病気あり',
    // ];
    // public $recruite = [
    //     1 => '募集中',
    //     2 => '募集終了',
    //     3 => '保留',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
