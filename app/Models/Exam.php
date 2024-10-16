<?php

namespace App\Models;

use App\Http\Traits\NotificationFirebaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory,NotificationFirebaseTrait;
    protected $guarded=[];


    public function scopeProperty($query)
    {
        return $query->where('school_id', auth('admin')->user()->school_id);
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    protected static function booted()
    {
        parent::booted();

        static::created(function ($model) {
            $student=$model->student;
            $category=$model->category;
            $text = "تم اجراء اختبار لنجلكم " . $student->name . " باسم " . $model->title . " في مادة " . $category->title_ar . " وتم حصوله على " . $model->degree_of_student . " من " . $model->degree_of_exam;


            $notification=   Notification::create([
                'title'=>'تقرير اجراء اختبار',
                'type'=>'exam',
                'foreign_id'=>$model->id,
                'student_id'=>$model->student_id,
                'date'=>date('Y-m-d'),
                'text'=>$text,
                'school_id'=>auth('teacher')->user()->school_id,


            ]);
            $student=Student::find($notification->student_id);
            $parent=Parents::where('phone',$student->phone)->first();
            $parent_ides=Parents::where('phone',$student->phone)->pluck('id');
            $notificationObject = [
                'notification' => [
                    'title' => $notification->title,
                    'body' => $notification->text,
                    'sound'=>'default',
                ],
                'data' => [
                    'title' => $notification->title,
                    'body' => $notification->text,
                    'type' => $notification->type,
                    'foreign_id'=>$notification->foreign_id,
                    'student_id'=>$notification->student_id,
                    'parent_id'=>$parent->id??'',


                ],
            ];
            $model->sendFCMNotification($parent_ides, $notificationObject);
        });
    }
}

