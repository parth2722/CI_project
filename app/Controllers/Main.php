<?php

namespace App\Controllers;

use App\Models\Auth;
use App\Models\Product;


class Main extends BaseController
{
    protected $request;

    protected $auth_model;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->prod_model = new Product;
        $this->data = ['session' => $this->session, 'request' => $this->request];
    }

    public function index()
    {
        $this->data['page_title'] = "Home";
        return view('pages/home', $this->data);
    }

    public function users()
    {
        $this->data['page_title'] = "Users";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->auth_model->where("id != '{$this->session->login_id}'")->countAllResults();
        $this->data['users'] = $this->auth_model->where("id != '{$this->session->login_id}'")->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['users']) ? count($this->data['users']) : 0;
        $this->data['pager'] = $this->auth_model->pager;
        return view('users/list', $this->data);
    }
    public function user_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            if ($password !== $cpassword) {
                $this->session->setFlashdata('error', "Password does not match.");
            } else {
                $udata = [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                if (!empty($password))
                    $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $checkMail = $this->auth_model->where('email', $email)->countAllResults();
                if ($checkMail > 0) {
                    $this->session->setFlashdata('error', "User Email Already Taken.");
                } else {
                    $save = $this->auth_model->save($udata);
                    if ($save) {
                        $this->session->setFlashdata('main_success', "User Details has been updated successfully.");
                        return redirect()->to('/users');
                    } else {
                        $this->session->setFlashdata('error', "User Details has failed to update.");
                    }
                }
            }
        }

        $this->data['page_title'] = "Add User";
        return view('users/add', $this->data);
    }
    public function user_edit($id = '')
    {
        if (empty($id))
            return redirect()->to('/users');
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            if ($password !== $cpassword) {
                $this->session->setFlashdata('error', "Password does not match.");
            } else {
                $udata = [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                if (!empty($password))
                    $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $checkMail = $this->auth_model->where('email', $email)->where('id!=', $id)->countAllResults();
                if ($checkMail > 0) {
                    $this->session->setFlashdata('error', "User Email Already Taken.");
                } else {
                    $update = $this->auth_model->where('id', $id)->set($udata)->update();
                    if ($update) {
                        $this->session->setFlashdata('success', "User Details has been updated successfully.");
                        return redirect()->to('user_edit/' . $id);
                    } else {
                        $this->session->setFlashdata('error', "User Details has failed to update.");
                    }
                }
            }
        }

        $this->data['page_title'] = "Edit User";
        $this->data['user'] = $this->auth_model->where("id ='{$id}'")->first();
        return view('users/edit', $this->data);
    }

    public function user_delete($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "user Deletion failed due to unknown ID.");
            return redirect()->to('/users');
        }
        $delete = $this->auth_model->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('main_success', "User has been deleted successfully.");
        } else {
            $this->session->setFlashdata('main_error', "user Deletion failed due to unknown ID.");
        }
        return redirect()->to('/users');
    }

    public function products()
    {
        $this->data['page_title'] = "Products";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  100;
        $this->data['total'] =  $this->prod_model->countAllResults();
        $this->data['products'] = $this->prod_model->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['products']) ? count($this->data['products']) : 0;
        $this->data['pager'] = $this->prod_model->pager;
        return view('products/list', $this->data);
    }
    public function product_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['code'] = $code;
            $udata['name'] = $name;
            $udata['description'] = $description;
            $udata['price'] = $price;
            $checkCode = $this->prod_model->where('code', $code)->countAllResults();
            if ($checkCode) {
                $this->session->setFlashdata('error', "Product Code Already Taken.");
            } else {
                $save = $this->prod_model->save($udata);
                if ($save) {
                    $this->session->setFlashdata('main_success', "Product Details has been updated successfully.");
                    return redirect()->to('/products/');
                } else {
                    $this->session->setFlashdata('error', "Product Details has failed to update.");
                }
            }
        }

        $this->data['page_title'] = "Add New Product";
        return view('products/add', $this->data);
    }
    public function product_edit($id = '')
    {
        if (empty($id))
            return redirect()->to('/products');
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['code'] = $code;
            $udata['name'] = $name;
            $udata['description'] = $description;
            $udata['price'] = $price;
            $checkCode = $this->prod_model->where('code', $code)->where("id!= '{$id}'")->countAllResults();
            if ($checkCode) {
                $this->session->setFlashdata('error', "Product Code Already Taken.");
            } else {
                $update = $this->prod_model->where('id', $id)->set($udata)->update();
                if ($update) {
                    $this->session->setFlashdata('success', "Product Details has been updated successfully.");
                    return redirect()->to('/product_edit/' . $id);
                } else {
                    $this->session->setFlashdata('error', "Product Details has failed to update.");
                }
            }
        }

        $this->data['page_title'] = "Edit Product";
        $this->data['product'] = $this->prod_model->where("id ='{$id}'")->first();
        return view('products/edit', $this->data);
    }

    public function product_delete($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "Product Deletion failed due to unknown ID.");
            return redirect()->to('/products');
        }
        $delete = $this->prod_model->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('main_success', "Product has been deleted successfully.");
        } else {
            $this->session->setFlashdata('main_error', "Product Deletion failed due to unknown ID.");
        }
        return redirect()->to('/products');
    }
}
