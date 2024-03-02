<?php

namespace App\Controllers;

use App\Models\ProductModel;

class User extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        $perPage = 2;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $data['products'] = $model->findAll($perPage, ($currentPage - 1) * $perPage);
        $data['totalRows'] = $model->countAllResults();
        $data['perPage'] = $perPage;
        $data['currentPage'] = $currentPage;

        return view('/users/user_page', $data);
    }
    public function search_product()
    {
        // เชื่อมต่อกับฐานข้อมูล
        $model = new ProductModel();

        $perPage = 2;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        // รับคำค้นหาจาก URL หรือพารามิเตอร์ใด ๆ ที่ชื่อ 'q'
        $keyword = $this->request->getGet('search');

        // ค้นหาสินค้าจากฐานข้อมูล
        //$data_search['products_search'] = $model->like('pd_name', $keyword)->findAll();
        $data_search['products_search'] = $model->like('pd_name', $keyword)->findAll($perPage, ($currentPage - 1) * $perPage);
        $data_search['totalRows'] = $model->like('pd_name', $keyword)->countAllResults();
        $data_search['perPage'] = $perPage;
        $data_search['currentPage'] = $currentPage;
        $data_search['searchTerm'] = $keyword;
        // แสดงผลลัพธ์ใน view
        return view('/users/search_products', $data_search);
    }
}
