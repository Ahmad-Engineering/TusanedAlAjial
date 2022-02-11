<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::where('status', 1)->get();
        return response()->view('cpanel.contact-us.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'full_name' => 'required|string|min:5|max:50',
            'phone' => 'required|string|min:7|max:20',
            'email' => 'required|string|min:10|max:50',
            'msg' => 'required|string|min:10|max:450',
        ]);
        //
        if (!$validator->fails()) {
            $cont = new Contact();
            $cont->full_name = $request->get('full_name');
            $cont->phone = $request->get('phone');
            $cont->email = $request->get('email');
            $cont->msg = $request->get('msg');

            $isSaved = $cont->save();

            return response()->json([
                'message' => $isSaved ? 'لقدم تم حفظ طلب وسيأخد في عين الاعتبار, ونشكرك على تواصلك معنا' : 'نأسف حدث خطأ أثناء حفظ الطلب, حاول مرة أخرى رجاءً',
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::where('id', $id)->first();
        $contact->status = 0;
        $isSaved = $contact->save();

        if ($isSaved) {
            return response()->json([
                'icon' => 'success',
                'title' => 'Removed',
                'text' => 'Contact request is removed.'
            ], Response::HTTP_OK);
        }else {
            return response()->json([
                'icon' => 'error',
                'title' => 'Faild',
                'text' => 'Somthing wrong happened.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
