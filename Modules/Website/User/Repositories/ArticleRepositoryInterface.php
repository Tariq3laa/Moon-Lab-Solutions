<?php

namespace Modules\Website\User\Repositories;

interface ArticleRepositoryInterface 
{
    public function store($request);
    public function update($request);
    public function destroy($request);
}