<?php

namespace App\Http\Controllers\Instructor;

use App\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Common\Profile\Address;
use App\Models\Common\Profile\Education;
use App\Models\Common\Profile\JobExperience;
use App\Models\Common\Profile\JobProfile;
use App\Models\SystemUserProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileProgressBar extends Controller
{
    public function progress()
    {
        try {
            $maxPoint = 100;
            $authData          = User::where('id', Auth::id())->first();
            $profileData       = SystemUserProfile::where('user_id', Auth::id())->first();
            $addressData       = Address::where('user_id', Auth::id())->first();
            $educationData     = Education::where('user_id', Auth::id())->first();
            $jobProfileData    = JobProfile::where('user_id', Auth::id())->first();
            $jobExperienceData = JobExperience::where('user_id', Auth::id())->first();
            //Profile
            $profile_pic      = !empty($authData->avatar) ? 3.57 : 0;
            $first_name       = !empty($profileData->first_name) ? 3.57 : 0;
            $last_name        = !empty($profileData->last_name) ? 3.57 : 0;
            $email            = !empty($authData->email) ? 3.57 : 0;
            $nationalCode_no  = !empty($profileData->nationalCode_no) ? 3.57 : 0;
            $phone_number     = !empty($authData->phone_number) ? 3.57 : 0;
            $dob              = !empty($profileData->dob) ? 3.57 : 0;
            $signature_image  = !empty($profileData->signature_image) ? 3.57 : 0;
            //Addrerss
            $permanent_address    = !empty($addressData->permanent_address) ? 3.57 : 0;
            $permanent_country_id = !empty($addressData->permanent_country_id) ? 3.57 : 0;
            $permanent_state      = !empty($addressData->permanent_state) ? 3.57 : 0;
            $permanent_city       = !empty($addressData->permanent_city) ? 3.57 : 0;
            $permanent_zip        = !empty($addressData->permanent_zip) ? 3.57 : 0;
            //Education
            $level_of_education = !empty($educationData->level_of_education) ? 3.57 : 0;
            $degree_title       = !empty($educationData->degree_title) ? 3.57 : 0;
            $institution        = !empty($educationData->institution) ? 3.57 : 0;
            $passing_year       = !empty($educationData->passing_year) ? 3.57 : 0;
            $result             = !empty($educationData->result) ? 3.57 : 0;
            //Job Profile
            $is_want_job        = !empty($jobProfileData->is_want_job) ? 3.57 : 0;
            $typeof_job         = !empty($jobProfileData->typeof_job) ? 3.57 : 0;
            $job_preference     = !empty($jobProfileData->job_preference) ? 3.57 : 0;
            $is_outside_job     = !empty($jobProfileData->is_outside_job) ? 3.57 : 0;
            $is_job_experienced = !empty($jobProfileData->is_job_experienced) ? 3.57 : 0;
            //Job Experience
            $job_title        = !empty($jobExperienceData->job_title) ? 3.57 : 0;
            $company_name     = !empty($jobExperienceData->company_name) ? 3.57 : 0;
            $is_related_to_it = !empty($jobExperienceData->is_related_to_it) ? 3.57 : 0;
            $job_description  = !empty($jobExperienceData->job_description) ? 3.57 : 0;
            $is_studying      = !empty($jobExperienceData->is_studying) ? 3.57 : 0;

//            return response()->json([$first_name,$last_name,$email,$nationalCode_no,$phone_number,$dob,$profile_pic,$signature_image]);

            $percentage = ceil($first_name + $last_name + $email + $nationalCode_no + $phone_number + $dob + $profile_pic +
                    $signature_image + $permanent_address + $permanent_country_id + $permanent_state + $permanent_city + $permanent_zip +
                    $level_of_education + $degree_title + $institution + $passing_year + $result +
                    $is_want_job + $typeof_job + $job_preference + $is_outside_job + $is_job_experienced +
                    $job_title + $company_name + $is_related_to_it + $job_description + $is_studying) ;


            $basicProfile = !empty($profileData->first_name) ? 1 : 0;
            $address = !empty($addressData->permanent_address) ? 1 : 0;
            $education = !empty($educationData->level_of_education) ? 1 : 0;
            $job = !empty($jobProfileData->is_want_job) ? 1 : 0;
            $jobExperience = !empty($jobExperienceData->job_title) ? 1 : 0;

            $profileProgressData = [
                'percentage' => $percentage,
                'basicProfile' => $basicProfile,
                'address' => $address,
                'education' => $education,
                'job' => $job,
                'jobExperience' => $jobExperience,
            ];

            return ApiHelper::jsonResponse('', 'OK', 200, $profileProgressData);
        } catch (\Exception $e)
        {
            \Log::info($e);
            return ApiHelper::jsonResponse('Something went wrong!', 'Not Found', 404, NULL);
        }
    }
}
