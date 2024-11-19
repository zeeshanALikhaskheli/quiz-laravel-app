<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Event;
use App\Models\QnaExam;
use Illuminate\Support\facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\facades\URL;
USe Mail;


class AdminController extends Controller
{
    public function addSubject(Request $request){
        $request->validate([
            'subject'=>'required'
        ]);
        
        $subject =new Subject;
        $subject ->subject=$request->subject;
        $subject ->save();

        
        
        
        return back()->with('message','successfully Added');
    // try{
    //     Subject::insert([
    //         'subject'=>$request->subject
    //     ]);

    //     return response()->json(['succcess'=>true,'msg'=>'Subject Added successffully']);
    // }

    // catch(\Exception $e){
    //     return response()->json(['succcess'=>false,'msg'=>$e->getMessage()]);
    // };
    }
    public function examdashboard(){
        $subjects=Subject::all();
        $exams=Exam::with('subjects')->get();
        return view('admin.exam-dashboard',compact('exams','subjects'));
    }
    public function addexam(Request $request){

        $request->validate([
            'exam'=>'required',
            'subject_id'=>'required',
            'date'=>'required',
            'time'=>'required',
        ]);
        

        $unique_id=uniqid('examid');

        Exam::insert([

            'exam'=>$request->exam,
            'subject_id'=>$request->subject_id,
            'date'=>$request->date,
            'time'=>$request->time,
            'enterance_id'=>$unique_id
        ]);
    

        
        

        return back()->with('message','successfully Added');
    }

    public function studentdashboard(){
        $students=User::where('is_admin',0)->get();
        return view('admin.student-dashboard',compact('students'));
    }
    public function addStudent(Request $request){

            $password=str::random(8);

                User::insert([

                    'name'=>$request->name,
                    'email'=>$request->name,
                    'password'=>Hash::make($password)
                ]);

            // $user =new User;
            // $user ->name=$request->name;
            // $user ->email=$request->email;
            // $user ->password=Hash::make($password);
            // $user ->save();

            $url=URL::to('/');
            $data['url']=$url;
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['password']=$password;
            $data['title']="Icreativez Quizz online Examination System";
            

            Mail::send('admin.registrationMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])>subject($data['title']);

            });

            return back()->with('message','successfully Send');

    }

    public function quizdashboard(){
        $answers=Answer::where('is_correct',1)->get();
        $questions=Question::with('answer')->get();
        return view('admin.quiz-dashboard',compact('questions','answers'));
    }

    public function addquiz(Request $request){

        $questionid=Question::insertGetId([
            'question'=>$request->question
        ]);

        foreach($request ->answers as $answer){

            $is_correct=0;
            if($request->is_correct==$answer)
            {
                $is_correct=1;
            }
            Answer::insert([
                'question_id'=>$questionid,
                'answer'=>$answer,
                'is_correct'=>$is_correct

            ]);


        }
        return back()->with('message','successfully Send');
      
    }


    public function calenderdashboard(){

        return view('admin.Calender');
    }
 

    public function addevent(Request $request)
    {
        $Event =new Event;
        $Event ->title=$request->title;
        $Event ->description=$request->description;
        $Event ->start=$request->start;
        $Event ->end=$request->end;
        $Event ->save();

        return back()->with('message','successfully Send');

    }

    public function getQuestion(Request $request){
        try{

            $questions=Question::all();
            
            if(count($questions)>0){
                $data=[];
                $counter=0;
                foreach($questions as $question){

                    $qnaExam=QnaExam::where(['exam_id'=>$request->exam_id,'question_id'=>$question->id])->get();

                    if(count($qnaExam)==0){
                        $data[$counter]['id']=$question->id;
                        $data[$counter]['questions']=$question->question;
                        $counter++;
                    }
                }
                return response()->json(['success'=>true,'msg'=>'Queestion Data !','data'=>$data]);
            }
            else{
                return response()->json(['success'=>false,'msg'=>'Queestion Not Found !']);
            }
            
        }
        catch(\Excetion $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

    public function added(Request $request){


        if(isset($request->questions_ids)){
            foreach($request->questions_ids as $qid){

                    QnaExam::insert([
                            'exam_id'=>$request->exam_id,
                            'question_id'=>$qid     

                    ]);

                    
                    
                    
                }
                
            }
            
            
            
            return response()->json(['success'=>true,'msg'=>'Queestion Added !']);
        }


        public function getExamsQuestions(Request $request)
        {
            try {
                
                // Fetch exam questions with related question data
                $data = QnaExam::where('exam_id', $request->exam_id)->with('question')->get();
        
                return response()->json(['success' => true, 'msg' => 'Question data retrieved!', 'data' =>$data]);
            } 
            catch (\Exception $e) {
                // Catch any exceptions and return a meaningful error message
                return response()->json(['success' => false, 'msg' => 'Error: ' . $e->getMessage()]);
            }

        }


        public function deleteExamQuestions(Request $request){
            try {
               
        
                // Attempt to delete the question
                QnaExam::where('id', $request->id)->delete();
        
                // Return a success message if deletion is successful
                return response()->json(['success' => true, 'msg' => 'Question deleted successfully!']);
            } 
            catch (\Exception $e) {
                // Catch and return a meaningful error message in case of failure
                return response()->json(['success' => false, 'msg' => 'Error: ' . $e->getMessage()]);
            }

        }
        

 
}
