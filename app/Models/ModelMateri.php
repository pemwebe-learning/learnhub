<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMateri extends Model
{
    protected $table            = 'tb_materi';
    protected $primaryKey       = 'id_materi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
    'judul_materi' => 'nama_materi',
    'link_materi' => 'link_materi',
    'id_mapel' => 'id_mapel'
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
        'judul_materi' => ['required'],
        'link_materi' => ['required'],
        'id_mapel' => ['required']
    ];
    protected $validationMessages   = [
        'judul_materi' => [
            'required' => 'Harus isi judul materi'
        ],
        'link_materi' => [
            'required' => 'Harus Isi link materi'
        ],
        'id_mapel' => [
            'required' => 'Harus Isi mapel'
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
   
    public function getMateriWithMapel()
    {
        return $this->select('tb_materi.*, tb_mapel.nama_mapel')
                    ->join('tb_mapel', 'tb_mapel.id_mapel = tb_materi.id_mapel')
                    ->findAll();
    }

    // Relasi satu data
    public function getDetailMapel($id_mapel)
    {
        return $this->select('tb_materi.*, tb_mapel.nama_mapel')
                    ->join('tb_mapel', 'tb_mapel.id_mapel = tb_materi.id_mapel')
                    ->where('tb_materi.id_mapel', $id_mapel)
                    ->first();
    }
}
