<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ClaimMessageController;
use App\Claim;
use App\Subject;
use App\Partner;
use App\ClaimMessage;
use Illuminate\Http\Request;
Use Auth;

class ClaimController extends Controller
{
    /**
     * Create a new partner controller instance.
     * Call te auth middleware and pecify the partner guard.
     *
     * @return void
     */
   
    public function __construct()
    {
         $this->middleware('auth:partner,staff');
    }

      public function validateClaim(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
    }
    /**
     * Display a list of partner's claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        $data['partner'] = Partner::where('name',$partner)->firstOrFail();
        $data['claims']=$data['partner']->claims;
        return view('claims.backoffice.partner.index',$data);  
    }
    /**
     * Display a list of all claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        
        $data['claims']=Claim::all();
        return view('claims.backoffice.staff.index',$data);  
    }
    /**
     * Display a list of open claims.
     *
     * @return \Illuminate\Http\Response
     */

    public function open()
    {
        
        $data['claims']=Claim::where('status',true)->get();
        return view('claims.backoffice.staff.index',$data);  
    }

    /**
     * Display a list of close claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {
        
        $data['claims']=Claim::where('status',false)->get();
        return view('claims.backoffice.staff.index',$data);  
    }
    /**
     * Display a list of related claims.
     *
     * @return \Illuminate\Http\Response
     */
    public function related()
    {
        
        $data['claims']=Auth::guard('staff')->user()->claims;
        return view('claims.backoffice.staff.index',$data);  
    }

    /**
     * Show the form for creating a new claim for the authenticated partner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //isset($request->partner) ? $partner = $request->partner : $partner = Auth::guard('partner')->user()->name;
        //$data['partner'] = Partner::where('name',$partner)->firstOrFail();
        $data['subjects']=Subject::all();
        //$data['Subject']=Subject::where('name',$subject)->firstOrFail();
        return view('claims.backoffice.staff.create',$data); 
    }

    /**
     * Store a newly created claim.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateClaim($request);
        return $request;

        $user = $this->userType();
        $complainer=auth()->guard($user)->user();
        
        $claim = new Claim();
        
        $claim->title = $request->title;
        $claim->status = true;
        $claim->subject_id = $request->subject_id;
        $claim->staff_id = 1;
        $claim->claimable_type = $user;
        $claim->claimable_id = $complainer->id;
        $claim->save();
        
        $message = new ClaimMessage();
        
        $message->message = $request->message;
        $message->status = true;
        $message->claim_id = $claim->id;
        $message->claim_messageable_type = $user;
        $message->claim_messageable_id = $complainer->id;

        $message->save();
        return redirect('support');
         
    }

  

    public function userType()
    {
        $profiles= [ 'partner', 'staff'];
        for($i=0; $i<2; $i++)
        {
            if(auth()->guard($profiles[$i])->check())
            {
                break;
            }
        }
        return $profiles[$i];
    }


    /**
     * Display the claim along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $claim=Claim::where('id', $id)->first();
        return  view('claims.backoffice.staff.show', [
            'claim' => $claim,
        ]);
    }
    /**
     * Display the claim along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function close($id)
    {
        
        $claim=Claim::where('id', $id)->first();
        $claim->status = 0;
        $claim->save();
        return redirect()->back();
    }

    /**
     * Save the message and attache it to the claim.
     * Return the claim page along with it messages.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function saveReply(Request $request)
    {
        $this->validateMessage($request);
        $userType = $this->userType();
        $user = auth()->guard($user)->user();
        $claim_id = $request->input('claim_id');
        $message = $request->input('message');
        $claim_message=ClaimMessage::create([
            'message' => $message,
            'status' => true,
            'claim_messageable_type' => $userType,
            'claim_messageable_id' => $user->id,
            'claim_id' => $claim_id,
        ]);
        return redirect('/support/ticket/'.$claim_id);   
    }

    public function validateMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
    }
    
    public function destroy( $id)
    {
        $claim = Claim::findOrFail($id);
        $claim->delete();
        return redirect('support/ticket');
    }

    public function changeStatus($id)
    {
        $claim=Claim::where('id', $id)->firstOrFail();
        $claim->status=false;
        $claim->update();
        return back()->with('claim', $claim);
    }

}
