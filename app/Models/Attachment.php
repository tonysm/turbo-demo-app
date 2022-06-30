<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tonysm\RichTextLaravel\Attachables\Attachable;
use Tonysm\RichTextLaravel\Attachables\AttachableContract;

class Attachment extends Model implements HasMedia, AttachableContract
{
    use HasFactory;
    use InteractsWithMedia;
    use Attachable;

    protected $casts = [
        'verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function record()
    {
        return $this->morphTo();
    }

    public function richTextPreviewable(): bool
    {
        return str_starts_with($this->getFirstMedia()->mime_type, 'image/');
    }

    public function richTextFilename(): ?string
    {
        return $this->getFirstMedia()->file_name;
    }

    public function richTextFilesize()
    {
        return $this->getFirstMedia()->size;
    }

    public function richTextContentType(): string
    {
        return $this->getFirstMedia()->mime_type;
    }

    public function getPreviewableUrl(string $convertionName = null): string
    {
        return $this->getFirstMedia()->getFullUrl($convertionName);
    }

    public function setRecordAttribute($record)
    {
        $this->record()->associate($record);
    }

    public function richTextRender(array $options = []): string
    {
        return view('trix._attachment', [
            'attachment' => $this,
            'media' => $this->getFirstMedia(),
            'options' => $options,
        ])->render();
    }

    public function toTrixContent(): ?string
    {
        return null;
    }

    public function richTextAsPlainText($caption = null): string
    {
        return sprintf('[%s]', $caption ?: e($this->caption));
    }
}
