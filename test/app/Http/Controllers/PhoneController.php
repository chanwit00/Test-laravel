<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Typephone;
use Config, Validator;


class PhoneController extends Controller
{
    var $rp = 10;
    public function index() {

        $phone = Phone::paginate($this->rp);
        return view('phone/index',compact('phone'));
    }
    public function search(Request $request) {
        $query = $request->q;
        if($query) {
        $phone = Phone::where('title', 'like', '%'.$query.'%')
        ->orWhere('title', 'like', '%'.$query.'%')
        ->paginate($this->rp);
        }
        else {
            $phone = Phone::paginate($this->rp);
            }
        return view('phone/index', compact('phone'));
        }


    public function edit($id = null) 
    {
        $typephone = Typephone::pluck('name', 'id')->prepend('เลือกรายการ', '');
        if($id) {
            // edit view
            $phone = Phone::where('id', $id)->first(); return view('phone/edit')
            ->with('phone', $phone)
            ->with('typephone', $typephone);
            } 
            else {
            return view('phone/add')
            ->with('typephone', $typephone);
            }
    }

    public function update(Request $request) 
    {
        $rules = array(
            'title' => 'required',
            'typephone_id' => 'required|numeric', 
            'price' => 'numeric',
            );
            
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน', 'numeric' => 'กรุณากรอกข้อมูล
            :attribute ให้เป็นตัวเลข',
            );

        
        $id = $request->id;

        $data = array(
            'title' => $request->title,
            'typephone_id' => $request->typephone_id,
            'price' => $request->price,
        );
        
        $validator = Validator::make($data, $rules, $messages);

            

        if ($validator->fails()) {
        return redirect('phone/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }

        $phone = Phone::find($id);
        $phone->title = $request->title;
        $phone->typephone_id = $request->typephone_id;
        $phone->price = $request->price;

        $phone->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());

            $phone->image_url = $relative_path;
            $phone->save();
        }

        

        return redirect('phone')
        ->with('ok', true)
        ->with('msg', 'บันทึกขอมูลเรียบร้อยแล้ว');
    }


    public function insert(Request $request)
    {

        $phone = new Phone();
        $phone->title = $request->title;
        $phone->typephone_id = $request->typephone_id;
        $phone->price = $request->price;

        $phone->save();

        if($request->hasFile('image'))
        {
            $f = $request->file('image');
            $upload_to = 'upload/images';

            $relative_path = $upload_to.'/'.$f->getClientOriginalName();
            $absolute_path = public_path().'/'.$upload_to;

            $f->move($absolute_path, $f->getClientOriginalName());

            $phone->image_url = $relative_path;
            $phone->save();
        }

        return redirect('phone')
        ->with('ok', true)
        ->with('msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว ');
    }

    public function remove($id) 
    {
        Phone::find($id)->delete();
        return redirect('phone')
        ->with('ok', true)
        ->with('msg', 'ลบข้อมูลสําเร็จ');
    }
    
}