<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCuti extends Model
{
    use HasFactory;
    protected $table= "formcuti";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nama','jabatan','divisi','tgl_mulai','tgl_selesai','lama','alasan','status','status_kepalaruang','status_manajer','status_hrd','status_direktur'
    ];

}

