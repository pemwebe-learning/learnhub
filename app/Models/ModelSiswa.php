<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    protected $table            = 'tb_siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_siswa',
        'email',
        'password',
        'alamat',
        'jenis_kelamin',
        'no_hp',
        'foto',
        'created_at',
        'id_kelas'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_siswa'    => 'required|min_length[3]|max_length[100]',
        'email'         => 'required|valid_email|',
        'password'      => 'required|min_length[6]|max_length[50]',
        'alamat'        => 'permit_empty|max_length[255]',
        'no_hp'         => 'required|numeric|min_length[10]|max_length[15]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'id_kelas'         => 'required',
    ];
    protected $validationMessages   = [
        'nama_guru' => [
            'required'   => 'Nama admin wajib diisi.',
            'min_length' => 'Nama admin minimal 3 karakter.',
            'max_length' => 'Nama admin maksimal 100 karakter.',
        ],
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
        ],
        'password' => [
            'required'   => 'Password wajib diisi.',
            'min_length' => 'Password minimal 6 karakter.',
            'max_length' => 'Password maksimal 50 karakter.',
        ],
        'no_hp' => [
            'required'   => 'Nomor HP wajib diisi.',
            'numeric'    => 'Nomor HP harus berupa angka.',
            'min_length' => 'Nomor HP minimal 10 digit.',
            'max_length' => 'Nomor HP maksimal 15 digit.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin wajib dipilih.',
        ],
        'foto' => [
            'is_image' => 'File harus berupa gambar.',
            'mime_in'  => 'Format foto harus JPG atau PNG.',
            'max_size' => 'Ukuran foto maksimal 2MB.',
        ],
         'id_kelas' => [
            'required' => 'kelas tidak boleh kosong',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    protected function hashPassword(array $data)
    {
        if (!empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['data']['password']);
        }
        return $data;
    }

    public function getSiswaWithKelas()
    {
       return $this->select('tb_siswa.*, tb_kelas.nama_kelas')
                    ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas')
                    ->findAll();
    }

    // Relasi satu data
    public function getDetailkelas($id_kelas)
    {
        return $this->select('tb_siswa.*, tb_kelas.nama_kelas')
                    ->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas')
                    ->where('tb_siswa.id_siswa', $id_kelas)
                    ->first();
    }
}
