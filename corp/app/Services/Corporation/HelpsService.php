<?php
namespace App\Services\Corporation;

use App\Services\Common\BaseService;
use App\Models\Help;

class HelpsService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Help);
    }
    
    public function findBy($data = [], $options = []) {
        $entity = $this->entity;

        if(!empty($data['search_param'])) {
            
            $entity = $entity->where('title', 'like', $data['search_param'].'%')
                            ->orWhere('content', 'like', $data['search_param'].'%');

        }

        return $entity;
    }
}