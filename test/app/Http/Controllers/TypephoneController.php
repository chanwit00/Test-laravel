<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Typephone;
use Config, Validator;


class TypephoneController extends Controller
{
    var $rp = 10;
    public function index() {

        $typephones = Typephone::paginate($this->rp);
        return view('typephone/index',compact('typephones'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
        $typephones = Typephone::where('id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->paginate($this->rp);
        }
        else {
            $typephones = typephone::paginate($this->rp);
            }
        return view('typephone/index', compact('typephones'));
        }

    public function edit($id = null) {
        if($id) {
            $typephones = typephone::find($id);
            return view('typephone/edit')->with('typephone', $typephones);  
        } else {
            return view('typephone/add');
        }
      
    
        
    }

    public function update(Request $request) {
        $rules = array(
            'name' => 'required',
            );
            
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            );
            
        $id = $request->id;

        $temp = array(
            'id' => $request->id,
            'name' => $request->name
            );
        
        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
        return redirect('typephone/edit/'.$id)
        ->withErrors($validator)
        ->withInput();
        }

        $typephones = typephone::find($id);
        $typephones->id = $request->id;
        $typephones->name = $request->name;
 
        $typephones->save();
        return redirect('typephone')
        ->with('ok', true)
        ->with('msg', 'บันทึกขอมูลเรียบร้อยแล้ว');
    }
    public function insert(Request $request){

        $typephones = new typephone();
        $typephones->name = $request->name;
        $typephones->save();


        return redirect('typephone')
        ->with('ok', true)
        ->with('msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว ');
    }

    public function remove($id) {
        typephone::find($id)->delete();
        return redirect('typephone')
        ->with('ok', true)
        ->with('msg', 'ลบข้อมูลสําเร็จ');
    }
}
