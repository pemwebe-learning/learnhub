<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGuru extends Model
{
    protected $table            = 'tb_guru';
    protected $primaryKey       = 'id_guru';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_guru',
        'email',
        'password',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'foto',
        'created_at'
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
        'nama_guru'    => 'required|min_length[3]|max_length[100]',
        'email'         => 'required|valid_email|',
        'password'      => 'required|min_length[6]|max_length[50]',
        'alamat'        => 'permit_empty|max_length[255]',
        'no_hp'         => 'required|numeric|min_length[10]|max_length[15]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'foto'          => 'permit_empty|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]'
    ];
   protected $validationMessages = [
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
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $beforeInsert   = ['hashPassword'];
    protected $beforeUpdate   = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!empty($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['data']['password']);
        }
        return $data;
    }
}
