<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Contact;


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
                                                                        'style' => '',
                                                                    ],
                                                                ],
                                                                'title' => 'Sayfa Yapısı Başlığı',
                                                                'rules' => '',
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'params' => [
                                                            ],
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'Telefon',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->phone',
                                                                        'value' => '<print>detail->phone</print>',
                                                                        'style' => '',
                                                                    ],
                                                                ],
                                                                'tags' => [
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'params' => [
                                                            ],
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'E-Mail',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->email',
                                                                        'value' => '<print>detail->email</print>',
                                                                        'style' => '',
                                                                    ],
                                                                ],
                                                                'tags' => [
                                                                ],
                                                            ],
                                                        ],
                                                        [
                                                            'type' => 'inputwithlabel',
                                                            'params' => [
                                                            ],
                                                            'options' => [
                                                                'rules' => '',
                                                                'title' => 'Adres',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->address',
                                                                        'value' => '<print>detail->address</print>',
                                                                        'style' => '',
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
                                                                'title' => 'Detay Metni',
                                                                'value' => '<print>detail->detail</print>',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->detail',
                                                                    ],
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
                                            'type' => 'detailtabs',
                                            'contents' => [
                                                [
                                                    'type' => 'tab',
                                                    'contents' => [
                                                        0 => [
                                                            'type' => 'textareawithlabel',
                                                            'options' => [
                                                                'html' => [
                                                                    'tag' => 'textarea',
                                                                    'attributes' => [
                                                                        'class' => 'form-control',
                                                                        'name' => 'detail->search_text',
                                                                    ],
                                                                ],
                                                                'rules' => '',
                                                                'title' => 'Aptal Arama <small>Burada yazacağınız metin sayfada gözükmez, sadece site içi aramalarda dikkate alınır.</small>',
                                                                'value' => '<print>detail->search_text</print>',
                                                            ],
                                                        ],
                                                        1 => [
                                                            'type' => 'detailmetascontrolv2',
                                                            'params' => [
                                                                'detail' => '<var>detail</var>',
                                                            ],
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
                                                'capsulate' => '0',
                                                'meta_variables' => '1',
                                            ],
                                            'params' => [
                                                'keyname' => 'key',
                                                'itemname' => 'detail',
                                                'details' => '<var>sitemap->details</var>',
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'SEO',
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
