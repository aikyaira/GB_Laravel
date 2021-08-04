<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $categoriesList = [
        [
            'id' => 1,
            'name' => 'Category 1'
        ],
        [
            'id' => 2,
            'name' => 'Category 2'
        ],
        [
            'id' => 3,
            'name' => 'Category 3'
        ]
    ];
    protected $newsList = [
        [
            'categoryid' => 1,
            'id' => 1,
            'title' => 'News 1',
            'description' => 'Description for News 1'
        ],
        [
            'categoryid' => 1,
            'id' => 2,
            'title' => 'News 2',
            'description' => 'Description for News 2'
        ],
        [
            'categoryid' => 1,
            'id' => 3,
            'title' => 'News 3',
            'description' => 'Description for News 3'
        ],
        [
            'categoryid' => 2,
            'id' => 4,
            'title' => 'News 4',
            'description' => 'Description for News 4'
        ],
        [
            'categoryid' => 2,
            'id' => 5,
            'title' => 'News 5',
            'description' => 'Description for News 5'
        ],
        [
            'categoryid' => 2,
            'id' => 6,
            'title' => 'News 6',
            'description' => 'Description for News 6'
        ],
        [
            'categoryid' => 3,
            'id' => 7,
            'title' => 'News 7',
            'description' => 'Description for News 7'
        ],
        [
            'categoryid' => 3,
            'id' => 8,
            'title' => 'News 8',
            'description' => 'Description for News 8'
        ],
        [
            'categoryid' => 3,
            'id' => 9,
            'title' => 'News 9',
            'description' => 'Description for News 9'
        ],
    ];
    
    protected function getNewsElement($id)
    {
        foreach ($this->newsList as $n) {
            if ($n['id'] === $id) {
                return $n;
            }
        }
    }

    protected function getNewsList($id)
    {
        $newsList = [];
        foreach ($this->newsList as $n) {
            if ($n['categoryid'] === $id) {
                $newsList[] = $n;
            }
        }
        return $newsList;
    }

    protected function getCategory($id)
    {

        foreach ($this->categoriesList as $category) {
            if ($category['id'] === $id) {
                return $category;
            }
        }
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
