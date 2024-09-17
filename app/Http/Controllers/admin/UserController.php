<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agentcommission;
use App\Models\Booking;
use App\Models\Installment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return \view('admin.user.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // return $credentials;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->with('Success', 'You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
        // return $request;
    }
    public function forgotpassword()
    {
        return \view('admin.user.forgotpassword');
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.user.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::broker('users')->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', __($response));
        }

        return back()->withErrors(['email' => __($response)]);
    }
    public function reset(Request $request)
    {
        // Validate the request data
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Password reset
        $status = Password::broker('users')->reset(
            $this->credentials($request),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        // If password reset was successful, redirect to login page with a success message
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('admin.login')->with('status', 'Password reset successful! Please log in with your new password.');
        }

        // If password reset failed, redirect back with an error message
        return back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }

    protected function credentials(Request $request)
    {
        // Return an array of credentials based on the request input
        return $request->only('email', 'password', 'password_confirmation', 'token');
    }


    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }
    public function validationErrorMessages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            // Add more custom error messages as needed
        ];
    }


    public function dashboard(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $bookingQuery = Booking::whereHas('user', function ($query) use ($user_id) {
                $query->where('id', $user_id)
                    ->whereNotNull('agent_commisson');
            });
            $selectedProjectId = $request->input('project_id');
            $project_id = $request->input('project_id');


            if ($project_id !== null && $project_id !== 'All') { // Check if project ID is provided and not 'All'
                $bookingQuery->whereHas('plot.sector.project', function ($query) use ($project_id) {
                    $query->where('id', $project_id);
                });
            }

            $booking = $bookingQuery->get();

            $project = Project::all();
            $projects = Project::count();
            $bookings = Booking::count();
            $agents = User::where('usertype', 'agent')->count();
            return view('admin.user.dashboard', compact('projects', 'bookings', 'agents', 'booking', 'project', 'selectedProjectId'));
        }

        return redirect()->route('admin.login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function adduser()
    {
        return \view('admin.user.adduser');
    }
    public function createuser(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z\s]+$/|max:255',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'agentcode' => 'required',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'alternatemobile' => ['nullable', 'regex:/^[0-9]{10}$/'],
            'doctype' => 'required',
            'docnumber' => 'required',
            'usertype' => 'required'
        ]);

        $input = ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'agentcode' => $request->agentcode,
            'mobile' => $request->mobile,
            'alternatemobile' => $request->alternatemobile,
            'doctype' => $request->doctype,
            'docnumber' => $request->docnumber,
            'address' => $request->address,
            'usertype' => $request->usertype
        ]);


        User::create($input);

        return \redirect()->route('admin.user.index')
            ->with('success', 'Agent Added Successfully');
    }
    public function edituser(Request $request, $id)
    {
        $user = User::find($id);
        return \view('admin.user.edituser', \compact('user'));
    }

    public function updateuser(Request $request, User $user)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'agentcode' => 'required',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'alternatemobile' => ['nullable', 'regex:/^[0-9]{10}$/'],
            // 'profilepic' => 'required',
            'doctype' => 'required',
            'docnumber' => 'required',
            'usertype' => 'required'

        ]);

        // $input = $request->all();
        $input = ([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'agentcode' => $request->agentcode,
            'mobile' => $request->mobile,
            'alternatemobile' => $request->alternatemobile,
            // 'profilepic' => $request->profilepic,
            'doctype' => $request->doctype,
            'docnumber' => $request->docnumber,
            'address' => $request->address,
            'usertype' => $request->usertype
        ]);

        $user->update($input);
        return \redirect()->route('admin.user.index')
            ->with('Success', 'Agent Updated Successfully');
    }
    public function changepassword(Request $request, $id)
    {
        $user = User::find($id);
        return view('admin.user.changepassword', \compact('user'));
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'old_password'     => 'required',
            'password'     => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);

        if (!Hash::check($data['old_password'], $user->password)) {

            return back()->with('error', 'You have entered wrong Current password');
        } else {
            $user->update(['password' => Hash::make($request->password)]);
            return  redirect()->route('admin.dashboard')->with('Success', 'Password Updated Successfully');
        }
    }
    public function trashdata()
    {
        $users = User::onlyTrashed()
            ->get();
        return view('admin.user.trash', compact('users'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete(); // Soft delete the user
            return redirect()->back()->with('Success', 'Agent deleted successfully');
        }
        return redirect()->back()->with('Success', 'User not found');
    }
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user) {
            $user->restore(); // Soft delete the user
            return redirect()->back()->with('Success', 'Agent restored successfully');
        }
        return redirect()->back()->with('Success', 'User not found');
    }
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user) {
            $user->forceDelete(); // Soft delete the user
            return redirect()->back()->with('Success', 'Agent permanently delete successfully');
        }
        return redirect()->back()->with('Success', 'User not found');
    }
    public function index()
    {
        $users = User::where('usertype', 'Agent')
            ->whereNull('status')
            ->get();
        return \view('admin.user.viewuser', \compact('users'));
    }
    public function agentbookings()
    {
        $bookings = Booking::where('agent_commisson', \null)->get();
        return view('admin.user.agentbookings', \compact('bookings'));
    }


    public function commissionupdate(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'agent_commisson' => 'required|numeric', // Adjust validation rules as needed
        ]);

        // Retrieve the Booking model instance by its ID
        $booking = Booking::findOrFail($id);

        // Update the agent_commisson field with the new value
        $booking->update([
            'agent_commisson' => $request->input('agent_commisson'),
        ]);

        // Optionally, you can redirect back to a specific route or return a response
        return redirect()->route('admin.user.agentbookings')
            ->with('success', 'Agent commission updated successfully');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return \redirect()->route('admin.login')->with('Success', 'Logged Out Successfully');
    }

    public function agentcommission($id)
    {
        // Fetching installments where the associated booking's plot's sector's project matches the given $id and has a status of 'Paid'
        $agentcommissions = Agentcommission::whereHas('installment.booking.plot.sector.project', function ($query) use ($id) {
            $query->where('id', $id);
        })->with('installment.booking.plot.sector.project')
            ->where('agent_commission', '!=', '0')->get(); // or use first() if you're expecting only one booking

        return view('admin.user.agentcomission', compact('agentcommissions'));
    }


    public function editagentcommission($id)
    {
        $agentcommissions = Agentcommission::find($id);
        return \view('admin.user.editagentcommission', \compact('agentcommissions'));
    }
}
