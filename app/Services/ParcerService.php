<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ParcerContract;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class ParcerService implements ParcerContract
{

    public function getData(string $url): array
    {
        $load = XMLParser::load($url);
        return $load->parse([
            'category' => [
                'uses' => 'channel[title,link,description,image.url]',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,description,pubDate]',
            ]
        ]);
    }
    public function saveData(string $url, string $author): void
    {
        $data = $this->getData($url);
        if (is_null(Category::where('title', $data['category'][0]['title'])->first())) {
            $category_id = Category::create([
                'title' => $data['category'][0]['title'],
                'description' => $data['category'][0]['description'],
            ])->id;
        } else {
            $category_id = Category::where('title', $data['category'][0]['title'])->first()->id;
        }
        foreach ($data['news'] as $item) {
            News::create([
                'category_id' => $category_id,
                'title' => $item['title'],
                'description' => $item['description'],
                'link' => $item['link'],
                'author' => $author,
            ]);
        }
        
    }
}
