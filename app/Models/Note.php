<?php

namespace App\Models;

use App\HashidOptions;
use App\Traits\HasHashid;
use App\Traits\HasMetadata;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory, HasMetadata, HasHashid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'hashid',
        'user_id',
        'metadata'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime'
    ];

    /**
     * Get user this note belongs to.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCacheKey(): string
    {
        return "notes.{$this->hashid}.outputHtml";
    }

    protected function getDefaultMetadata(): array
    {
        return [
            'title' => 'Untitled note',
            'description' => '',
            'tags' => [],
            'visibility' => 'private',
            'author_visibility' => 'private'
        ];
    }

    public function getHashidOptions(): HashidOptions
    {
        return HashidOptions::from('notes', [$this->id, $this->user_id]);
    }
}
