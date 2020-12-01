<?php

namespace app\Http\Livewire;

use Livewire\Component;
use Hash;
use App\Models\User;
use App\Models\AuthUser;
use DB;
use Illuminate\Http\Request;
use Session;

class LoginRegister extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;

    public function render(Request $request)
    {
            return view('livewire.login-register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login(Request $request)
    {
        if($request->session()->has('my_name'))  { 
            $request->session()->forget('my_name');
            // echo "Data has been removed from session.";
            return view('livewire.home')->with('success_msg', 'You have logged out!');
        }
        else{
            $validatedDate = $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            
            if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                    //session()->flash('message', "You are Login successful.");
                    $request->session()->put('my_name',$this->email);
                    return redirect('list');
            }else{
                session()->flash('error', 'Invalid Email and / or Password!!!');
            }
        }
    }

    

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password); 
  
        User::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);
    
        session()->flash('message', 'Your register successfully Go to the login page.');
        
        $this->resetInputFields();

    }
}
?>