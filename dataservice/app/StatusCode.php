<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午6:49
 */

namespace App;


class StatusCode
{
    const BUSINESS_LINE = [
        'web_info' => '01',
        'friend_links' => '02',
        'keys' => '03',
        'article' => '04'
    ];

    const OPERATE_SUCCESS = '00';

    const UPDATE_ERROR = '01';
    const UPDATE_ERROR_NO_PRIMARY_KEY = self::UPDATE_ERROR . '00';
    const UPDATE_ERROR_ALREADY_EXIST = self::UPDATE_ERROR . '01';


    const INSERT_ERROR = '02';
    const DELETE_ERROR = '03';

    const SELECT_ERROR = '04';
    const SELECT_ERROR_RESULT_NULL = self::SELECT_ERROR . '00';

    const PARAMS_ERROR = '05';
    const PARAMS_ERROR_EMPTY = self::PARAMS_ERROR . '00';

}