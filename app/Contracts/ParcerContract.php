<?php declare(strict_types=1);

namespace App\Contracts;

interface ParcerContract
{
    public function getData(string $url): array;
    public function saveData(string $url, string $author): void;
    
}
