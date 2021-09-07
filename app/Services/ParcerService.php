<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ParcerContract;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Category;
use App\Models\News;

class ParcerService implements ParcerContract
{

    public function getData(string $url): array
    {
        $load = XMLParser::load($url);
        return $load->parse([
            /*'category' => [
                'uses' => 'channel[title,link,description,image.url]',
            ],*/
            'news' => [
                'uses' => 'channel.item[title,link,description,pubDate]',
            ]
        ]);


    }
}
