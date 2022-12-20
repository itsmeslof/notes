<?php

namespace App\Models;

use App\Traits\HasHashID;
use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notebook extends Model
{
    use HasFactory, BelongsToUser, SoftDeletes, HasHashID;

    public function generateHashIDFromFields(): array
    {
        return [$this->id];
    }

    // protected $with = ['pages'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bookmarked',
        'hashid',
        'user_id',
    ];

    /**
     * Get the pages belonging to this notebook.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany(NotebookPage::class);
    }

    public function notebookShareLinks(): HasMany
    {
        return $this->hasMany(NotebookShareLink::class, 'notebook_id', 'id');
    }

    // Temporary
    public function daysRemaining(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->deleted_at->add('days', 30);
            }
        );
    }
}
