<?php

$str = 'array';
$str1 = 'numeric';
$str2 = 'string';
$str3 = 'छानिएको :attribute अमान्य छ।';
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

    'accepted'             => ':attribute स्वीकार गरिएको हुनुपर्छ।',
    'active_url'           => ':attribute URL अमान्य छ।',
    'after'                => ':attribute को मिति :date भन्दा पछि हुनुपर्छ।',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute मा अक्षरहरु मात्र हुनसक्छ।',
    'alpha_dash'           => ':attribute मा अक्षर, संख्या र ड्यासहरू मात्र हुनसक्छ।',
    'alpha_num'            => ':attribute मा अक्षर र संख्याहरू मात्र हुनसक्छ।',
    $str => ':attribute array हुनुपर्छ।',
    'before'               => ':attribute को मिति :date भन्दा अघि हुनुपर्छ।',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        $str1 => ':attribute :min र :max को बिचमा हुनुपर्छ।',
        'file'    => ':attribute :min र :max kilobytes को बिचमा हुनुपर्छ।',
        $str2 => ':attribute :min र :max वर्णको बिचमा हुनुपर्छ।',
        $str => ':attribute मा आइटमको संख्या :min र :max को बिचमा हुनुपर्छ।',
    ],
    'boolean'              => ':attribute ठिक अथवा बेठिक हुनुपर्छ।',
    'confirmed'            => ':attribute दाेहाेर्याइएकाे मिलेन।',
    'date'                 => ':attribute को मिति मिलेन।',
    'date_equals'          => 'The :attribute must be a date equal to :date.',
    'date_format'          => ':attribute को ढाँचा :format जस्तो हुनुपर्छ।',
    'different'            => ':attribute र :other फरक हुनुपर्छ।',
    'digits'               => ':attribute :digits अंकको हुनुपर्छ।',
    'digits_between'       => ':attribute :min देखि :max अंकको हुनुपर्छ।',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute को इमेल ठेगाना मिलेन।',
    'exists'               => $str3,
    'file'                 => 'The :attribute must be a file.',
    'filled'               => ':attribute दिइएको हुनुपर्छ।',
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
    'image'                => ':attribute मा फोटो हुनुपर्छ।',
    'in'                   => $str3,
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute पूर्ण संख्या हुनुपर्छ।',
    'ip'                   => ':attribute मा दिइएको मान्य IP ठेगाना हुनुपर्छ।',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute मा दिइएको मान्य JSON string हुनुपर्छ।',
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
        $str1 => ':attribute :max भन्दा बढी हुनुहुदैन।',
        'file'    => ':attribute :max kilobytes भन्दा बढी हुनुहुदैन।',
        $str2 => ':attribute :max वर्ण भन्दा बढी हुनुहुदैन।',
        $str => ':attribute मा :max भन्दा बढी आइटम हुनुहुदैन।',
    ],
    'mimes'                => ':attribute :values प्रकारको फाइल हुनुपर्छ।',
    'mimetypes'            => ':attribute :values प्रकारको फाइल हुनुपर्छ।',
    'min'                  => [
        $str1 => ':attribute कम्तिमा :min हुनुपर्छ।',
        'file'    => ':attribute कम्तिमा :min kilobytesको हुनुपर्छ।',
        $str2 => ':attribute कम्तिमा :min वर्णको हुनुपर्छ।',
        $str => ':attribute मा कम्तिमा :min आइटम हुनुपर्छ।',
    ],
    'not_in'               => $str3,
    'not_regex'            => 'The :attribute format is invalid.',
    $str1 => ':attribute संख्या हुनुपर्छ।',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute को ढाँचा मिलेन।',
    'required'             => ':attribute दिइएको हुनुपर्छ।',
    'required_if'          => ':attribute चाहिन्छ जब :other :value हुन्छ।',
    'required_unless'      => ':other :values मा नभएसम्म :attribute चाहिन्छ।',
    'required_with'        => ':values भएसम्म :attribute चाहिन्छ।',
    'required_with_all'    => ':values भएसम्म :attribute चाहिन्छ।',
    'required_without'     => ':values नभएको बेला :attribute चाहिन्छ।',
    'required_without_all' => 'कुनैपनि :values नभएको बेला :attribute चाहिन्छ।',
    'same'                 => ':attribute र :other मिल्नुपर्छ।',
    'size'                 => [
        $str1 => ':attribute :size हुनुपर्छ।',
        'file'    => ':attribute :size kilobytesको हुनुपर्छ।',
        $str2 => ':attribute :size वर्णको हुनुपर्छ।.',
        $str => ':attribute मा :size आइटम हुनुपर्छ।',
    ],
    'starts_with'          => 'The :attribute must start with one of the following: :values',
    $str2 => ':attribute string हुनुपर्छ।',
    'timezone'             => ':attribute मान्य समय क्षेत्र हुनुपर्छ।',
    'unique'               => 'यो :attribute पहिले नै लिई सकेको छ।',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => ':attribute को ढांचा मिलेन।',
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

    'attributes' => [],
];
