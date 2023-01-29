<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;
use App\Number;
use App\Http\Requests\UserStoreRequest;

class rescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveContact(Contact $data, array $request)
    {
        
        $data->fname = $request['fname'];
        $data->lname = $request['lname'];
        $data->company = $request['company'];
        $data->email = $request['email'];
        $data->address = $request['address'];
        $data->link = $request['link'];
        $data->bday = $request['bday'];
        $data->notes = $request['notes'];
        $data->save();

    }

    public function saveNumber($id,array $request)
    {
        $n= new Number;
        $data = [['contact_id'=>$id,'num' => $request['phone1']]];
        
        if($request['phone2']!="")
        {
            array_push($data,['contact_id'=>$id,'num' => $request['phone2']]);

        }
        if($request['phone3']!="")
        {
            array_push($data,['contact_id'=>$id,'num' => $request['phone3']]);
        }
        
        $n->insert($data);

    }
    

    public function index()
    {
        // $records = DB::table('contacts')->orderBy('fname')->get();


        $records = Contact::all();
        return view("welcome", compact("records"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data= new Contact;
        $this->saveContact($data,$request->all());
        $this->saveNumber($data->id,$request->all());
        return redirect("phonebook");

        // $data = [
        //     'name' => $request->input('name'),
        //     'phone' => $request->input('phone')

        // ];
        // DB::table('data')->insert($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $record = DB::table('data')->where('id','=',$id)->first();
        
        // $record=Contact::returnRecords($id);
        // $nums = Number::returnRecords($id);

        $record= Contact::returnRecords($id);
        return view("show",compact("record"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $record = DB::table('data')->where('id','=',$id)->first();
        // $record = Contact::where('id',$id)->first();

        $record = Contact::returnRecords($id);

        return view("edit", compact("record") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updatenumber($id, array $request)
    {


        $nums= Number::where("contact_id",$id)->get();
        $nums[0]->num = $request['phone1'];
        $nums[0]->save();
        if($request['phone2']!="")
        {
            if(sizeof($nums)>1)
            {
                $nums[1]->num = $request['phone2'];
                $nums[1]->save();
            }
            else
            {
                $n= new Number;
                $n->contact_id=$id;
                $n->num = $request['phone2'];
                $n->save();
            }
        }
        else
        {
            if(sizeof($nums)>1)
            {
                $nums[1]->delete();
            }
        }
        if($request['phone3']!="")
        {
            if(sizeof($nums)>2)
            {
                $nums[2]->num = $request['phone3'];
                $nums[2]->save();
            }
            else
            {
                $n= new Number;
                $n->contact_id=$id;
                $n->num = $request['phone3'];
                $n->save();
            }
        }
        else
        {
            if(sizeof($nums)>1)
            {
                $nums[2]->delete();
            }
        }
        
    }

    public function update(UserStoreRequest $request, $id)
    {
        // $data = [
        //     'name' => $request->name,
        //     'phone' => $request->phone
        // ];
        // DB::table('data')->where('id','=',$id)->update($data);
        // $data = Contact::find($id);
        // $data->fname=$request->name;
        // $data->phone=$request->phone;
        // $data->save();


        $data= Contact::find($id);
        $this->saveContact($data, $request->all());
        
        $this->updatenumber($id,$request->all());

        return redirect("phonebook");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('data')->where('id','=',$id )->delete();
        // $data = Contact::find($id);
        // $data->delete();
        Contact::where('id',$id)->delete();
        Number::where('contact_id',$id)->delete();

        return redirect("phonebook");
    }
}
