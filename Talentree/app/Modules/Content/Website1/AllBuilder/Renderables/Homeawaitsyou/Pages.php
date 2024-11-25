<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Homeawaitsyou;


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
                                                                2 => [
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
                                            'type' => 'mpfile',
                                            'options' => [
                                                'html' => [
                                                    'tag' => 'input',
                                                    'attributes' => [
                                                        'class' => 'mfile mpimage',
                                                        'name' => 'page-><print>page->id</print>',
                                                        'type' => 'hidden',
                                                    ],
                                                ],
                                                'tags' => [
                                                    'cover' => '{%quot%key%quot%:%quot%cover%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%required%quot%:%quot%required%quot%,%quot%title%quot%:%quot%Ikon%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,JPEG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%5120%quot%,%quot%max_file_count%quot%:%quot%1%quot%,%quot%additional_rules%quot%:%quot%%quot%}',
                                                ],
                                            ],
                                            'params' => [
                                                'files' => '<var>page->mfiles</var>',
                                            ],
                                        ],
                                    ],
                                    'options' => [
                                        'title' => 'Fotoğraflar',
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
