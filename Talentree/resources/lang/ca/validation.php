<?php

$str = 'array';
$str1 = 'numeric';
$str2 = 'string';
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

    'accepted'             => ':attribute ha de ser acceptat.',
    'active_url'           => ':attribute no és un URL vàlid.',
    'after'                => ':attribute ha de ser una data posterior a :date.',
    'after_or_equal'       => ':attribute ha de ser una data posterior o igual a :date.',
    'alpha'                => ':attribute només pot contenir lletres.',
    'alpha_dash'           => ':attribute només pot contenir lletres, números i guions.',
    'alpha_num'            => ':attribute només pot contenir lletres i números.',
    $str => ':attribute ha de ser una matriu.',
    'before'               => ':attribute ha de ser una data anterior a :date.',
    'before_or_equal'      => ':attribute ha de ser una data anterior o igual a :date.',
    'between'              => [
        $str1 => ":attribute ha d'estar entre :min - :max.",
        'file'    => ':attribute ha de pesar entre :min - :max kilobytes.',
        $str2 => ':attribute ha de tenir entre :min - :max caràcters.',
        $str => ':attribute ha de tenir entre :min - :max ítems.',
    ],
    'boolean'              => 'El camp :attribute ha de ser verdader o fals',
    'confirmed'            => 'La confirmació de :attribute no coincideix.',
    'date'                 => ':attribute no és una data vàlida.',
    'date_equals'          => 'The :attribute must be a date equal to :date.',
    'date_format'          => 'El camp :attribute no concorda amb el format :format.',
    'different'            => ':attribute i :other han de ser diferents.',
    'digits'               => ':attribute ha de tenir :digits dígits.',
    'digits_between'       => ':attribute ha de tenir entre :min i :max dígits.',
    'dimensions'           => 'Les dimensions de la imatge :attribute no són vàlides.',
    'distinct'             => 'El camp :attribute té un valor duplicat.',
    'email'                => ':attribute no és un e-mail vàlid',
    'exists'               => ':attribute és invàlid.',
    'file'                 => 'El camp :attribute ha de ser un arxiu.',
    'filled'               => 'El camp :attribute és obligatori.',
    'gt'                   => [
        $str1 => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        $str2 => 'The :attribute must be greater than :value characters.',
        $str => 'The :attribute must have more than :value items.',
    ],
    'gte'                  => [
        $str1 => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        $str2 => 'The :attribute must be greater than or equal :value characters.',
        $str => 'The :attribute must have :value items or more.',
    ],
    'image'                => ':attribute ha de ser una imatge.',
    'in'                   => ':attribute és invàlid',
    'in_array'             => 'El camp :attribute no existeix dintre de :other.',
    'integer'              => ':attribute ha de ser un nombre enter.',
    'ip'                   => ':attribute ha de ser una adreça IP vàlida.',
    'ipv4'                 => ':attribute ha de ser una adreça IPv4 vàlida.',
    'ipv6'                 => ':attribute ha de ser una adreça IPv6 vàlida.',
    'json'                 => 'El camp :attribute ha de ser una cadena JSON vàlida.',
    'lt'                   => [
        $str1 => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        $str2 => 'The :attribute must be less than :value characters.',
        $str => 'The :attribute must have less than :value items.',
    ],
    'lte'                  => [
        $str1 => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        $str2 => 'The :attribute must be less than or equal :value characters.',
        $str => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        $str1 => ':attribute no pot ser més gran que :max.',
        'file'    => ':attribute no pot ser més gran que :max kilobytes.',
        $str2 => ':attribute no pot ser més gran que :max caràcters.',
        $str => ':attribute no pot tenir més de :max ítems.',
    ],
    'mimes'                => ':attribute ha de ser un arxiu amb format: :values.',
    'mimetypes'            => ':attribute ha de ser un arxiu amb format: :values.',
    'min'                  => [
        $str1 => "El tamany de :attribute ha de ser d'almenys :min.",
        'file'    => "El tamany de :attribute ha de ser d'almenys :min kilobytes.",
        $str2 => ':attribute ha de contenir almenys :min caràcters.',
        $str => ':attribute ha de tenir almenys :min ítems.',
    ],
    'not_in'               => ':attribute és invàlid.',
    'not_regex'            => 'The :attribute format is invalid.',
    $str1 => ':attribute ha de ser numèric.',
    'present'              => 'El camp :attribute ha d\'existir.',
    'regex'                => 'El format de :attribute és invàlid.',
    'required'             => 'El camp :attribute és obligatori.',
    'required_if'          => 'El camp :attribute és obligatori quan :other és :value.',
    'required_unless'      => 'El camp :attribute és obligatori a no ser que :other sigui a :values.',
    'required_with'        => 'El camp :attribute és obligatori quan hi ha :values.',
    'required_with_all'    => 'El camp :attribute és obligatori quan hi ha :values.',
    'required_without'     => 'El camp :attribute és obligatori quan no hi ha :values.',
    'required_without_all' => 'El camp :attribute és obligatori quan no hi ha cap valor dels següents: :values.',
    'same'                 => ':attribute i :other han de coincidir.',
    'size'                 => [
        $str1 => 'El tamany de :attribute ha de ser :size.',
        'file'    => 'El tamany de :attribute ha de ser :size kilobytes.',
        $str2 => ':attribute ha de contenir :size caràcters.',
        $str => ':attribute ha de contenir :size ítems.',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values',
    $str2 => 'El camp :attribute ha de ser una cadena.',
    'timezone'             => 'El camp :attribute ha de ser una zona vàlida.',
    'unique'               => ':attribute ja està registrat i no es pot repetir.',
    'uploaded'             => ':attribute ha fallat al pujar.',
    'url'                  => ':attribute no és una adreça web vàlida.',
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
        'name'                  => 'nom',
        'username'              => 'usuari',
        'email'                 => 'correu electrònic',
        'first_name'            => 'nom',
        'last_name'             => 'cognom',
        'password'              => 'contrasenya',
        'password_confirmation' => 'confirmació de la contrasenya',
        'city'                  => 'ciutat',
        'country'               => 'país',
        'address'               => 'adreça',
        'phone'                 => 'telèfon',
        'mobile'                => 'mòbil',
        'age'                   => 'edat',
        'sex'                   => 'sexe',
        'gender'                => 'gènere',
        'year'                  => 'any',
        'month'                 => 'mes',
        'day'                   => 'dia',
        'hour'                  => 'hora',
        'minute'                => 'minut',
        'second'                => 'segon',
        'title'                 => 'títol',
        'body'                  => 'contingut',
        'description'           => 'descripció',
        'excerpt'               => 'extracte',
        'date'                  => 'data',
        'time'                  => 'hora',
        'subject'               => 'assumpte',
        'message'               => 'missatge',
    ],
];
