<?php

return [
    'STATUS' => [
        'STATUS_ACTIVE' => 1,
        'STATUS_INACTIVE' => 0,
        'STATUS_SUCCESS' => 1,
        'STATUS_FAILURE' => 0
    ],
    'TOKENS'=>[
        'TOKEN_EXPIRY_DAYS'=>15,
        'REFRESH_TOKEN_EXPIRY_DAYS'=>30
    ],
    'STATUS_CODE'=>[
        'HTTP_200'=>200,
        'HTTP_500'=>500,
        'HTTP_400'=>400,
        'HTTP_422'=>422,
        'HTTP_404'=>404,
    ],
    'ERROR_MESSAGE'=>[
        'SOMETHING_WENT_WRONG'=>'Something went wrong'
    ],
    'LOGGER_SERVICE'=>[
        'ERROR'=>'ERROR'
    ],
    'ADD_SUCCESS_MESSAGE'=>[
        'ADDED_SUCCESSFULLY'=>'Added Successfully'
    ]
];