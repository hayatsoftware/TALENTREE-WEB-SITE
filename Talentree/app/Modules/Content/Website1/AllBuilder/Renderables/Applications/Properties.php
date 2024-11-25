<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Applications;


use Mediapress\AllBuilder\Foundation\BuilderRenderable;

class Properties extends BuilderRenderable
{
    public function defaultContents()
    {
        extract($this->params);
        return [
            [
                "type" => "form",
                "options" => [
                    "html" => [
                        "attributes" => [
                            "method" => "post",
                            "action" => route("Content.categories.property.store", ["property" => $property->id]),
                        ]
                    ],
                    "collectable_as"=>["criteriasform", "form"]
                ],
                "contents" =>
                /*EDITOR*/
                    [
                        0 => [
                            'type' => 'steptabs',
                            'contents' => [
                                0 => [
                                    'type' => 'tab',
                                    'contents' => [
                                        0 => [
                                            'type' => 'div',
                                            'contents' => [

                                                0 => [
                                                    'type' => 'contentstatuscontrol',
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'div',
                                                            'attributes' => [
                                                                'class' => 'checkbox',
                                                                'name' => '',
                                                            ],
                                                        ],
                                                        'title' => '',
                                                        'value' => '',
                                                        'default' => '2',
                                                        'multiline' => '1',
                                                    ],
                                                    'params' => [
                                                        'values' => '[]',
                                                        'content_model' => '<var>property</var>',
                                                    ],
                                                ],
                                                1 => [
                                                    'type' => 'detailtabs',
                                                    'contents' => [
                                                        0 => [
                                                            'type' => 'tab',
                                                            'contents' => [
                                                                0 => [
                                                                    'type' => 'inputwithlabel',
                                                                    'options' => [
                                                                        'html' => [
                                                                            'tag' => 'input',
                                                                            'attributes' => [
                                                                                'class' => 'detail-name',
                                                                                'name' => 'detail->name',
                                                                                'type' => 'text',
                                                                                'value' => '<print>detail->name</print>',
                                                                            ],
                                                                        ],
                                                                        'title' => 'Özellik Adı',
                                                                        'rules' => 'required',
                                                                    ],
                                                                ],
                                                                1 => [
                                                                    'type' => 'clearfix',
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'div',
                                                            'attributes' => [
                                                                'class' => 'tab-list',
                                                                'name' => '',
                                                            ],
                                                        ],
                                                        'capsulate' => '1',
                                                        'meta_variables' => '1',
                                                    ],
                                                    'params' => [
                                                        'keyname' => 'key',
                                                        'itemname' => 'detail',
                                                        'details' => '<var>property->details</var>',
                                                    ],
                                                ],
                                            ],
                                            'options' => [
                                                'html' => [
                                                    'attributes' => [
                                                        'class' => 'contents',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'Genel',
                                        'navigation' => true,
                                    ],
                                ],
                            ],
                        ],
                    ]

                /*EDITOR*/



            ]
        ];

    }
}
