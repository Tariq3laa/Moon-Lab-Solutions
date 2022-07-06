<?php

namespace Modules\Website\User\Http\Controllers;

use Modules\Website\User\Services\ArticleService;
use Modules\Website\User\Http\Requests\ArticleRequest;

class ArticleController
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function store(ArticleRequest $request)
    {
        return $this->articleService->store($request);
    }

    public function update(ArticleRequest $request)
    {
        return $this->articleService->update($request);
    }

    public function destroy(articleRequest $request)
    {
        return $this->articleService->destroy($request);
    }
}
