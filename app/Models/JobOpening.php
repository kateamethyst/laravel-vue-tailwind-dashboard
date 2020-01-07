<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOpening extends Model
{

  use SoftDeletes;
  
    const TYPE_FULLTIME = 'Full Time';
    const TYPE_PARTTIME = 'Part Time';
    const TYPE_TEMPORARY = 'Temporary';
    const TYPE_CONTRACT = 'Contract';
    const TYPE_TRAINING = 'Training';
    const TYPE_FREELANCE = 'Freelance';

    const STATUS_INPROGRESS = 'In Progress';
    const STATUS_WAITING_FOR_APPROVAL = 'Waiting For Approval';
    const STATUS_ONHOLD = 'On Hold';
    const STATUS_FILLED = 'Filled';
    const STATUS_CANCELLED = 'Cancelled';
    const STATUS_DECLINED = 'Declined';
    const STATUS_INACTIVE = 'Inactive';
    const STATUS_ACTIVE = 'Active';
    const STATUS_SUBMITTED_BY_CLIENT = 'Submitted By Client';

    const LEVEL_FRESHER = 'Fresher';
    const LEVEL_0TO1YEAR = '0-1 year';
    const LEVEL_1TO3YEARS = '1-3 years';
    const LEVEL_4TO5YEARS = '4-5 years';
    const LEVEL_5YEARSUP = '5+ years';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'number_of_position',
        'state',
        'country',
        'status',
        'type',
        'experience_level',
        'min_salary',
        'max_salary',
        'job_zoho_id'
    ];

    protected $dates = ['deleted_at'];
    
    /**
     * @return BelongsTo
     */
    public function industry(): BelongsTo
    {
        return $this->belongsTo(JobIndustry::class, 'job_industry_id');
    }

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
