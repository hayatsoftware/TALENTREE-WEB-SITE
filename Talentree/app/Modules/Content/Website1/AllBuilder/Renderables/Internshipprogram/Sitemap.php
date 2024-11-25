<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Internshipprogram;


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
                                                                'title' => '1. Video Linki (YouTube)',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->video_1',
                                                                        'value' => '<print>detail->video_1</print>',
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
                                                                'title' => '1. Başlık',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->title_1',
                                                                        'value' => '<print>detail->title_1</print>',
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
                                                                'title' => '1. Detay Metni',
                                                                'value' => '<print>detail->text_1</print>',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->text_1',
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
                                                                'title' => '2. Başlık',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->title_2',
                                                                        'value' => '<print>detail->title_2</print>',
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
                                                                'title' => '3. Başlık',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->title_3',
                                                                        'value' => '<print>detail->title_3</print>',
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
                                                                'title' => '2. Detay Metni',
                                                                'value' => '<print>detail->text_2</print>',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->text_2',
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
                                                                'title' => '2. Video Linki (YouTube)',
                                                                'html' => [
                                                                    'attributes' => [
                                                                        'name' => 'detail->extras->video_2',
                                                                        'value' => '<print>detail->video_2</print>',
                                                                        'style' => '',
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
                                            'type' => 'mpfile',
                                            'options' => [
                                                'html' => [
                                                    'tag' => 'input',
                                                    'attributes' => [
                                                        'class' => 'mfile mpimage',
                                                        'name' => 'sitemap-><print>sitemap->id</print>',
                                                        'type' => 'hidden',
                                                    ],
                                                ],
                                                'tags' => [
                                                    'image_1' => '{%quot%key%quot%:%quot%image_1%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%required%quot%:%quot%required%quot%,%quot%title%quot%:%quot%1. Video Görseli%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,JPEG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%5120%quot%,%quot%max_file_count%quot%:%quot%1%quot%,%quot%additional_rules%quot%:%quot%%quot%}',
                                                    'image_2' => '{%quot%key%quot%:%quot%image_2%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%required%quot%:%quot%required%quot%,%quot%title%quot%:%quot%2. Video Görseli%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,JPEG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%5120%quot%,%quot%max_file_count%quot%:%quot%1%quot%,%quot%additional_rules%quot%:%quot%%quot%}',
                                                    'gallery' => '{%quot%key%quot%:%quot%gallery%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%title%quot%:%quot%Fotoğraf Galerisi%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%%quot%,%quot%max_file_count%quot%:%quot%30%quot%,%quot%additional_rules%quot%:%quot%%quot%}',
                                                ],
                                            ],
                                            'params' => [
                                                'files' => '<var>sitemap->mfiles</var>',
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
                                        'title' => 'Görseller',
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
