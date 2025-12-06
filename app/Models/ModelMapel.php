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

    public function getMapelWithGuru()
    {
        return $this->select('tb_mapel.*, tb_guru.nama_guru')
                    ->join('tb_guru', 'tb_guru.id_guru = tb_mapel.id_guru')
                    ->findAll();
    }

    // Relasi satu data
    public function getDetailGuru($id_guru)
    {
        return $this->select('tb_mapel.*, tb_guru.nama_guru')
                    ->join('tb_guru', 'tb_guru.id_guru = tb_mapel.id_guru')
                    ->where('tb_mapel.id_guru', $id_guru)
                    ->first();
    }

    public function getMapelWithKelas()
    {
        return $this->select('tb_mapel.*, tb_kelas.nama_kelas')
                    ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mapel.id_kelas')
                    ->findAll();
    }

    // Relasi satu data
    public function getDetailKelas($id_kelas)
    {
        return $this->select('tb_mapel.*, tb_kelas.nama_kelas')
                    ->join('tb_kelas', 'tb_kelas.id_kelas = tb_mapel.id_kelas')
                    ->where('tb_mapel.id_kelas', $id_kelas)
                    ->first();
    }
}
