<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    //show list product page
    public function show_list_product()
    {
        $model = new ProductModel();
        $data['products'] = $model->orderBy('pd_id', 'DESC')->findAll();
        return view('/products/product_list', $data);
    }
    //show add product page
    public function show_add_product()
    {
        return view('/products/add_product');
    }
    //add product
    public function add_product()
    {
        if ($this->request->is('post')) {
            $model = new ProductModel();
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'public/uploads', $imageName);
                $data = $this->request->getPost();
                $model->insert([
                    'pd_name' => $data['name'],
                    'pd_img_url'  => 'uploads/' . $imageName,
                    'pd_desc' => $data['desc'],
                    'pd_price' => $data['price']
                ]);
                return $this->response->redirect(site_url('/product_list'));
            }
        }
    }
    // show detail product page
    public function show_detail_product($id = null)
    {
        $model = new ProductModel();
        $data['product_obj'] = $model->where('pd_id', $id)->first();
        return view('/products/product_detail', $data);
    }
    // show edit product page
    public function show_edit_product($id = null)
    {
        $model = new ProductModel();
        $data['product_obj'] = $model->where('pd_id', $id)->first();
        return view('/products/edit_product', $data);
    }
    //update product
    public function update_product()
    {
        if ($this->request->is('post')) {
            $model = new ProductModel();
            $id = $this->request->getPost('id');
            $data = [
                'pd_name' => $this->request->getPost('name'),
                'pd_desc' => $this->request->getPost('desc'),
                'pd_price' => $this->request->getPost('price'),
            ];
            // Check if there is a new image uploaded
            $image = $this->request->getFile('image');
            if ($image->isValid() && !$image->hasMoved()) {
                // Get the product data from the database
                $product = $model->find($id);

                // Check if the URL of the new image is different from the URL of the old image
                if ($product && $product['pd_img_url'] !== $image->getRealPath()) {
                    // If the URLs are different, update the image path
                    if (!empty($product['pd_img_url'])) {
                        unlink(ROOTPATH . 'public/' . $product['pd_img_url']);
                    }
                    $imageName = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/uploads', $imageName);
                    $data['pd_img_url'] = 'uploads/' . $imageName;
                }
            }
            $model->update($id, $data);
            return $this->response->redirect(site_url('/product_list'));
        }
    }
    // delete product
    public function delete_product($id = null)
    {
        $model = new ProductModel();
        $product = $model->find($id);
        if (!empty($product['pd_img_url'])) {
            unlink(ROOTPATH . 'public/' . $product['pd_img_url']);
        }
        $data['product'] = $model->where('pd_id', $id)->delete($id);
        return $this->response->redirect(site_url('/product_list'));
    }
}
