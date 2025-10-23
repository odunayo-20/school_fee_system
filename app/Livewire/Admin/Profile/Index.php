<?php

namespace App\Livewire\Admin\Profile;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    public $firstname, $lastname, $email, $phone, $image, $username, $old_image;
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
        'username' => 'required|string|max:255|unique:admins,username,' . $this->admin->id,
        'email' => 'required|email|max:255|unique:admins,email,' . $this->admin->id,
        'phone' => 'required|string|max:20',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    if (!empty($this->image) && gettype($this->image) !== 'string') {
        $this->validate([
            'image' => 'nullable|image|max:1024', // 1MB Max
        ]);

        // Delete old image if it exists
        if (!empty($this->old_image) && Storage::disk('public')->exists($this->old_image)) {
            Storage::disk('public')->delete($this->old_image);
        }

        // Save new image
        $imageFile = $this->image->store('admins', 'public');
    } else {
        // Keep old image
        $imageFile = $this->old_image;
    }

    $this->admin->update([
        'firstname' => $this->firstname,
        'lastname' => $this->lastname,
        'username' => $this->username,
        'email' => $this->email,
        'phone' => $this->phone,
        'image' => $imageFile,
        'password' => Hash::make($this->password),
    ]);

    session()->flash('success', 'Profile updated successfully!');
}

    public function render()
    {
        return view('livewire.admin.profile.index');
    }
}
