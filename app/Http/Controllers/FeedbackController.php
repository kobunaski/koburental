<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
    public function view()
    {
        $Feedback = Feedback::all();
        return view('admin.feedback.view', ['Feedback' => $Feedback]);
    }

    public function addFeedback(Request $request, $id)
    {
        $Feedback = new Feedback;

        $Feedback->content = $request->feedback_content;
        $Feedback->id_user = Auth::user()->id;
        $Feedback->id_vehicle = $id;
        $Feedback->rating = $request->rating;

        $Feedback->save();

        return redirect('vehicle/detail/' . $id);
    }

    public function deleteFeedback($id)
    {
        $Feedback = Feedback::find($id);
        $id_vehicle = $Feedback -> id_vehicle;
        $Feedback -> delete();
        return redirect('vehicle/detail/' . $id_vehicle);
    }
}
