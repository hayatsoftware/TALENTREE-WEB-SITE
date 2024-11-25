<?php

use Mediapress\Foundation\UserAgent\UserAgent;

define("AWARDS_SITEMAP", 3);
define("HOME_IK_SITEMAP", 4);
define("HOME_AWAITSYOU_SITEMAP", 5);
define("HOME_DEVELOPMENTROAD_SITEMAP", 6);
define("HOME_INFORMATION_BOXES_SITEMAP", 7);
define("HOME_INTERN_COMMENTS_SITEMAP", 8);
define("PRINCIPLES_SITEMAP", 10);
define("HOME_DISCOVERUS_SITEMAP", 14);
define("APPLICATION_SITEMAP", 15);
define("INTERNVIDEO_SITEMAP", 16);
define("INFORMATIONPAGE_SITEMAP", 18);
define("APPLICATIONAPP_SITEMAP", 19);


function getUserAgent()
{
    $ua = new UserAgent();
    return $ua->getDevice();
}
function userAgentForm()
{
    $agent = new UserAgent();
    return [
        'platform' => $agent->platform(),
        'browser' => $agent->browser(),
        'device' => $agent->getDevice(),
        'version' => $agent->version($agent->browser()),
        'language' => $agent->languages(),
        'raw' => $agent->getUserAgent(),
        'headers' => $agent->getHttpHeaders(),
    ];
}
function getBreacrumbJSON($mediapress, $crumbs)
{
    $items = [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => langPart('breadcrumb.home', 'Anasayfa'),
            "item" => url($mediapress->homePageUrl())
        ]
    ];
    $i = 1;
    foreach ($crumbs as $crumb => $url) {
        if ($crumb) {
            $items[] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "name" => strip_tags($crumb),
                "item" => url($url)
            ];
        }
    }
    return $items;

}



function user_modify_panelmenu($menu)
{
    $menuEdit = json_encode($menu,JSON_UNESCAPED_UNICODE);

    $searchMenu = ['Açık İlanları Keşfet','İk Mesajı'];
    $replaceMenu = ['İlanlar','Direktör Mesajı'];

    $menu = json_decode(str_replace($searchMenu, $replaceMenu, $menuEdit), true);


    $menu['header_menu']['content']['cols']['sitemaps']['rows'][] = [
        'title' => 'Başvurular',
        'type' => 'submenu',
        'url' => 'javascript:void(0);',
        'children' => [
            [
                'title' => 'Başvurular',
                'type' => 'submenu',
                'url' => url('/mp-admin/Heraldist/Messages/show/1')
            ],
            [
                'title' => 'Başvuruları Dışarı Aktar',
                'type' => 'submenu',
                'url' => url('/mp-admin/form-results')
            ]
        ]
    ];

    return $menu;
}
