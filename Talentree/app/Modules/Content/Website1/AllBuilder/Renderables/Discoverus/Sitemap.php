<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Discoverus;


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
    0 => [
        'type' => 'steptabs',
        'id' => '6590a213c9a81',
        'contents' => [
            0 => [
                'type' => 'tab',
                'id' => '6590a213c9a83',
                'contents' => [
                    0 => [
                        'type' => 'detailtabs',
                        'id' => '6590a213c9a84',
                        'contents' => [
                            0 => [
                                'type' => 'tab',
                                'id' => '6590a213c9a85',
                                'contents' => [
                                    0 => [
                                        'type' => 'inputwithlabel',
                                        'id' => '6590a213c9a86',
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
                                    1 => [
                                        'type' => 'ckeditor',
                                        'id' => '6590a213c9a9a',
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
                                    2 => [
                                        'type' => 'inputwithlabel',
                                        'params' => [
                                        ],
                                        'options' => [
                                            'rules' => '',
                                            'title' => 'Linkedin Adı',
                                            'html' => [
                                                'attributes' => [
                                                    'name' => 'detail->extras->linkedin_name',
                                                    'value' => '<print>detail->linkedin_name</print>',
                                                    'style' => '',
                                                ],
                                            ],
                                            'tags' => [
                                            ],
                                        ],
                                    ],
                                    3 => [
                                        'type' => 'inputwithlabel',
                                        'params' => [
                                        ],
                                        'options' => [
                                            'rules' => '',
                                            'title' => 'Linkedin Link',
                                            'html' => [
                                                'attributes' => [
                                                    'name' => 'detail->extras->linkedin_link',
                                                    'value' => '<print>detail->linkedin_link</print>',
                                                    'style' => '',
                                                ],
                                            ],
                                            'tags' => [
                                            ],
                                        ],
                                    ],
                                    4 => [
                                        'type' => 'inputwithlabel',
                                        'params' => [
                                        ],
                                        'options' => [
                                            'rules' => '',
                                            'title' => 'Instagram Adı',
                                            'html' => [
                                                'attributes' => [
                                                    'name' => 'detail->extras->instagram_name',
                                                    'value' => '<print>detail->instagram_name</print>',
                                                    'style' => '',
                                                ],
                                            ],
                                            'tags' => [
                                            ],
                                        ],
                                    ],
                                    5 => [
                                        'type' => 'inputwithlabel',
                                        'params' => [
                                        ],
                                        'options' => [
                                            'rules' => '',
                                            'title' => 'Instagram Link',
                                            'html' => [
                                                'attributes' => [
                                                    'name' => 'detail->extras->instagram_link',
                                                    'value' => '<print>detail->instagram_link</print>',
                                                    'style' => '',
                                                ],
                                            ],
                                            'tags' => [
                                            ],
                                        ],
                                    ],
                                    6 => [
                                        'type' => 'clearfix',
                                        'id' => '6590a213c9a9d',
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
            1 => [
                'type' => 'tab',
                'id' => '6590a213c9aa2',
                'contents' => [
                    0 => [
                        'type' => 'mpfile',
                        'id' => '6590a213c9aa3',
                        'options' => [
                            'html' => [
                                'tag' => 'input',
                                'attributes' => [
                                    'class' => 'mfile mpimage',
                                    'name' => 'sitemap-><print>sitemap->id</print>',
                                    'type' => 'hidden',
                                ],
                            ],
                            'rules' => '',
                            'tags' => [
                                'gallery' => '{"key":"gallery","file_type":"image","title":"Fotoğraf Galerisi","allow_actions":["select","upload"],"allow_diskkeys":["azure","local"],"extensions":"JPG,PNG,GIF,SVG","min_width":"","max_width":"","min_height":"","max_height":"","min_filesize":"","max_filesize":"","max_file_count":"10","additional_rules":""}',
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
            2 => [
                'type' => 'tab',
                'id' => '6590a213c9aa9',
                'contents' => [
                    0 => [
                        'type' => 'detailtabs',
                        'id' => '6590a213c9aaa',
                        'contents' => [
                            0 => [
                                'type' => 'tab',
                                'id' => '6590a213c9aab',
                                'contents' => [
                                    0 => [
                                        'type' => 'textareawithlabel',
                                        'id' => '6590a213c9aac',
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
                                        'id' => '6590a213c9aaf',
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
            3 => [
                'type' => 'tab',
                'id' => '6590a213c9ab4',
                'contents' => [
                    0 => [
                        'type' => 'contentprotectioncontrol',
                        'id' => '6590a213c9ab5',
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
                    1 => [
                        'type' => 'clearfix',
                        'id' => '6590a213c9ab7',
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
