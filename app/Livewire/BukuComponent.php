<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BukuComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = "bootstrap";
    public $kategori, $judul, $penulis, $penerbit, $isbn, $tahun, $jumlah, $cari;
    public function render()
    {
        if ($this->cari!= '') {
            $data['buku'] = Buku::where('judul','like','%' . $this->cari .'%')->paginate(10);
        } else {
        $data['buku'] = Buku::paginate(10);
        }
        $data['category'] = Kategori::all();
        $layout['title'] = 'Kelola Buku';

        return view('livewire.buku-component', $data)->layoutData($layout);
    }
    public function store(){
        $this->validate([
            'judul' =>'required',
            'kategori' =>'required',
            'penulis' =>'required',
            'penerbit' =>'required',
            'tahun' =>'required',
            'isbn' =>'required',
            'jumlah' =>'required',

        ],[
            'judul.required'=> 'Judul Buku tidak boleh kosong!',
            'kategori.required'=> 'Kategori tidak boleh kosong!',
            'penulis.required'=> 'Penulis tidak boleh kosong!',
            'penerbit.required'=> 'Penerbit tidak boleh kosong!',
            'tahun.required'=> 'Tahun tidak boleh kosong!',
            'isbn.required'=> 'ISBN tidak boleh kosong!',
            'jumlah.required'=> 'Jumlah tidak boleh kosong!',
        ]);

        Buku::create([
            'judul' =>$this->judul,
            'kategori_id' =>$this->kategori,
            'penulis' =>$this->penulis,
            'penerbit' =>$this->penerbit,
            'tahun'=>$this->tahun,
            'isbn' =>$this->isbn,
            'jumlah' =>$this->jumlah
        ]);
        $this->reset();
        session()->flash('success','Berhasil Simpan!');
        return redirect()->route('buku');
    }
}
