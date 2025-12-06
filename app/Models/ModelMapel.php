<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMapel extends Model
{
    protected $table            = 'tb_mapel';
    protected $primaryKey       = 'id_mapel';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_mapel',
        'id_kelas',
        'id_guru'
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
        'nama_mapel' => ['required'],
        'id_kelas' => ['required'],
        'id_guru' => ['required']
    ];
    protected $validationMessages   = [
        'nama_mapel' => [
            'required' => 'Harus isi mapel'
        ],
        'id_kelas' => [
            'required' => 'Harus Isi Kelas'
        ],
        'id_guru' => [
            'required' => 'Harus Isi Guru'
        ]
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
}
