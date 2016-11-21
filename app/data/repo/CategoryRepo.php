<?php
namespace Thue\Data\Repo;

use Thue\Data\Model\M_Category;

class CategoryRepo extends M_Category
{
    public function getList($params)
    {
        $b = M_Category::getModelsManager()->createBuilder();

        $b->columns(array('c1.*'));
        $b->from(array('c1' => '\Thue\Data\Model\M_Category'));

        $b->where('1 = 1');

        if (isset($params['conditions']['category_id'])) {
            $b->andWhere('c1.category_id = :category_id:', array('category_id' => $params['conditions']['category_id']));
        }

        if (isset($params['conditions']['parent_id'])) {
            $b->andWhere('c1.parent_id = :parent_id:', array('parent_id' => $params['conditions']['parent_id']));
        }

        if (isset($params['conditions']['name_vi'])) {
            $b->andWhere('c1.name_vi LIKE :name_vi:', array('name_vi' => '%' . $params['conditions']['name_vi'] . '%'));
        }

        if (isset($params['conditions']['type'])) {
            $b->andWhere('c1.type = :type:', array('type' => $params['conditions']['type']));
        }

        if (isset($params['conditions']['ordering'])) {
            $b->andWhere('c1.ordering = :ordering:', array('ordering' => $params['conditions']['ordering']));
        }

        if (isset($params['conditions']['status'])) {
            $b->andWhere('c1.status = :status:', array('status' => $params['conditions']['status']));
        }

        if (isset($params['order'])) {
            $b->orderBy($params['order']);
        } else {
            $b->orderBy('c1.category_id DESC');
        }

        return $b->getQuery()->execute();
    }

    public function getPaginationList($params)
    {
        if (!isset($params['page'])) {
            $params['page'] = 1;
        }

        if (!isset($params['limit'])) {
            $params['limit'] = 10;
        }

        $b = M_Category::getModelsManager()->createBuilder();

        $b->columns(array('c1.*'));
        $b->from(array('c1' => '\Thue\Data\Model\M_Category'));

        $b->where('1 = 1');

        if (isset($params['conditions']['category_id'])) {
            $b->andWhere('c1.category_id = :category_id:', array('category_id' => $params['conditions']['category_id']));
        }

        if (isset($params['conditions']['name_vi'])) {
            $b->andWhere('c1.name_vi LIKE :name_vi:', array('name_vi' => '%' . $params['conditions']['name_vi'] . '%'));
        }

        if (isset($params['conditions']['type'])) {
            $b->andWhere('c1.type = :type:', array('type' => $params['conditions']['type']));
        }

        if (isset($params['conditions']['ordering'])) {
            $b->andWhere('c1.ordering = :ordering:', array('ordering' => $params['conditions']['ordering']));
        }

        if (isset($params['conditions']['status'])) {
            $b->andWhere('c1.status = :status:', array('status' => $params['conditions']['status']));
        }

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
