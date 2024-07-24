<?php

namespace App\Mail;

use App\Models\Grades;
use App\Models\Subject;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GradeImportNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $grade;
    public $subject_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Grades $grade)
    {
        $subject_name = new Subject();
        $this->grade = $grade;
        $this->subject_name = $subject_name->find($grade->subject_id)->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.grade-import-notification')
                    ->with([
                        'student_name' => $this->grade->student_fullname,
                        'student_code' => $this->grade->student_code,
                        'attendance_score' => $this->grade->attendance_score,
                        'midterm_score' => $this->grade->midterm_score,
                        'final_score' => $this->grade->final_score,
                        'average_of_subject' => $this->grade->average_of_subject,
                        'subject_name' => $this->subject_name,
                    ]);
    }
}
