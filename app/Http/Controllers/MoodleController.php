<?php

namespace App\Http\Controllers;

use App\Services\MoodleService;
use Illuminate\Http\Request;

class MoodleController extends Controller
{
    protected $moodle;

    public function __construct(MoodleService $moodle)
    {
        $this->moodle = $moodle;
    }

    public function getUsers()
    {
        $data = $this->moodle->get_users();

        return $data;
    }

    public function getCourses()
    {
        $data = $this->moodle->get_courses();

        return $data;
    }

    public function getEnrolledUsers(Request $request)
    {
        $course_id = $request->get('course_id');

        if(!$course_id)
            die('course_id param reuired!');

        $data = $this->moodle->get_enrolled_users($course_id);

        return $data;
    }
}
