<?php

namespace App\Http\Controllers;

use App\Models\ApplyIdea;
use App\Models\IdeaBudget;
use App\Models\IdeaDesc;
use App\Models\IdeaOutputs;
use App\Models\Persone;
use App\Models\Staff;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyIdeaController extends Controller
{
    //
    // THIS FUNCTION TO CHECK IF THE USER IS BLOCKED OR NOT
    private function checkBlockedUserAndExisting($personePIN)
    {
        $persone = Persone::where('pin', $personePIN)->first();

        if (!is_null($persone)) {
            return $persone->status && ($this->checksPersone($personePIN) == 'exists');
        } else {
            return false;
        }
    }

    // CHECK PERSONE IS EXISTS ?
    private function checksPersone ($pin) {
        $count = Persone::where('pin', $pin)->count();

        if ($count > 0) {
            return 'exists';
        }else {
            return 'not exists';
        }
    }

    public function personalInfo(Request $request)
    {
        if ($this->checkBlockedUserAndExisting($request->get('pin'))) {
            return response()->json([
                'message' => 'You\'re blocked',
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator($request->all(), [
            'idea_name' => 'required|string|min:5|max:30',
            'full_name' => 'required|string|min:5|max:30',
            'phone' => 'required|string|min:7|max:20',
            'pin' => 'required|string|min:9|max:20',
        ]);

        if (!$validator->fails()) {
            $idea = new ApplyIdea();
            $idea->idea_name = $request->get('idea_name');
            $idea->full_name = $request->get('full_name');
            $idea->phone = $request->get('phone');
            $idea->pin = $request->get('pin');

            if ($this->checksPersone($request->get('pin')) == 'not exists') {
                $persone = new Persone();
                $persone->name = $request->get('full_name');
                $persone->phone = $request->get('phone');
                $persone->pin = $request->get('pin');

                $isSaved = $idea->save() && $persone->save();
            }else {
                $isSaved = $idea->save();
            }


            return response()->json([
                'message' => $isSaved ? 'لقد تم حفظ التقدم' : 'حدثت مشكلة يرجى المحاولة مرة أخرى'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }


    public function delegatesNames(Request $request)
    {
        if ($this->checkBlockedUserAndExisting($request->get('pin'))) {
            return response()->json([
                'message' => 'You\'re blocked',
            ], Response::HTTP_BAD_REQUEST);
        }
        // $idea = ApplyIdea::where('pin', $request->get('pin'))->latest('created_at')->first();
        $validator = Validator($request->all(), [
            'full_name' => 'required|string|min:5|max:30',
            'pin' => 'required|string|min:9|max:20|exists:apply_ideas,pin',
            'phone' => 'required|string|min:7|max:20',
            'location' => 'required|string|min:5|max:15',
        ]);

        if (!$validator->fails()) {
            // GETTING IDEA
            $idea = ApplyIdea::where('pin', $request->get('pin'))->latest('created_at')->first();

            $staff = new Staff();
            $staff->full_name = $request->get('full_name');
            $staff->pin = $request->get('pin');
            $staff->phone = $request->get('phone');
            $staff->location = $request->get('location');

            if ($this->checksPersone($request->get('pin')) == 'not exists') {
                $persone = new Persone();
                $persone->name = $request->get('full_name');
                $persone->phone = $request->get('phone');
                $persone->pin = $request->get('pin');

                $staff_isSaved = $staff->save() && $persone->save();
            }else {
                $staff_isSaved = $staff->save();
            }

            if ($staff_isSaved) {
                // GETTING STAFF
                $staff = Staff::select(['id'])->where('pin', $request->get('pin'))->first();

                // UPDATE IDEA WITH STAFF ID
                $idea->staff_id = $staff->id;
                $idea_isSaved = $idea->save();

                return response()->json([
                    'message' => $idea_isSaved ? 'تم حفظ التقدم' : 'حدثت مشكلة ما يرجى المحاولة مرة أخرى'
                ], $idea_isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'message' => 'لقد حدث خطأ ما يرجى المحاولة مرة أخرى'
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function ideaDesc(Request $request)
    {
        if ($this->checkBlockedUserAndExisting($request->get('pin'))) {
            return response()->json([
                'message' => 'You\'re blocked',
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator($request->all(), [
            'desc' => 'required|string|min:10|max:500',
            'governorate' => 'required|string|min:3|max:30',
            'pin' => 'required|string|min:9|max:20|exists:apply_ideas,pin',
            'location' => 'required|string|min:5|max:30',
            'goals' => 'required|string|min:10|max:300',
            'importance' => 'required|string|min:10|max:300',
            'male_no' => 'required|integer|min:0|max:100',
            'female_no' => 'required|string|min:0|max:100',
            'methodology' => 'required|string|min:10|max:300',
        ]);

        if (!$validator->fails()) {

            // GETTING IDEA
            $idea = ApplyIdea::select(['id'])->where('pin', $request->get('pin'))->latest('created_at')->first();

            $ideaDesc = new IdeaDesc();
            $ideaDesc->idea_desc = $request->get('desc');
            $ideaDesc->governorate = $request->get('governorate');
            $ideaDesc->pin = $request->get('pin');
            $ideaDesc->goal = $request->get('goals');
            $ideaDesc->importance = $request->get('importance');
            $ideaDesc->male_no = $request->get('male_no');
            $ideaDesc->female_no = $request->get('female_no');
            $ideaDesc->idea_id = $idea->id;
            $ideaDesc->methodology = $request->get('methodology');
            $ideaDesc->district = $request->get('location');

            if ($this->checksPersone($request->get('pin')) == 'not exists') {
                $persone = new Persone();
                $persone->name = $request->get('full_name');
                $persone->phone = $request->get('phone');
                $persone->pin = $request->get('pin');

                $isCreated = $ideaDesc->save() && $persone->save();
            }else {
                $isCreated = $ideaDesc->save();
            }

            return response()->json([
                'message' => $isCreated ? 'تم حفظ التقدم' : 'حدث خطأ ما حاول مرة أخرى'
            ], $isCreated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function outputs(Request $request)
    {
        if ($this->checkBlockedUserAndExisting($request->get('pin'))) {
            return response()->json([
                'message' => 'You\'re blocked',
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator($request->all(), [
            'outputs' => 'required|string|min:10|max:300',
            'pin' => 'required|string|min:9|max:20|exists:apply_ideas,pin'
        ]);

        if (!$validator->fails()) {
            // GETTING IDEA
            $idea = ApplyIdea::select(['id'])->where('pin', $request->get('pin'))->latest('created_at')->first();

            $idea_outputs = new IdeaOutputs();
            $idea_outputs->outputs = $request->get('outputs');
            $idea_outputs->idea_id = $idea->id;

            if ($this->checksPersone($request->get('pin')) == 'not exists') {
                $persone = new Persone();
                $persone->name = $request->get('full_name');
                $persone->phone = $request->get('phone');
                $persone->pin = $request->get('pin');

                $isSaved = $idea_outputs->save() && $persone->save();
            }else {
                $isSaved = $idea_outputs->save();
            }

            return response()->json([
                'message' => $isSaved ? 'تم حفظ التقدم' : 'حدث خطأ ما يرجى المحاولة مرة أخرى',
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function budget(Request $request)
    {
        if ($this->checkBlockedUserAndExisting($request->get('pin'))) {
            return response()->json([
                'message' => 'You\'re blocked',
            ], Response::HTTP_BAD_REQUEST);
        }
        $validator = Validator($request->all(), [
            'type' => 'required|string|min:5|max:10',
            'unit' => 'required|string|min:5|max:10',
            'amount' => 'required|numeric|min:3|max:100000',
            'price' => 'required|numeric|min:3|max:100000',
            'salary_shikel' => 'required|integer|min:10|max:1000000',
            'price_salary_shikel' => 'required|integer|min:10|max:1000000',
            'pin' => 'required|string|min:9|max:20|exists:apply_ideas,pin',
        ]);

        if (!$validator->fails()) {
            // GETTING IDEA
            $idea = ApplyIdea::select(['id'])->where('pin', $request->get('pin'))->latest('created_at')->first();

            $budget = new IdeaBudget();
            $budget->type = $request->get('type');
            $budget->unit = $request->get('unit');
            $budget->amount = $request->get('amount');
            $budget->price = $request->get('price');
            $budget->salary_shikel = $request->get('salary_shikel');
            $budget->price_salary_shikel = $request->get('price_salary_shikel');
            $budget->notes = $request->get('notes');
            $budget->idea_id = $idea->id;

            if ($this->checksPersone($request->get('pin')) == 'not exists') {
                $persone = new Persone();
                $persone->name = $request->get('full_name');
                $persone->phone = $request->get('phone');
                $persone->pin = $request->get('pin');

                $isSaved = $budget->save() && $persone->save();
            }else {
                $isSaved = $budget->save();
            }

            return response()->json([
                'message' => $isSaved ? 'نقدر لك مشاركتك وتم حفظ الطلب وسيتم التواصل معك عما قريب' : 'حدث خطأ ما يرجى المحاولة مرة أخرى'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
