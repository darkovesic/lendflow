<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NyTimeAPI
{
    private const API_URL = 'https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json';

    public function __invoke(array $params): array
    {
        if (isset($params['isbn'])) {
            $params['isbn'] = implode(';', $params['isbn']);
        }

        if (isset($params['offset'])) {
            $params['offset'] = $params['offset'] > 0 ? $params['offset'] * 20 : 0;
        }

        $httpQuery = http_build_query($params + ['api-key' => config('api.nyTimeApiKey')]);

        return Http::get(sprintf('%s?%s', self::API_URL, $httpQuery))->throw()->json();
    }
}
