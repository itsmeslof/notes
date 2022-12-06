<?php

namespace App\Models;

use App\Traits\HasHashID;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotebookPage extends Model
{
    use HasFactory, SoftDeletes, HasHashID;

    public function generateHashIDFromFields(): array
    {
        return [$this->notebook->id, $this->id];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content',
        'hash_id',
        'notebook_id',
        'user_id',
    ];

    /**
     * Get the user that this page belongs to.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->notebook->user();
    }

    /**
     * Get the Notebook that the page belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notebook(): BelongsTo
    {
        return $this->belongsTo(Notebook::class)->withTrashed();
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
