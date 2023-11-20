<?php
namespace App\Helpers;

use App\Models\UserLog;

class UserLogHelpers
{
    public static function user_log_action($user_id, $page, $document_id, $report_id, $prev_data, $up_data)
    {
        // Convert JSON data to arrays
        $prev_data = json_decode($prev_data, true);
        $up_data = json_decode($up_data, true);

        if (isset($prev_data['created_at'])) {
            unset($prev_data['created_at']);
        }

        if (isset($prev_data['updated_at'])) {
            unset($prev_data['updated_at']);
        }

        if (isset($up_data['created_at'])) {
            unset($up_data['created_at']);
        }

        if (isset($up_data['updated_at'])) {
            unset($up_data['updated_at']);
        }

        // Convert arrays back to JSON
        $prev_data = json_encode($prev_data);
        $up_data = json_encode($up_data);

        UserLog::create([
            'user_id' => $user_id,
            'page' => $page,
            'document_id' => $document_id,
            'report_id' => $report_id,
            'prev_data' => $prev_data,
            'new_data' => $up_data,
        ]);
    }
}