<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 
     * 
     * 
     *          ADMIN ONLYYYYYYYY
     * 
     * 
     * 
     */

    /**
     * Display a listing of available users.
     */
    public function index()
    {
        $company = Company::all();
        $user = User::all();

        return view('ManageAccountView.admin.usersList', ['company' => $company], ['user' => $user]);
    }

    /**
     * Show the form for creating a new users.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['min:8'],
                'name' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'ic' => ['required', 'string', 'max:12'],
                'phone' => ['required', 'string', 'max:10'],
                'type' => ['required'],
                'staffId' => ['required', 'string', 'max:10'],
                'photo' => ['mimes:png,jpeg,jpg,max:2048'],

            ]
        );

        $filePath = public_path('uploads');
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->ic = $request->ic;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->staffId = $request->staffId;

        // Automatically assign an available companyId
        $companyId = Company::inRandomOrder()->first()->id;
        $user->companyId = $companyId;

        // Insert photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $user->photo = $file_name;
        }

        $result = $user->save();

        return redirect()->route('display.user')->with('success', 'A User Registered Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the user informations.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            abort(404, 'User Not Found');
        }

        return view('ManageAccountView.admin.editUser', ['user' => $user]);
    }

    /**
     * Update the users account
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['min:8'],
        ]);

        // Hash the new password before saving
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('display.user')->with('success', 'User Account Updated Successfully!');
    }

    /**
     * Update User Info
     */
    public function updateUser(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'ic' => ['required', 'string', 'max:12'],
            'phone' => ['required', 'string', 'max:10'],
            'type' => ['required'],
            'staffId' => ['required', 'string', 'max:10'],
            'photo' => ['mimes:png,jpeg,jpg,max:2048'],
        ]);

        $user->name = $request->name;
        $user->address = $request->address;
        $user->ic = $request->ic;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->staffId = $request->staffId;

        $filePath = public_path('uploads');
        // Insert photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);

            //Delete the old photo from storage
            if ($user->photo && file_exists($filePath . '/' . $user->photo)) {
                unlink($filePath . '/' . $user->photo);
            }

            $user->photo = $file_name;
        }

        $user->save();

        return redirect()->route('display.user')->with('success', 'User Information Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id);

        $user->delete();

        return redirect()->route('display.user')->with('destroy', 'A User Deleted Successfully');
    }

    /**
     * Display company profile
     */
    public function displayCompany()
    {
        $company = Company::all();

        return view('ManageAccountView.admin.companyProfile', ['company' => $company]);
    }

    /**
     * Edit Company Info
     */
    public function editCompany(string $id)
    {
        $company = Company::where('id', $id)->first();

        return view('ManageAccountView.admin.editCompany', ['company' => $company]);
    }

    /**
     * Update Company Info
     */
    public function updateCompany(Request $request, string $id)
    {
        $company = Company::where('id', $id)->first();

        $request->validate([
            'companyLogo' => ['mimes:png,jpeg,jpg', 'max:2048'],
            'companyAddress' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'companyEmail' => ['required', 'string', 'email', 'max:255'],
            'companyPhone' => ['required', 'string', 'max:10'],
            'companyType' => ['required', 'string', 'max:255'],
            'registrationNo' => ['required', 'string', 'max:255'],
            'companySsm' => ['mimes:pdf', 'max:2048'],
            'ssmCert' => ['mimes:pdf', 'max:2048'],
        ]);

        // Update the company details
        $company->companyAddress = $request->companyAddress;
        $company->companyName = $request->companyName;
        $company->companyEmail = $request->companyEmail;
        $company->companyPhone = $request->companyPhone;
        $company->companyType = $request->companyType;
        $company->registrationNo = $request->registrationNo;

        // File storage path
        $filePath = public_path('company');

        // Save logo
        if ($request->hasFile('companyLogo')) {
            $file = $request->file('companyLogo');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($filePath, $file_name);

            // Delete the old logo if it exists
            if ($company->companyLogo && file_exists($filePath . '/' . $company->companyLogo)) {
                unlink($filePath . '/' . $company->companyLogo);
            }
            $company->companyLogo = $file_name;
        }

        // Save companySsm
        if ($request->hasFile('companySsm')) {
            $file = $request->file('companySsm');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            // Delete the old companySsm if it exists
            if ($company->companySsm && file_exists($filePath . '/' . $company->companySsm)) {
                unlink($filePath . '/' . $company->companySsm);
            }
            $company->companySsm = $file_name;
        }

        // Save SSM Certification
        if ($request->hasFile('ssmCert')) {
            $file = $request->file('ssmCert');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            // Delete the old ssmCert if it exists
            if ($company->ssmCert && file_exists($filePath . '/' . $company->ssmCert)) {
                unlink($filePath . '/' . $company->ssmCert);
            }
            $company->ssmCert = $file_name;
        }

        $company->save();

        return redirect()->route('display.company')->with('success', 'Company Details Updated Successfully!');
    }



    /**
     * 
     * Display Profile
     */
    public function displayProfileAdmin()
    {
        $user = Auth::user();

        return view('ManageAccountView.admin.userProfile', ['user' => $user]);
    }

    /**
     * Change Password
     * Admin
     */
    public function editPasswordAdmin(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('ManageAccountView.admin.changepassword', ['user' => $user]);
    }

    /**
     * Update Password
     * Admin
     */
    public function updatePasswordAdmin(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['min:8'],
            'current_password' => ['required'],
        ]);

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            // Redirect back with an error message if passwords don't match
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        // Hash the new password and update it in the database
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('display.profile.admin')->with('success', 'Password changed successfully!');
    }



    /**
     * 
     * 
     * 
     *          OWNER ONLYYYYYYYY
     * 
     * 
     * 
     */

    /**
     * display owner profile
     */
    public function displayProfileOwner()
    {
        $user = Auth::user();

        return view('ManageAccountView.owner.userProfile', ['user' => $user]);
    }

    /**
     * Display change password form
     */
    public function editPasswordOwner(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('ManageAccountView.owner.changePassword', ['user' => $user]);
    }

    /**
     * Update change password
     */
    public function updatePasswordOwner(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['min:8'],
            'current_password' => ['required'],
        ]);

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            // Redirect back with an error message if passwords don't match
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        // Hash the new password and update it in the database
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('display.profile.owner')->with('success', 'Password changed successfully!');
    }

    /**
     * Display company profile
     * owner
     */
    public function displayCompanyOwner()
    {
        $company = Company::all();

        return view('ManageAccountView.owner.companyProfile', ['company' => $company]);
    }






    /**
     * 
     * 
     * 
     *          STAFF ONLYYYYYYYY
     * 
     * 
     * 
     */

    /**
     * Display profile staff
     */
    public function displayProfileStaff()
    {
        $user = Auth::user();

        return view('ManageAccountView.staff.userProfile',['user'=>$user]);
    }   

    /**
     * Display edit password form
     */
    public function editPasswordStaff(string $id)
    {
        $user = User::where('id', $id)->first();

        return view('ManageAccountView.staff.changePassword', ['user'=>$user]);
    }
    
    /**
     * Update Password
     */
    public function updatePasswordStaff(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        $request->validate([
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['min:8'],
            'current_password' => ['required'],
        ]);

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            // Redirect back with an error message if passwords don't match
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        // Hash the new password and update it in the database
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('display.profile.staff')->with('success', 'Password changed successfully!');
    }

    /**
     * Display company profile
     */
    public function displayCompanyStaff()
    {
        $company = Company::all();

        return view('ManageAccountView.staff.companyProfile', ['company' => $company]);
    }
}
