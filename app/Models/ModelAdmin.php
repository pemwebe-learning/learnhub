<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table            = 'tb_admin';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_admin',
        'email',
        'password',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'foto',
        'created_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nama_admin'    => 'required|min_length[3]|max_length[100]',
        'email'         => 'required|valid_email|is_unique[tb_admin.email]',
        'password'      => 'required|min_length[6]|max_length[50]',
        'alamat'        => 'permit_empty|max_length[255]',
        'no_hp'         => 'required|numeric|min_length[10]|max_length[15]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
    ];

    protected $validationMessages = [
        'nama_admin' => [
            'required'   => 'Nama admin wajib diisi.',
            'min_length' => 'Nama admin minimal 3 karakter.',
            'max_length' => 'Nama admin maksimal 100 karakter.',
        ],
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique'   => 'Email sudah digunakan.',
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
        'alamat' => [
            'max_length' => 'Alamat tidak boleh lebih dari 255 karakter.'
        ]
    ];
     protected $skipValidation       = false;

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
