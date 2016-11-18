<?php
namespace Thue\Data\Repo;

use Thue\Data\Model\M_Category;

class CategoryRepo extends M_Category
{
    public function getPaginationList($params)
    {
        if (!isset($params['page'])) {
            $params['page'] = 1;
        }

        if (!isset($params['limit'])) {
            $params['limit'] = 20;
        }

        $b = M_Category::getModelsManager()->createBuilder();

        $b->columns(array('c1.*'));
        $b->from(array('c1' => '\Thue\Data\Model\M_Category'));

        if (isset($params['order'])) {
            $b->orderBy($params['order']);
        } else {
            $b->orderBy('c1.category_id DESC');
        }

        $paginator = new \Phalcon\Paginator\Adapter\QueryBuilder(array(
            'builder' => $b,
            'page'    => $params['page'],
            'limit'   => $params['limit']
        ));
        return $paginator->getPaginate();
    }
}
