<?php

namespace App\Modules\Content\Website1\AllBuilder\Renderables\Applications;


use Mediapress\AllBuilder\Foundation\BuilderRenderable;

class Categories extends BuilderRenderable
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
                        "action" => route("Content.categories.category.store", ["category" => $category->id]),
                    ]
                ],
                "collectable_as"=>["categoriesform", "form"]
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
                                                    'content_model' => '<var>category</var>',
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
                                                            2 => [
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
                                                            3 => [
                                                                'type' => 'inputwithlabel',
                                                                'params' => [
                                                                ],
                                                                'options' => [
                                                                    'rules' => '',
                                                                    'title' => 'KVKK Başlık',
                                                                    'html' => [
                                                                        'attributes' => [
                                                                            'name' => 'detail->extras->kvkk_title',
                                                                            'value' => '<print>detail->kvkk_title</print>',
                                                                            'style' => '',
                                                                        ],
                                                                    ],
                                                                    'tags' => [
                                                                    ],
                                                                ],
                                                            ],
                                                            4 => [
                                                                'type' => 'ckeditor',
                                                                'options' => [
                                                                    'rules' => '',
                                                                    'title' => 'KVKK Aydınlatma Metni',
                                                                    'value' => '<print>detail->kvkk_text</print>',
                                                                    'html' => [
                                                                        'attributes' => [
                                                                            'name' => 'detail->extras->kvkk_text',
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            5 => [
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
                                                    'details' => '<var>category->details</var>',
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
                                'id' => '64b8e33be92be',
                                'contents' => [
                                    0 => [
                                        'type' => 'mpfile',
                                        'id' => '64b8e33be92bf',
                                        'options' => [
                                            'html' => [
                                                'tag' => 'input',
                                                'attributes' => [
                                                    'class' => 'mfile mpimage',
                                                    'name' => 'category-><print>category->id</print>',
                                                    'type' => 'hidden',
                                                ],
                                            ],
                                            'rules' => '',
                                            'tags' => [
                                                'cover' => '{%quot%key%quot%:%quot%cover%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%title%quot%:%quot%Kategori Resmi%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%%quot%,%quot%max_file_count%quot%:%quot%1%quot%,%quot%additional_rules%quot%:%quot%%quot%}',
                                                'logo' => '{%quot%key%quot%:%quot%logo%quot%,%quot%file_type%quot%:%quot%image%quot%,%quot%title%quot%:%quot%Logo%quot%,%quot%allow_actions%quot%:[%quot%select%quot%,%quot%upload%quot%],%quot%allow_diskkeys%quot%:[%quot%azure%quot%,%quot%local%quot%],%quot%extensions%quot%:%quot%JPG,PNG,GIF,SVG%quot%,%quot%min_width%quot%:%quot%%quot%,%quot%max_width%quot%:%quot%%quot%,%quot%min_height%quot%:%quot%%quot%,%quot%max_height%quot%:%quot%%quot%,%quot%width%quot%:%quot%%quot%,%quot%height%quot%:%quot%%quot%,%quot%min_filesize%quot%:%quot%%quot%,%quot%max_filesize%quot%:%quot%%quot%,%quot%max_file_count%quot%:%quot%1%quot%,%quot%additional_rules%quot%:%quot%%quot%}',

                                            ],
                                        ],
                                        'params' => [
                                            'files' => '<var>category->mfiles</var>',
                                        ],
                                    ],
                                ],
                                'options' => [
                                    'title' => 'Görseller',
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
