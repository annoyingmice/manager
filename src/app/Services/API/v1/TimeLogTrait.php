<?php

namespace App\Services\API\v1;

use App\Dto\API\v1\TimeLogCreateDto;
use App\Libs\Otp;
use App\Models\Company;
use App\Models\TimeLog;
use App\Models\User;
use Error;

trait TimeLogTrait
{
    private $otp;

    public function __v1InitializeTimeLog()
    {
        $this->otp = new Otp();
    }

    /**
     * List new time log
     * @return mixed
     */
    public function v1TimeLogs(?int $limit = 20): mixed
    {
        $timeLogs = TimeLog::paginate($limit);
        return $timeLogs;
    }

    /**
     * Create new time log
     * @param TimeLogCreateDto $dto
     * @return TimeLog
     */
    public function v1TimeLogCreate(TimeLogCreateDto $dto): TimeLog
    {
        $meta = [
            'employee_no' => $dto->employee_no,
        ];
        $user = User::whereHas('companyUser', function($q) use ($dto) {
            // $q->where('emloyee_no', $dto->employee_no)
            $q->where('company_id', $dto->company_id);
        })->first();

        $company = Company::find($dto->company_id);

        $timeLog = TimeLog::where('user_id', $user->id)
            ->where('company_id', $dto->company_id)
            ->whereDate('created_at', now())
            ->first();

        if(is_null($company))
        {
            throw new Error('This company doesn\'t exists.');
        }

        if(is_null($user))
        {
            throw new Error('This acccount is not associated in this company.');
        }

        if(!$this->otp->verify($company->otp_secret, $dto->otp))
        {
            throw new Error('Verification fail.');
        }

        if(is_null($timeLog)) {
            $timeLog = new TimeLog();
        }

        $timeLog->user_id = $user->id;
        $timeLog->company_id = $dto->company_id;

        // dd(
        //     $timeLog->time_in_am,
        //     is_null($timeLog),
        //     !is_null($timeLog->time_in_am)
        //     && is_null($timeLog->time_out_am),
        //     !is_null($timeLog->time_out_am)
        //     && is_null($timeLog->time_in_pm),
        //     !is_null($timeLog->time_in_pm)
        //     && is_null($timeLog->time_out_pm)
        // );

        if(
            !is_null($timeLog)
            && !is_null($timeLog->time_in_pm)
            && is_null($timeLog->time_out_pm)
        ) 
        {
            $timeLog->time_out_pm = now();
        }

        if(
            !is_null($timeLog)
            && !is_null($timeLog->time_out_am)
            && is_null($timeLog->time_in_pm)
        ) 
        {
            $timeLog->time_in_pm = now();
        }

        if(
            !is_null($timeLog)
            && !is_null($timeLog->time_in_am)
            && is_null($timeLog->time_out_am)
        ) 
        {
            $timeLog->time_out_am = now();
        }

        if(is_null($timeLog->time_in_am))
        {
            $timeLog->time_in_am = now();
        }
        
        $timeLog->otp = !is_null($timeLog->otp) ? $timeLog->otp .','. $dto->otp : $dto->otp;
        $timeLog->meta = $meta;
        $timeLog->save();
        return $timeLog;
    }

    /**
     * Update new time log
     * @param TimeLogCreateDto $dto
     * @param TimeLog $timeLog
     * @return TimeLog
     */
    public function v1TimeLogUpdate(TimeLogCreateDto $dto, TimeLog $timeLog): TimeLog
    {
        $meta = [
            'employee_no' => $dto->employee_no,
        ];
        $user = User::whereHas('companyUser', function($q) use ($dto) {
            $q->where('emloyee_no', $dto->employee_no)
            ->where('company_id', $dto->company_id);
        })->first();

        $company = Company::find($dto->company_id);

        if(is_null($company))
        {
            throw new Error('This company doesn\'t exists.');
        }

        if(is_null($user))
        {
            throw new Error('This acccount is not associated in this company.');
        }

        if(!$this->otp->verify($company->otp_secret, $dto->otp))
        {
            throw new Error('Verification fail.');
        }

        $timeLog->user_id = $user->id;
        $timeLog->company_id = $dto->company_id;

        if(is_null($timeLog->time_in_am))
        {
            $timeLog->time_in_am = now();
        }

        if(
            !is_null($timeLog->time_in_am)
            && is_null($timeLog->time_out_am)
        ) 
        {
            $timeLog->time_out_am = now();
        }

        if(
            !is_null($timeLog->time_out_am)
            && is_null($timeLog->time_in_pm)
        ) 
        {
            $timeLog->time_in_pm = now();
        }

        if(
            !is_null($timeLog->time_in_pm)
            && is_null($timeLog->time_out_pm)
        ) 
        {
            $timeLog->time_out_pm = now();
        }

        $timeLog->otp = $dto->otp;
        $timeLog->meta = $meta;
        $timeLog->save();
        return $timeLog;
    }

    /**
     * Show new time log
     * @param TimeLog $timeLog
     * @return TimeLog
     */
    public function v1TimeLogShow(TimeLog $timeLog): TimeLog
    {
        return $timeLog;
    }

    /**
     * Show new time log
     * @param TimeLog $timeLog
     * @return TimeLog
     */
    public function v1TimeLogDelete(TimeLog $timeLog): TimeLog
    {
        $timeLog->delete();
        return $timeLog;
    }
}
