<?php

namespace App\Services;

use GuzzleHttp\Client;

class MoodleService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.moodle.url')
                . '?wstoken=' . config('services.moodle.token')
        ]);
    }

    public function get_users()
    {
        $func = 'local_wstemplate_get_users';

        $resp = $this->client->post('', [
            'form_params' => ['wsfunction' => $func]
        ]);

        return $resp->getBody();
    }

    public function get_courses()
    {
        $func = 'local_wstemplate_get_courses';

        $resp = $this->client->post('', [
            'form_params' => ['wsfunction' => $func]
        ]);

        return $resp->getBody();
    }

    public function get_enrolled_users($course_id)
    {
        $func = 'local_wstemplate_get_enrolled_users';

        $resp = $this->client->post('', [
            'form_params' => [
                'wsfunction' => $func,
                'courseid' => $course_id
            ]
        ]);

        return $resp->getBody();
    }
}
