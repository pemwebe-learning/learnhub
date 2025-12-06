<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table            = 'tb_pengumuman';
    protected $primaryKey       = 'id_pengumuman';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul_pengumuman',
        'isi'
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
        'judul_pengumuman' => ['required'],
        'isi' => ['required']
    ];
    protected $validationMessages   = [
        'judul_pengumuman' => [
            'required' => 'Judul Harus Diisi',
            'min_length' => 'minimal judul 5 huruf',
            'max_length' => 'maximal judul 100 huruf'
        ],
        'isi' => [
            'required' => 'harus diisi',
            'min_length' => 'minimal berisi 10 huruf',
            'max_length' => 'maximal 500 kata'
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

    public function getMapelWithKelas()
    {
        return $this->select('tb_kelas.*, tb_tingkat.tingkat')
                    ->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
                    ->findAll();
    }

    // Relasi satu data
    public function getDetailTingkat($id)
    {
        return $this->select('tb_kelas.*, tb_tingkat.tingkat')
                    ->join('tb_tingkat', 'tb_tingkat.id_tingkat = tb_kelas.id_tingkat')
                    ->where('tb_kelas.id_kelas', $id)
                    ->first();
    }
}
