<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Warga;

class Wargas extends Component
{
    public $wargas, $nama, $NIK, $warga_id;
    public $isModal = false;
    public function render()
    {
        $this->wargas = Warga::orderBy('created_at', 'DESC')->get();
        return view('livewire.wargas');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function resetFields(){
        $this->warga_id = '';
        $this->nama = '';
        $this->NIK = '';
    }

    public function openModal(){
        $this->isModal = true;
    }

    public function closeModal(){
        $this->isModal = false;
    }

    public function store()
    {
        $this->validate(['nama'=> 'required|string','NIK'=> 'required|numeric']);
        Warga::updateOrcreate(['id' =>$this->warga_id],['nama' => $this->nama,'NIK' => $this->NIK,]);

        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id){
        $warga = Warga::find($id);
        $this->warga_id = $warga->id;
        $this->nama = $warga->nama;
        $this->NIK = $warga->NIK;
        $this->openModal();
    }

    public function delete($id){
        $warga = Warga::find($id);
        $warga->delete();
    }

}
