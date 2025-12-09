<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\ModelMateri;
use App\Models\ModelMapel;

class MateriController extends BaseController
{
    protected $ModelMateri;
    protected $ModelMapel;

    public function __construct()
    {
        $this->ModelMateri = new ModelMateri();
        $this->ModelMapel = new ModelMapel();
    }

    // LIST
    public function index($id_mapel)
    {
        $data = [
            'judul' => 'Materi Mapel',
            'menu' => 'materi',
            'page' => 'dashboard_guru/materi/v_index',
            'mapel' => $this->ModelMapel->find($id_mapel),
            'materi' => $this->ModelMateri->getMateriByMapel($id_mapel),
        ];
        return view('v_template_guru', $data);
    }

    // FORM TAMBAH
    public function input($id_mapel)
    {
        $data = [
            'judul' => 'Tambah Materi',
            'menu' => 'materi',
            'page' => 'dashboard_guru/materi/v_input',
            'mapel' => $this->ModelMapel->find($id_mapel),
        ];
        return view('v_template_guru', $data);
    }


    public function InsertData()
    {
        $data = [
            'judul_materi' => $this->request->getPost('judul_materi'),
            'link_materi'  => $this->request->getPost('link_materi'),
            'id_mapel'     => $this->request->getPost('id_mapel'),
        ];

        // Gunakan VALIDASI dari ModelMateri
        if (!$this->ModelMateri->validate($data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->ModelMateri->errors());
        }

        $this->ModelMateri->save($data);

        return redirect()->to('guru/materi/' . $data['id_mapel'])
                        ->with('success', 'Materi berhasil ditambahkan!');
    }


    // FORM EDIT
    public function edit($id_mapel, $id_materi)
    {
        $data = [
            'judul' => 'Edit Materi',
            'menu' => 'materi',
            'page' => 'dashboard_guru/materi/v_edit',
            'mapel' => $this->ModelMapel->find($id_mapel),
            'materi' => $this->ModelMateri->find($id_materi),
        ];
        return view('v_template_guru', $data);
    }

    // PROSES UPDATE
    public function UpdateData($id_materi)
    {
        $data = [
            'id_materi'    => $id_materi,
            'judul_materi' => $this->request->getPost('judul_materi'),
            'link_materi'  => $this->request->getPost('link_materi'),
            'id_mapel'     => $this->request->getPost('id_mapel'),
        ];

        if (!$this->ModelMateri->validate($data)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->ModelMateri->errors());
        }

        $this->ModelMateri->save($data);

        return redirect()->to('guru/materi/' . $data['id_mapel'])
                        ->with('success', 'Materi berhasil diperbarui!');
    }

    // DELETE
    public function DeleteData($id_mapel, $id_materi)
    {
        $this->ModelMateri->delete($id_materi);

        return redirect()->to('guru/materi/' . $id_mapel)
                         ->with('success', 'Materi berhasil dihapus!');
    }
}
