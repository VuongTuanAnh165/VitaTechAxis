<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use HasFactory;
    const UNKNOWN = 0;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_logs';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'ip_info' => 'array',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'access_id', 'id');
    }
}
