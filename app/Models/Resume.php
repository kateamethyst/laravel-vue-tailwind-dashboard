<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'mobile',
        'website',
        'skype',
        'state',
        'country',
        'current_employer',
        'current_job_title',
        'current_salary',
        'expected_salary',
        'educational_background',
        'experience',
        'skill_set',
        'resume_url',
        'cover_letter_url',
        'candidate_zoho_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'current_salary' => 'float',
        'expected_salary' => 'float'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
