<?php

namespace Modules\Website\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Website\User\Entities\User;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasTranslations;

    protected $guarded = ['id'];
    public $translatable = ['title', 'content'];
    protected $casts = ['status' => 'boolean'];

    /**
     * Get the User that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(User::class, 'profile_id');
    }
}
