<?php

namespace App\Http\Controllers\API;

use App\InternshipUser;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        
        if($input['status'] == 'on'){
            $status_id = 2;
        }
        else{
            $status_id = 1;
        }

        Review::insert([
            'review' => $input['review'],
            'mark' => $input['mark'],
            'status_id' => $status_id,
            'internship_user_id' => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $review){
        $input = $request->all();

        if ($input['status'] == 'on')
        {
            $input['status_id'] = 2;
        }

        $review = Review::findorfail($review);

        $review->update($input);
        return redirect (route ('index'));
    }

    public
    function destroy ($review)
    {
        if (Review::destroy ($review))
        {
            return redirect (route ('index'));
        }
        return response (0, 200);
    }
}
