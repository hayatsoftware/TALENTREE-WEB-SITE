<?php

$str = 'array';
$str1 = 'numeric';
$str2 = 'string';
$str3 = ':attribute är ogiltigt.';
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute måste accepteras.',
    'active_url'           => ':attribute är inte en giltig webbadress.',
    'after'                => ':attribute måste vara ett datum efter den :date.',
    'after_or_equal'       => ':attribute måste vara ett datum senare eller samma dag som :date.',
    'alpha'                => ':attribute får endast innehålla bokstäver.',
    'alpha_dash'           => ':attribute får endast innehålla bokstäver, siffror och bindestreck.',
    'alpha_num'            => ':attribute får endast innehålla bokstäver och siffror.',
    $str => ':attribute måste vara en array.',
    'before'               => ':attribute måste vara ett datum innan den :date.',
    'before_or_equal'      => ':attribute måste vara ett datum före eller samma dag som :date.',
    'between'              => [
        $str1 => ':attribute måste vara en siffra mellan :min och :max.',
        'file'    => ':attribute måste vara mellan :min till :max kilobyte stor.',
        $str2 => ':attribute måste innehålla :min till :max tecken.',
        $str => ':attribute måste innehålla mellan :min - :max objekt.',
    ],
    'boolean'              => ':attribute måste vara sant eller falskt.',
    'confirmed'            => ':attribute bekräftelsen matchar inte.',
    'date'                 => ':attribute är inte ett giltigt datum.',
    'date_equals'          => 'The :attribute must be a date equal to :date.',
    'date_format'          => ':attribute matchar inte formatet :format.',
    'different'            => ':attribute och :other får inte vara lika.',
    'digits'               => ':attribute måste vara :digits tecken.',
    'digits_between'       => ':attribute måste vara mellan :min och :max tecken.',
    'dimensions'           => ':attribute har felaktiga bilddimensioner.',
    'distinct'             => ':attribute innehåller fler än en repetition av samma element.',
    'email'                => ':attribute måste innehålla en korrekt e-postadress.',
    'exists'               => $str3,
    'file'                 => ':attribute måste vara en fil.',
    'filled'               => ':attribute är obligatoriskt.',
    'gt'                   => [
        $str1 => ':attribute måste vara större än :value.',
        'file'    => ':attribute måste vara större än :value kilobyte stor.',
        $str2 => ':attribute måste vara längre än :value tecken.',
        $str => ':attribute måste innehålla fler än :value objekt.',
    ],
    'gte'                  => [
        $str1 => ':attribute måste vara lika med eller större än :value.',
        'file'    => ':attribute måste vara lika med eller större än :value kilobyte stor.',
        $str2 => ':attribute måste vara lika med eller längre än :value tecken.',
        $str => ':attribute måste innehålla lika många eller fler än :value objekt.',
    ],
    'image'                => ':attribute måste vara en bild.',
    'in'                   => $str3,
    'in_array'             => ':attribute finns inte i :other.',
    'integer'              => ':attribute måste vara en siffra.',
    'ip'                   => ':attribute måste vara en giltig IP-adress.',
    'ipv4'                 => ':attribute måste vara en giltig IPv4-adress.',
    'ipv6'                 => ':attribute måste vara en giltig IPv6-adress.',
    'json'                 => ':attribute måste vara en giltig JSON-sträng.',
    'lt'                   => [
        $str1 => ':attribute måste vara mindre än :value.',
        'file'    => ':attribute måste vara mindre än :value kilobyte stor.',
        $str2 => ':attribute måste vara kortare än :value tecken.',
        $str => ':attribute måste innehålla färre än :value objekt.',
    ],
    'lte'                  => [
        $str1 => ':attribute måste vara lika med eller mindre än :value.',
        'file'    => ':attribute måste vara lika med eller mindre än :value kilobyte stor.',
        $str2 => ':attribute måste vara lika med eller kortare än :value tecken.',
        $str => ':attribute måste innehålla lika många eller färre än :value objekt.',
    ],
    'max'                  => [
        $str1 => ':attribute får inte vara större än :max.',
        'file'    => ':attribute får max vara :max kilobyte stor.',
        $str2 => ':attribute får max innehålla :max tecken.',
        $str => ':attribute får inte innehålla mer än :max objekt.',
    ],
    'mimes'                => ':attribute måste vara en fil av typen: :values.',
    'mimetypes'            => ':attribute måste vara en fil av typen: :values.',
    'min'                  => [
        $str1 => ':attribute måste vara större än :min.',
        'file'    => ':attribute måste vara minst :min kilobyte stor.',
        $str2 => ':attribute måste innehålla minst :min tecken.',
        $str => ':attribute måste innehålla minst :min objekt.',
    ],
    'not_in'               => $str3,
    'not_regex'            => 'Formatet för :attribute är ogiltigt.',
    $str1 => ':attribute måste vara en siffra.',
    'present'              => ':attribute måste finnas med.',
    'regex'                => ':attribute har ogiltigt format.',
    'required'             => ':attribute är obligatoriskt.',
    'required_if'          => ':attribute är obligatoriskt när :other är :value.',
    'required_unless'      => ':attribute är obligatoriskt när inte :other finns bland :values.',
    'required_with'        => ':attribute är obligatoriskt när :values är ifyllt.',
    'required_with_all'    => ':attribute är obligatoriskt när :values är ifyllt.',
    'required_without'     => ':attribute är obligatoriskt när :values ej är ifyllt.',
    'required_without_all' => ':attribute är obligatoriskt när ingen av :values är ifyllt.',
    'same'                 => ':attribute och :other måste vara lika.',
    'size'                 => [
        $str1 => ':attribute måste vara :size.',
        'file'    => ':attribute får endast vara :size kilobyte stor.',
        $str2 => ':attribute måste innehålla :size tecken.',
        $str => ':attribute måste innehålla :size objekt.',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values',
    $str2 => ':attribute måste vara en sträng.',
    'timezone'             => ':attribute måste vara en giltig tidszon.',
    'unique'               => ':attribute används redan.',
    'uploaded'             => ':attribute kunde inte laddas upp.',
    'url'                  => ':attribute har ett ogiltigt format.',
    'uuid'                 => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
    ],
];
