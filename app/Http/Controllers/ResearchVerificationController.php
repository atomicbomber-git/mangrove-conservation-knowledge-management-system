<?php

namespace App\Http\Controllers;

use App\Research;

class ResearchVerificationController extends Controller
{
    public function create(Research $research)
    {
        $research->status = Research::STATUS_APPROVED;
        $research->save();

        return back()
            ->with("message_state", "success")
            ->with("message_text", __("messages.update.success"));
    }

    public function delete(Research $research)
    {
        $research->status = Research::STATUS_UNAPPROVED;
        $research->save();

        return back()
            ->with("message_state", "success")
            ->with("message_text", __("messages.update.success"));
    }
}
