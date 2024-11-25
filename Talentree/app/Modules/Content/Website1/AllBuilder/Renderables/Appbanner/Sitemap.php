<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Appbanner;


use Mediapress\AllBuilder\Foundation\BuilderRenderable;

class Sitemap extends BuilderRenderable
{
    public
    function defaultContents()
    {
        extract($this->params);
        return [
            [
                "type" => "form",
                "options" => [
                    "html" => [
                        "attributes" => [
                            "method" => "post",
                            "action" => route("Content.sitemaps.mainUpdate", ["sitemap" => $sitemap->id]),
                        ]
                    ],
                    "collectable_as"=>["sitemapform", "form"]
                ],
                "contents" =>
                /*EDITOR*/
                    [
                        [
                            'type' => 'steptabs',
                            'contents' => [
                                [
                                    'type' => 'tab',
                                    'contents' => [
                                        [
                                            'type' => 'detailtabs',
                                            'contents' => [
                                                [
                                                    'type' => 'tab',
                                                    'contents' => [
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'options' => [
                                                                'html' => [
                                                                    'tag' => 'input',
                                                                    'attributes' => [
                                                                        'class' => 'detail-name',
                                                                        'name' => 'detail->name',
                                                                        'type' => 'text',
                                                                        'value' => '<print>detail->name</print>',
                                                                        'style' => 'opacity:0;margin-top:-60px; margin-left:-999999px; z-index:-2',
                                                                    ],
                                                                ],
                                                                'title' => ' ',
                                                                'rules' => '',
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'params' => [
                                                            ],
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'Başlık',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->text_1_new',
                                                                        'value' => '<print>detail->text_1_new</print>',
                                                                    ],
                                                                ],
                                                                'tags' => [
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'ckeditor',
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'Slogan',
                                                                'value' => '<print>detail->detail</print>',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->detail',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'params' => [
                                                            ],
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'Başvuru Link',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->text_3',
                                                                        'value' => '<print>detail->text_3</print>',
                                                                        'style' => '',
                                                                        'placeholder' => 'Bu alanı boş bırakırsanız form sitede görüntülenmeyecektir.'
                                                                    ],
                                                                ],
                                                                'tags' => [
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'clearfix',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'params' => [
                                                'details' => '<var>sitemap->details</var>',
                                            ],
                                            'options' => [
                                                'html' => [
                                                    'attributes' => [
                                                        'class' => 'tab-list',
                                                    ],
                                                ],
                                                'capsulate' => 1,
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'Genel',
                                        'navigation' => true,
                                    ],
                                ],
                                [
                                    'type' => 'tab',
                                    'contents' => [
                                        [
                                            'type' => 'contentprotectioncontrol',
                                            'options' => [
                                                'html' => [
                                                    'tag' => 'div',
                                                    'attributes' => [
                                                        'class' => 'col-6',
                                                        'name' => '',
                                                    ],
                                                ],
                                            ],
                                            'params' => [
                                                'object' => '<var>sitemap</var>',
                                            ],
                                        ],
                                        [
                                            'type' => 'clearfix',
                                            'options' => [
                                                'html' => [
                                                    'tag' => 'div',
                                                    'attributes' => [
                                                        'class' => '',
                                                        'name' => '',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'html' => [
                                            'tag' => 'div',
                                            'attributes' => [
                                                'class' => 'tab-pane position-relative',
                                                'name' => '',
                                                'style' => 'min-height:400px;',
                                            ],
                                        ],
                                        'title' => 'Yayınla',
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
