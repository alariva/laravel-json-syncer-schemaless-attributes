<?php

namespace App;

use App\Models\Concerns\HasSchemalessSettings;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use MathieuTu\JsonSyncer\Contracts\JsonExportable;
use MathieuTu\JsonSyncer\Contracts\JsonImportable;
use MathieuTu\JsonSyncer\Traits\JsonExporter;
use MathieuTu\JsonSyncer\Traits\JsonImporter;

class User extends Authenticatable implements JsonExportable, JsonImportable
{
    use Notifiable, HasSchemalessSettings, JsonExporter, JsonImporter;

    public $casts = [
        'settings' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
