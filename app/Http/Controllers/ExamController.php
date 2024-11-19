<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\QnaExam;
use App\Models\ExamAnswer;
use Illuminate\support\facades\Auth;
use App\Models\ExamAttempt;


class ExamController extends Controller
{
    public function loadExamDashboard($id){

        $qnaexam=Exam::where('enterance_id',$id)->with('getQnaExam')->get();

        if(count($qnaexam)>0){

            if($qnaexam[0]['date']==date('Y-m-d')){

                    $qna=QnaExam::where('exam_id',$qnaexam[0]['id'])->with('question','answers')->get();
                    return view('user.exam-dashboard',['success'=>true,'exam'=>$qnaexam,'qna'=>$qna]);

            }
            else if($qnaexam[0]['date']>date('Y-m-d')){
                return view('user.exam-dashboard',['success'=>false,'msg'=>'this exam will be start on '.$qnaexam[0]['date'],'exam'=>$qnaexam]);
            }
            else{
                return view('user.exam-dashboard',['success'=>false,'msg'=>'this exam has been Expired on '.$qnaexam[0]['date'],'exam'=>$qnaexam]);
            }

        
        }
        else{
            return view('404');
        }

    }



    public function examSubmit(Request $request){

        $attempt_id =ExamAttempt::insertGetId([
            'exam_id' =>$request->exam_id,
            'user_id'=>Auth::user()->id

        ]);
        $qcount=count($request->q);

        if($qcount>0){

            for($i=0;$i<$qcount;$i++){


                ExamAnswer::insert([
                    'attempt_id' =>$attempt_id,
                    'question_id' =>$request->q[$i],
                    'answer_id' =>request()->input('ans_'.$i+1)
                    
                ]);
            }   

        }
        return view('user.thankyou');

    }
}
