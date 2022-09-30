<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Help extends BaseModel
{
  use HasFactory;

  // ヘルプテーブル
  protected $table = 'helps';
  protected $fillable =
  [
      'title',
      'content',
      'category',
      'url',
      'publish_date',
      'created_at',
      'updated_at',
  ];
}
