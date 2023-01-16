<?php
namespace App\Http\Livewire\Components\Backend;

use Livewire\Component;
use App\Domains\Auth\Models\User;

class Select2User extends Component
{ 
    protected $listeners = [
        'usersSelect'
    ];

    public $user_list = [];
    public $selectedUser;
    public $is_required;
    // public $user_val;

    public function usersSelect($data)
    {
        $this->selectedUser = $data;
        // dd($this->selectedUser);
    }

    public function hydrate()
    {
        $this->emit('loadUserSelect2');
    }

    public function mount()
    {
        $this->user_list = User::where([
            'active' => User::USER_ACTIVE
        ])->get()->toArray();
    }

    public function getUserBy($q)
    {
        $user = User::where('id', 1)->first();
        $get_token = $user->tokens();

        dd($get_token->where('id', 1)->get());

        return $get_token;
    }

    public function render()
    {
        return view('components.backend.select2-user');
    }
}