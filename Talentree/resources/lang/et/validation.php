<?php

$str = 'array';
$str1 = 'numeric';
$str2 = 'string';
$str3 = 'Valitud :attribute on vigane.';
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute tuleb aktsepteerida.',
    'active_url'           => ':attribute ei ole kehtiv URL.',
    'after'                => ':attribute peab olema kuupäev pärast :date.',
    'after_or_equal'       => ':attribute peab olema kuupäev pärast või samastuma :date.',
    'alpha'                => ':attribute võib sisaldada vaid tähemärke.',
    'alpha_dash'           => ':attribute võib sisaldada vaid tähti, numbreid ja kriipse.',
    'alpha_num'            => ':attribute võib sisaldada vaid tähti ja numbreid.',
    $str => ':attribute peab olema massiiv.',
    'before'               => ':attribute peab olema kuupäev enne :date.',
    'before_or_equal'      => ':attribute peab olema kuupäev enne või samastuma :date.',
    'between'              => [
        $str1 => ':attribute peab olema :min ja :max vahel.',
        'file'    => ':attribute peab olema :min ja :max kilobaidi vahel.',
        $str2 => ':attribute peab olema :min ja :max tähemärgi vahel.',
        $str => ':attribute peab olema :min ja :max kirje vahel.',
    ],
    'boolean'              => ':attribute väli peab olema tõene või väär.',
    'confirmed'            => ':attribute kinnitus ei vasta.',
    'date'                 => ':attribute pole kehtiv kuupäev.',
    'date_equals'          => 'The :attribute must be a date equal to :date.',
    'date_format'          => ':attribute ei vasta formaadile :format.',
    'different'            => ':attribute ja :other peavad olema erinevad.',
    'digits'               => ':attribute peab olema :digits numbrit.',
    'digits_between'       => ':attribute peab olema :min ja :max numbri vahel.',
    'dimensions'           => ':attribute on valed pildi suurused.',
    'distinct'             => ':attribute väljal on topeltväärtus.',
    'email'                => ':attribute peab olema kehtiv e-posti aadress.',
    'exists'               => $str3,
    'file'                 => ':attribute peab olema fail.',
    'filled'               => ':attribute väli on nõutav.',
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
    'image'                => ':attribute peab olema pilt.',
    'in'                   => $str3,
    'in_array'             => ':attribute väli ei eksisteeri :other sees.',
    'integer'              => ':attribute peab olema täisarv.',
    'ip'                   => ':attribute peab olema kehtiv IP aadress.',
    'ipv4'                 => ':attribute peab olema kehtiv IPv4 aadress.',
    'ipv6'                 => ':attribute peab olema kehtiv IPv6 aadress.',
    'json'                 => ':attribute peab olema kehtiv JSON string.',
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
        $str1 => ':attribute ei tohi olla suurem kui :max.',
        'file'    => ':attribute ei tohi olla suurem kui :max kilobaiti.',
        $str2 => ':attribute ei tohi olla suurem kui :max tähemärki.',
        $str => ':attribute ei tohi sisaldada rohkem kui :max kirjet.',
    ],
    'mimes'                => ':attribute peab olema :values tüüpi.',
    'mimetypes'            => ':attribute peab olema :values tüüpi.',
    'min'                  => [
        $str1 => ':attribute peab olema vähemalt :min.',
        'file'    => ':attribute peab olema vähemalt :min kilobaiti.',
        $str2 => ':attribute peab olema vähemalt :min tähemärki.',
        $str => ':attribute peab olema vähemalt :min kirjet.',
    ],
    'not_in'               => $str3,
    'not_regex'            => 'The :attribute format is invalid.',
    $str1 => ':attribute peab olema number.',
    'present'              => ':attribute väli peab olema esindatud.',
    'regex'                => ':attribute vorming on vigane.',
    'required'             => ':attribute väli on nõutud.',
    'required_if'          => ':attribute väli on nõutud, kui :other on :value.',
    'required_unless'      => ':attribute väli on nõutud, välja arvatud, kui :other on :values.',
    'required_with'        => ':attribute väli on nõutud, kui :values on esindatud.',
    'required_with_all'    => ':attribute väli on nõutud, kui :values on esindatud.',
    'required_without'     => ':attribute väli on nõutud, kui :values ei ole esindatud.',
    'required_without_all' => ':attribute väli on nõutud, kui ükski :values pole esindatud.',
    'same'                 => ':attribute ja :other peavad sobima.',
    'size'                 => [
        $str1 => ':attribute peab olema :size.',
        'file'    => ':attribute peab olema :size kilobaiti.',
        $str2 => ':attribute peab olema :size tähemärki.',
        $str => ':attribute peab sisaldama :size kirjet.',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values',
    $str2 => ':attribute peab olema string.',
    'timezone'             => ':attribute peab olema kehtiv tsoon.',
    'unique'               => ':attribute on juba hõivatud.',
    'uploaded'             => ':attribute ei õnnestunud laadida.',
    'url'                  => ':attribute vorming on vigane.',
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
            'rule-name' => 'kohandatud-teade',
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
        'test_name'               => 'Testi nimi',
        'test_description'        => 'Testi kirjeldus',
        'test_locale'             => 'Keel',
        'image'                   => 'Pilt',
        'result_text_under_image' => 'Tulemuse tekst pildi all',
        'short_text'              => 'Lühitekst',
    ],
];
