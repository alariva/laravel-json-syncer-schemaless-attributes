<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

trait HasSchemalessSettings
{
    public function getSettingsAttribute(): SchemalessAttributes
    {
       return SchemalessAttributes::createForModel($this, 'settings');
    }

    public function scopeWithSettings(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('settings');
    }
}
