<?php
namespace Thue\Admin\Component;

use Phalcon\Mvc\User\Component;

class ElementComponent extends Component
{
    public function pagination($theme, $options)
    {
        $url = $options['url'];
        $query = $options['query'];
        $page = $options['page'];
        $total_pages = $options['total_pages'];
        $pages_display = isset($options['pages_display']) ? $options['pages_display'] : 3;

        $url = $options['url'] . '?' . http_build_query($query);
        $paging = '';

        if ($total_pages > 1) {
            $active_page = !$page ? 1 : $page;

            if ($total_pages > $pages_display) {
                $min = 1;
                $max = $active_page + $pages_display;

                if ($active_page < $pages_display) {
                    $min = 1;

                    $max = $max < $total_pages ? $max : $total_pages;
                } elseif ($active_page >= $pages_display) {
                    $min = $active_page - $pages_display;
                    if ($min <= 0) {
                        $min = 1;
                    }

                    $max = $max < $total_pages ? $max : $total_pages;

                    if ($total_pages > 10 && ($total_pages - $active_page) < $pages_display) {
                        $min = $min - ($pages_display - ($total_pages - $active_page));
                    }
                }

                for ($i = $min; $i <= $max; $i++) {
                    $query['page'] = $i;
                    $url = $options['url'] . '?' . http_build_query($query);
                    $paging .= ($i == $active_page) ? '<li><a class="active">' . $i . '</a></li>' : '<li><a href="'. $url .'">' . $i . '</a></li>';
                }
            } else {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $query['page'] = $i;
                    $url = $options['url'] . '?' . http_build_query($query);
                    $paging .= ($i == $active_page) ? '<li><a class="active">' . $i . '</a></li>' : '<li><a href="' . $url . '">' . $i . '</a></li>';
                }
            }

            if ($active_page > 1) {
                $query['page'] = $active_page - 1;
                $url = $options['url'] . '?' . http_build_query($query);
                $paging = '<li><a href="' . $url .'"><span class="fa fa-angle-left"></a></li>' . $paging;
            }

            if ($active_page < $total_pages) {
                $query['page'] = $active_page + 1;
                $url = $options['url'] . '?' . http_build_query($query);
                $paging .= '<li><a href="'. $url .'"><span class="fa fa-angle-right"></a></li>';

                $query['page'] = $total_pages;
                $url = $options['url'] . '?' . http_build_query($query);
                $paging .= '<li><a href="'. $url .'"><span class="fa fa-angle-double-right"></span></a></li>';
            }

            $query['page'] = 1;
            $url = $options['url'] . '?' . http_build_query($query);
            $paging = '<li><a href="' . $url . '"><span class="fa fa-angle-double-left"></span></a></li>' . $paging;
        }

        $this->view->start();
        $this->view->setVars(array(
            'total_pages' => $total_pages,
            'paging'      => $paging
        ));
        $this->view->render($theme . '/component/element/', 'pagination');
        $this->view->finish();

        return $this->view->getContent();
    }
}
