<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Course_Detail;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class HomePageController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->get();
        $course_details = Course_Detail::all();
        $contact = Contact::first();
        $testimonials = Testimonial::orderBy('id','DESC')->where('status','1')->get();
        return view('layouts.pages.index')->with(compact('categories','new_courses','course_details','contact','testimonials'));
    }

    public function detail($slug){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $course = Course::with('course_details')->where('slug',$slug)->first();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->get();
        $contact = Contact::first();
        $related_courses = Course::where('category_id',$course->category_id)->where('slug','NOT LIKE',$slug)->get();
        $courses_detail_all = Course_Detail::all();
        $course_detail = Course_Detail::where('course_code',$course->course_code)->first();

        return view('layouts.pages.detail')->with(compact('categories','course','new_courses','contact','related_courses','courses_detail_all','course_detail'));
    }

    public function contact(){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->get();
        $contact = Contact::first();

        return view('layouts.pages.contact')->with(compact('contact','categories','new_courses'));
    }
    public function all_course(){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->paginate(6);
        $contact = Contact::first();
        $course_details = Course_Detail::all();
        return view('layouts.pages.course')->with(compact('categories','new_courses','contact','course_details'));
    }

    public function category_course($slug){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->get();
        $category_id = Category::where('slug',$slug)->first();
        $category_courses = Course::with('course_details')->where('category_id',$category_id->id)->orderBy('id','DESC')->where('status',1)->get();
        $contact = Contact::first();
        $course_details = Course_Detail::all();
        return view('layouts.pages.category')->with(compact('categories','category_courses','contact','course_details','new_courses'));
    }

    public function search_score(){

        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->orderBy('id','DESC')->where('status',1)->get();
        $contact = Contact::first();

        if ($keyword = request()->mssv){
            $user = User::where('id_student',$keyword)->first();
            return view('layouts.pages.search_score')->with(compact('contact','categories','new_courses','user','keyword'));
        }

        return view('layouts.pages.search_score')->with(compact('contact','categories','new_courses'));
    }

    public function register(){
        $categories = Category::where('status',1)->orderBy('id','DESC')->get();
        $new_courses = Course::with('course_details')->where('sold','<',40)->orderBy('id','DESC')->where('status',1)->get();
        $contact = Contact::first();
        return view('layouts.pages.register')->with(compact('contact','categories','new_courses'));
    }

}
