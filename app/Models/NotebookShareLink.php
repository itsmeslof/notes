<?php

namespace App\Models;

use App\Traits\HasHashID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotebookShareLink extends Model
{
    use HasFactory, HasHashID;

    public function generateHashIDFromFields(): array
    {
        return [$this->notebook->id, $this->id];
    }

    protected $fillable = [
        'notebook_id',
        'hashid',
        'page_data',
        'hide_notebook_name',
    ];

    protected $casts = [
        'page_data' => 'array',
    ];

    public function notebook(): BelongsTo
    {
        return $this->belongsTo(Notebook::class);
    }

    public function pageCount()
    {
        return count($this->visiblePageIds());
    }

    public function visiblePageIds()
    {
        return $this->page_data['visible_pages'] ?? [];
    }

    public function visiblePages()
    {
        $pageIds = $this->visiblePageIds();
        return $this->notebook->pages()->whereIn('id', $pageIds)->get();
    }
}
