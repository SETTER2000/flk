<?php

/**
 * Class Pagination
 */
class Pagination
{
    private $next = 'NEXT';
    private $prev = 'PREV';
    private $sql;
    private $model;
    private $page;
    private $view;
    private $cur_pg;
    private $max_pages;
    private $lr_page = 2;
    private $in_page = 10;

    public function __construct($page = 'page')
    {

        $this->page = $page;
        $this->view = new View();
        $this->cur_pg = isset($_GET[$this->page]) && (int)$_GET[$this->page] > 0 ? (int)$_GET[$this->page] : 1;
    }

    public function set_in_page($psize)
    {
        $this->in_page = abs((int)$psize);
    }

    private function parse_sql()
    {
        $query = $this->sql;
        if ($this->in_page != 0) {
            $limit = ($this->cur_pg - 1) * $this->in_page;
            $query = preg_replace('/^SELECT\s+/i', 'SELECT SQL_CALC_FOUND_ROWS ', $this->sql) . " LIMIT $limit," . $this->in_page;
        }
        return $query;
    }

    public function load_list()
    {
        if (!isset($this->max_pages)) return '';
        $lnk_list = array();
        $start = $this->cur_pg - $this->lr_page;
        $end = $this->cur_pg + $this->lr_page;
        if ($start < 1) $start = 1;
        if ($end > $this->max_pages) $end = $this->max_pages;
        if ($start > 1) $lnk_list[] = $this->parse_url($start - 1, $start - 2 > 0 ? '...' : '');
        for ($i = $start; $i <= $end; $i++) $lnk_list[] = $this->parse_url($i);
        if ($end + 1 < $this->max_pages) $lnk_list[] = $this->parse_url($end + 1, $end + 2 == $this->max_pages ? '' : '...');
        if ($end + 1 <= $this->max_pages) $lnk_list[] = $this->parse_url($this->max_pages);
        return implode(' ', $lnk_list);
    }

    private function parse_url($page, $text = '')
    {
        if (!$text) $text = $page;
        if ($page != $this->cur_pg) {
            parse_str($_SERVER['QUERY_STRING'], $qstr);
            $qstr[$this->page] = $page;
            return '<a href="?' . http_build_query($qstr) . '" class="next_page">' . $text . '</a>';
        } else {
            return '<span class="current_page">' . $text . '</span>';
        }
    }

    public function show_table_tpl($sql, $tpl, $paging = true)
    {
        $html = '';
        $this->sql = $sql;
        $table = $this->model->query($this->parse_sql());
        $row = mysqli_fetch_row($this->model->query('SELECT FOUND_ROWS()'));
        if ($this->in_page !== 0) $this->max_pages = ceil(array_pop($row) / $this->in_page);
        if ($this->cur_pg > $this->max_pages) {
            $this->cur_pg = $this->max_pages;
        }
        $fields = $table->fetch_fields();
        while ($row = $table->fetch_assoc()) {
            $template = $tpl;
            foreach ($fields as $val) {
                $template = preg_replace('#{' . $val->name . '}#', $row[$val->name], $template);
            }
            $html .= $template;
        }
        if ($paging == true) {
            $html .= isset($this->max_pages) && $this->cur_pg > 1 ? $this->parse_url($this->cur_pg - 1, $this->prev) : '';
            $html .= ' ' . $this->load_list() . ' ';
            $html .= isset($this->max_pages) && $this->cur_pg < $this->max_pages ? $this->parse_url($this->cur_pg + 1, $this->next) : '';
        }
        return $html;
    }
}
