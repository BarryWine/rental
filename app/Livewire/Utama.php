<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Rental;
use Livewire\Component;

class Utama extends Component
{
    use LivewireAlert;
    public $nama, $harga, $status;
    public function simpan(){
        $simpan = new Rental();
        $simpan->nama = $this->nama;
        $simpan->harga = $this->harga;
        $simpan->status = 'belum';
        $simpan->save();
        $this->alert('success', 'Berhasil');
    }
    public function gantistatus($jenis, $idbarang){
        $gantistatus = Rental::find($idbarang);
        $gantistatus->status = $jenis;
        $gantistatus->save();
        $this->alert('info', 'Diganti');
    }
    public function hapus($idbarang){
        $hapus = Rental::find($idbarang)->delete();
        $this->alert('warning', 'Dihapus');
    }
    public function render()
    {
        return view('livewire.utama')->with([
            'barangs' => Rental::all(),
            'selesai' => Rental::where('status', 'selesai')->sum('harga'),
            'proses' => Rental::where('status', 'proses')->sum('harga'),
            'belum' => Rental::where('status', 'belum')->sum('harga'),
        ]);
    }
}
