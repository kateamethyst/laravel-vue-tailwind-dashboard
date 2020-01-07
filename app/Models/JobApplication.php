<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    const STATUS_NEW = 'New';
    const STATUS_WAITING_FOR_EVALUATION = 'Waiting For Evaluation';
    const STATUS_QUALIFIED = 'Qualified';
    const STATUS_UNQUALIFIED = 'Unqualified';
    const STATUS_JUNK_CANDIDATE = 'Junk Candidate';
    const STATUS_CONTACTED = 'Contacted';
    const STATUS_CONTACT_IN_FUTURE = 'Contact In Future';
    const STATUS_NOT_CONTACTED = 'Not Contacted';
    const STATUS_ATTEMPTED_TO_CONTACT = 'Attempted to Contact';
    const STATUS_ASSOCIATED = 'Associated';
    const STATUS_SUBMITTED_TO_CLIENT = 'Submitted-to-client';
    const STATUS_APPROVED_BY_CLIENT = 'Approved by client';
    const STATUS_REJECTED_BY_CLIENT = 'Rejected by client';
    const STATUS_INTERVIEW_TO_BE_SCHEDULED = 'Interview-to-be-Scheduled';
    const STATUS_INTERVIEW_SCHEDULED = 'Interview-Scheduled';
    const STATUS_REJECTED_FOR_INTERVIEW = 'Rejected-for-Interview';
    const STATUS_ON_HOLD = 'On-Hold';
    const STATUS_HIRED = 'Hired';
    const STATUS_REJECTED = 'Rejected';
    const STATUS_REJECTED_HIRABLED = 'Rejected-Hirable';
    const STATUS_TO_BE_OFFERED = 'To-be-Offered';
    const STATUS_OFFER_ACCEPTED = 'Offer-Accepted';
    const STATUS_OFFER_MADE = 'Offer-Made';
    const STATUS_OFFER_DECLINED = 'Offer-Declined';
    const STATUS_OFFER_WITHDRAWN = 'Offer-Withdrawn';
    const STATUS_JOINED = 'Joined';
    const STATUS_NO_SHOW = 'No-Show';
    const STATUS_CONVERTED_EMPLOYEE = 'Converted-Employee';
    const STATUS_CONVERTED_TEMP = 'Converted-Temp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(JobOpening::class, 'job_opening_id');
    }

    /**
     * @return BelongsTo
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }
}
