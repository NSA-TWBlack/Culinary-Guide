<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserFeedbackRequest;
use App\Models\Feedbacks;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFeedbackController extends Controller
{
    public function index() {
        $temp = false;
        return view('user.page.feedback.feedback', compact('temp'));
    }

    public function store(UserFeedbackRequest $request) {
        $feedback = new Feedbacks;
        $feedback->content = $request->txtFeedback;
        $feedback->id_user = Auth::user()->id;
        $feedback->save();
        $temp = true;
        return view('user.page.feedback.feedback', compact('temp'));
    }
}
