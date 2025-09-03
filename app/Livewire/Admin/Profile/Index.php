<?php

namespace App\Livewire\Admin\Profile;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithFileUploads;
    public $firstname, $lastname, $email, $phone, $image, $username;
    public $admin;
    public $password, $password_confirmation;
    public $showPassword = false;
    public $status;
    public function mount()
    {
        $this->admin = Auth::guard('admin')->user();
        $this->firstname = $this->admin->firstname ?? '';
        $this->lastname = $this->admin->lastname ?? '';
        $this->username = $this->admin->username ?? '';
        $this->email = $this->admin->email ?? '';
        $this->phone = $this->admin->phone ?? '';
        $this->image = $this->admin->image;


    }

    public function updateProfile()
    {
        $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,'. $this->admin->id,
            'email' => 'required|email|max:255|unique:admins,email,' . $this->admin->id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        if ($this->image && gettype($this->image) != 'string') {
            $this->validate([
                 'image' => 'nullable|file|max:255',
            ]);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('admins', $imageName, 'public');
            $imageFile = 'admins/' . $imageName;
        } else {
            $imageFile = $this->admin->image; // Retain the old image if no new image is uploaded
        }


    // dd($data);
        $this->admin->update([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $imageFile,
            'password' => $this->password ? bcrypt($this->password) : $this->admin->password,
        ]);

        session()->flash('success', 'Profile updated successfully!');
        // $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.admin.profile.index');
    }
}
