<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Informationpages;


use Mediapress\AllBuilder\Foundation\BuilderRenderable;

class Pages extends BuilderRenderable
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
                            "action" => route("Content.pages.update", ["sitemap_id" => $page->sitemap_id, "id" => $page->id]),
                        ]
                    ],
                    "collectable_as"=>["pagesform", "form"]
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
                                                    'type' => 'inputwithlabel',
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'input',
                                                            'attributes' => [
                                                            'class' => '',
                                                            'name' => 'page-><print>page->id</print>->order',
                                                            'type' => 'number',
                                                            'value' => '<print>page->order</print>',
                                                            ],
                                                        ],
                                                        'title' => 'Sıralama',
                                                        'rules' => '',
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
                                                                        'title' => 'Başlık',
                                                                        'rules' => '',
                                                                    ],
                                                                ],
                                                                1 => [
                                                                    'type' => 'detailslugcontrolv2',
                                                                    'options' => [
                                                                        'initial_mode' => 'auto',
                                                                    ],
                                                                    'params' => [
                                                                        'detail' => '<var>detail</var>',
                                                                    ],
                                                                ],
                                                                3 => [
                                                                    'type' => 'ckeditor',
                                                                    'params' => [
                                                                    ],
                                                                    'options' => [
                                                                        'rules' => '',
                                                                        'title' => 'Detay Yazısı',
                                                                        'value' => '<print>detail->detail</print>',
                                                                        'html' => [
                                                                            'attributes' => [
                                                                                'name' => 'detail->detail',
                                                                            ],
                                                                        ],
                                                                        'tags' => [
                                                                        ],
                                                                    ],
                                                                ],
                                                                4 => [
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
                                                        'details' => '<var>page->details</var>',
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
                                1 => [
                                    'type' => 'tab',
                                    'contents' => [
                                        0 => [
                                            'type' => 'detailtabs',
                                            'contents' => [
                                                0 => [
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
                                                            'options' => [
                                                                'html' => [
                                                                    'tag' => 'div',
                                                                    'attributes' => [
                                                                        'class' => 'col-12',
                                                                        'name' => '',
                                                                    ],
                                                                ],
                                                            ],
                                                            'params' => [
                                                                'detail' => '<var>detail</var>',
                                                            ],
                                                        ],
                                                    ],
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'div',
                                                            'attributes' => [
                                                                'class' => 'tab-pane',
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
                                                        'class' => 'tab-list',
                                                        'name' => '',
                                                    ],
                                                ],
                                                'capsulate' => '0',
                                                'meta_variables' => '0',
                                            ],
                                            'params' => [
                                                'keyname' => 'key',
                                                'itemname' => 'detail',
                                                'details' => '<var>page->details</var>',
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'html' => [
                                            'tag' => 'div',
                                            'attributes' => [
                                                'class' => 'tab-pane',
                                                'name' => '',
                                            ],
                                        ],
                                        'title' => 'SEO',
                                    ],
                                ],
                                3 => [
                                    'type' => 'tab',
                                    'contents' => [
                                        0 => [
                                            'type' => 'div',
                                            'contents' => [
                                                0 => [
                                                    'type' => 'contentprotectioncontrol',
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'div',
                                                            'attributes' => [
                                                                'class' => 'col-sm-12 col-md-6',
                                                                'name' => '',
                                                            ],
                                                        ],
                                                    ],
                                                    'params' => [
                                                        'object' => '<var>page</var>',
                                                    ],
                                                ],
                                                1 => [
                                                    'type' => 'div',
                                                    'contents' => [
                                                        0 => [
                                                            'type' => 'pagestatuscontrol',
                                                            'params' => [
                                                                'page_model' => '<var>page</var>',
                                                            ],
                                                        ],
                                                    ],
                                                    'options' => [
                                                        'html' => [
                                                            'tag' => 'div',
                                                            'attributes' => [
                                                                'class' => 'col-sm-12 col-md-6',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'options' => [
                                                'html' => [
                                                    'tag' => 'div',
                                                    'attributes' => [
                                                        'class' => 'row position-relative',
                                                        'name' => '',
                                                        'style' => 'overflow:hidden;',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                    'options' => [
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
