<?php

return [
    'required' => ':attributeを入力してください',
    'email' => ':attributeはメール形式で入力してください',
    'max' => [
        'string' => ':attributeには:max文字以下の文字列を指定してください。',
    ],
    'min' => [
        'string' => ':attributeには:min文字以上の文字列を指定してください。',
    ],
    'string' => ':attributeには文字列を指定してください。',
    'numeric' => ':attributeには数値を指定してください。',
    'confirmed' => ':attributeと確認フィールドが一致していません。',

    'attributes' => [
        'name'     => 'お名前',
        'email'    => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
