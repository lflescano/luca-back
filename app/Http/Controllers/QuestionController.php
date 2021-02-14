<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseCodes;
use Illuminate\Support\Facades\Validator;

use App\Models\Question;
use App\Models\User;
use App\Models\Subject;

use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Question::with('user', 'subject')->paginate($request->input('per_page'));

        return response()->json($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), ResponseCodes::HTTP_UNPROCESSABLE_ENTITY);
        }

        $question = DB::transaction(function () use ($request, $validator) {

            $question = Question::create(
                array_merge(
                    $validator->validated(),
                    [
                        'user_id' => User::first()->id,
                        'subject_id' => Subject::first()->id,
                    ]
                )
            );

           
            return $question;
        }, 5);

        return response()->json($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with('user', 'subject')->findOrFail($id);

        return response()->json($question);
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
         $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), ResponseCodes::HTTP_UNPROCESSABLE_ENTITY);
        }

        $question = Question::findOrFail($id);
        $question = DB::transaction(function () use ($request, $question, $validator) {
            $question->fill($validator->validated());
            $question->save();

            return $question;
        }, 5);

        return response()->json($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = DB::transaction(function () use ($id) {
            $question = Question::findOrFail($id);
            $question->delete();

            return $question;
        }, 5);

        return response()->json($question);
    }

}
