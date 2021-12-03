<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Citizen;
class Citizens extends Component
{
    public $citizens, $nama, $email, $NIK, $nomor_hp, $status, $citizen_id;
    public $isModal = 0;
    
    public function render()
    {
        $this->citizens = Citizen::orderBy('created_at','DESC')->get();
        return view('livewire.citizens');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModal = 1;
    }

    public function closeModal()
    {
        $this->isModal = 0;
    }

    public function resetFields(){
        $this->nama = '';
        $this->email = '';
        $this->NIK = '';
        $this->nomor_hp = '';
        $this->status = '';
        $this->citizen_id = '';
    }

    public function store(){
        $this->validate([
            'nama' => 'required | string',
            'NIK' => 'required | numeric',
        ]);

        Citizen::updateOrCreate(['id' => $this->citizen_id], [
            'nama' => $this->nama ,
            'email' => $this->email ,
            'NIK' => $this->NIK ,
            'nomor_hp' => $this->nomor_hp ,
            'status' => $this->status ,
        ]);
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id){
        $citizen = Citizen::find($id);

        $this->citizen_id = $id;
        $this->nama = $citizen->nama;
        $this->email = $citizen->email;
        $this->NIK = $citizen->NIK;
        $this->nomor_hp = $citizen->nomor_hp;
        $this->status = $citizen->status;

        $this->openModal();
    }

    public function delete($id){
        $citizen = Citizen::find($id);
        $citizen->delete();
    }
}
