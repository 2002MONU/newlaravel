<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurAchievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'projact_worked','projact_worked_icon','expert_worker','expert_worker_icon',
        'happy_client','happy_client_icon','upcoming_project','upcoming_project_icon',
        'projact_worked_text','expert_worker_text','happy_client_text','upcoming_project_text',
        'text_05_text','text_05_text_report','text_06_text','text_06_text_report'
    ];
}
