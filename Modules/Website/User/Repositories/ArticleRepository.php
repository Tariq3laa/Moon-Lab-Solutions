<?php

namespace Modules\Website\User\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Website\User\Entities\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        $model = Article::query()->create($request->validated());
        DB::commit();
        return $model->id;
    }

    public function update($request)
    {
        DB::beginTransaction();
        $model = Article::query()->find($request->article);
        $model->update($request->validated());
        DB::commit();
        return 'Article updated successfully .';
    }

    public function destroy($request)
    {
        Article::query()->where('id', $request->article)->delete();
        return 'Article Deleted Successfully .';
    }
}