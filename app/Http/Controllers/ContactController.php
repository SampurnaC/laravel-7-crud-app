<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $contacts = Contact::all();
      return view('contacts.index', compact('contacts'));
    }


    public function simple(Request $request)
      {
          $data = \DB::table('contacts');
          if( $request->input('search')){
              // $data = $data->where('first_name', 'LIKE', "%" . $request->search . "%");

              // $query = Book::query();
              $columns = ['first_name', 'last_name'];
              foreach($columns as $column){
                  $data->orWhere($column, 'LIKE', '%' . $request->search . '%');
              }
              // $books = $query->get();

          }
          $data = $data->paginate(10);
          return view('contacts.results', compact('data'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required',
        'city'=>'required',
        'country'=>'required',
        'job_title'=>'required'
      ]);
      
      $contact = new Contact([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'email' => $request->get('email'),
        'job_title'=> $request->get('job_title'),
        'city'=> $request->get('city'),
        'country'=> $request->get('country'),
        'user_id'=>auth()->user()->id
      ]);
      $contact->save();
      return redirect('/contacts')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contact = Contact::find($id);
      return view('contacts.edit', compact('contact'));
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
      $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required'
      ]);
      $contact = Contact::find($id);
      $contact->first_name = $request->get('first_name');
      $contact->last_name = $request->get('last_name');
      $contact->email = $request->get('email');
      $contact->city= $request->get('city');
      $contact->country= $request->get('country');
      $contact->job_title  = $request->get('job_title');
      // $contact->fill($request->all());
      $contact->save();
      return redirect('/contacts')->with('success', 'Contact saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = Contact::find($id);
      $contact->delete();

      return redirect('/contacts')->with('success', 'Contact deleted!');
    }
}
