<?php

namespace App\Http\Controllers;

use App\Offre;
use App\QuestionnairePart;
use App\QuestionnaireQuestion;
use App\Sujet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionnaireBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $parts = QuestionnairePart::orderBy('position', 'DESC')->get();
        $offre = Offre::all();
        $questions = QuestionnaireQuestion::orderBy('position', 'DESC')->get();

        return view('back.questionnaire.index', compact('parts', 'offre', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.questionnaire.create_part');
    }

    public function create_question($partid)
    {
        $part = QuestionnairePart::find($partid);
        $questions = $part->questions;
        return view('back.questionnaire.create_question', compact('part', 'questions'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new QuestionnaireQuestion();
        $question->question = $request->get('question');
        if ($request->get('sous-question') != "") {
            $question->questionnaire_question_id = $request->get('sous-question');
        }
        $question->questionnaire_part_id = $request->get('id');
        $question->save();
        return redirect()->route('questionnaire.index')->withStatus(__('Offre créée avec succès.'));

    }

    public function store_part(Request $request)
    {
        $part = new QuestionnairePart();
        $part->titre = $request->get('section');
        $part->save();
        return redirect()->route('questionnaire.index')->withStatus(__('Offre créée avec succès.'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = QuestionnaireQuestion::find($id);
        $questions = QuestionnaireQuestion::all();
        return view('back.questionnaire.edit_question', compact('question', 'questions'));
    }

    public function edit_part($id)
    {
        $part = QuestionnairePart::find($id);
        return view('back.questionnaire.edit_part', compact('part'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    public function update_quest(Request $request, $id)
    {
        $question = QuestionnaireQuestion::find($id);
        $question->question = $request->get('question');
        if ($request->get('sous-question') != null) {
            $question->questionnaire_question_id = $request->get('sous-question');
        } else {
            $question->questionnaire_question_id = null;
        }
        $question->questionnaire_part_id = $request->get('id');
        $question->update();
        return redirect()->route('questionnaire.index')->withStatus(__('question modifié avec succès'));
    }

    public function update_part(Request $request, $id)
    {
        $part = QuestionnairePart::find($id);
        $part->titre = $request->get('section');
        $part->update();
        return redirect()->route('questionnaire.index')->withStatus(__('Section modifié avec succès'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = QuestionnaireQuestion::find($id);
        $question->delete();
        return redirect()->route('questionnaire.index')->withStatus(__('question supprimée avec succès'));
    }

    public function destroy_part($id)
    {
        $part = QuestionnairePart::find($id);
        foreach ($part->questions as $question) {
            $question->delete();
        }
        $part->delete();
        return redirect()->route('questionnaire.index')->withStatus(__('Section supprimée avec succès'));
    }
    public function update_order(Request $request)
    {
        $partsrc= QuestionnairePart::find($request->source);
        $partdst = QuestionnairePart::find($request->destination);
        $postionsrc = intval($partsrc->position);
        $partsrc->position = intval($partdst->position);
        $partdst->position = $postionsrc;
        $partsrc->save();
        $partdst->save();
        return response()->json(['result' =>'ok']);
    }
    public function update_orderQuest (Request  $request)
    {
        $questionsrc = QuestionnaireQuestion::find($request->source);
        $questiondst = QuestionnaireQuestion::find($request->destination);
        $positionsrc = intval($questionsrc->position);
        $questionsrc->position = intval($questiondst->position);
        $questiondst->position = $positionsrc;
        $questiondst->save();
        $questionsrc->save();
        return response()->json(['result' =>'ok']);
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("questionnaire_questions")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "question(s) supprimé(s) avec succès."]);

        //return redirect()->route('offres.index')->withStatus(__('Offres supprimées avec succès'));
    }

}
