<?php

namespace App\Controllers;

use App\Libraries\hash;
use App\Models\user_model;
use App\Models\products_model;

class authenticate extends BaseController
{

    public function register()
    {

        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Your user name is required',
                    'is_unique' => 'Username already taken!'
                ]
            ],
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your full name'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Your email is required',
                    'is_unique' => 'This email already exists!',
                    'valid_email' => 'Please enter a valid email address'
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[18]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[18]|matches[password]',
                'errors' => [
                    'required' => 'Confirm your Password',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                    'matches' => 'Passwords do not match'

                ]
            ]
        ]);

        if (!$validation) {
            return view('Auth/register', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('full_name');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $role_id = '1';

            $values = [
                'username' => $username,
                'full_name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id
            ];


            $my_user_model = new \App\Models\user_model();
            $query = $my_user_model->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went awfully wrong');
            } else {
                return redirect()->to('register')->with('success', 'You have been registered successfully');
            }
        }
    }
    public function registerAdmin()
    {

        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Your user name is required',
                    'is_unique' => 'Username already taken!'
                ]
            ],
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter your full name'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Your email is required',
                    'is_unique' => 'This email already exists!',
                    'valid_email' => 'Please enter a valid email address'
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[18]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                ]
            ],
            'cpassword' => [
                'rules' => 'required|min_length[5]|max_length[18]|matches[password]',
                'errors' => [
                    'required' => 'Confirm your Password',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                    'matches' => 'Passwords do not match'

                ]
            ]
        ]);

        if (!$validation) {
            return view('Auth/admin_register', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getPost('full_name');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $role_id = '2';

            $values = [
                'username' => $username,
                'full_name' => $name,
                'email' => $email,
                'password' => $password,
                'role_id' => $role_id
            ];


            $my_user_model = new \App\Models\user_model();
            $query = $my_user_model->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went awfully wrong');
            } else {
                return redirect()->to('ad_register')->with('success', 'Administrator has been registered successfully');
            }
        }
    }
    public function login()
    {
        $session = session();

        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Your email is required',
                    'is_not_unique' => 'This email is not registered',
                    'valid_email' => 'Please enter a valid email address'
                ]

            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[18]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                ]
            ],


        ]);

        if (!$validation) {
            return view('Auth/login', ['validation' => $this->validator]);
        } else {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');


            $UserModel = new \App\Models\user_model();
            $user_info = $UserModel->where('email', $email)->first();
            $check_password = hash::check($password, $user_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Wrong password credentials');
                return redirect()->to('login')->withInput();
            } else {
                return redirect()->to('home');
            }
        }
    }
    public function add_items()
    {

        $validation = $this->validate([
            'item_name' => [
                'rules' => 'required|is_unique[tbl_products.product_name]',
                'errors' => [
                    'required' => 'Please enter item name',
                    'is_unique' => 'This item name already exists'
                ]
            ],
            'item_price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter item name'
                ]
            ],
            'item_quantity' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter available quantity'
                ]
            ]
        ]);


        if (!$validation) {
            return view('Auth/admin.php', ['validation' => $this->validator]);
        } else {

            $product_name = $this->request->getPost('item_name');
            $product_quantity = $this->request->getPost('item_quantity');
            $product_price = $this->request->getPost('item_price');
            $product_category = $this->request->getPost('category');

            $product_rating = $this->request->getPost('rating');

            $product_image = $this->request->getFile('inpFile');
            if ($product_image->isValid() && !$product_image->hasMoved()) {
                $image_name = $product_image->getRandomName();
                $product_image->move('assets/', $image_name);
            }

            $values = [
                'product_name' => $product_name,
                'product_quantity' => $product_quantity,
                'product_price' => $product_price,
                'product_category' => $product_category,
                'product_image' => $image_name,
                'is_featured' => $product_rating

            ];

            $productModel = new \App\Models\products_model();
            $query = $productModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Something went awfully wrong');
            } else {
                return redirect()->back()->with('success', 'Item has been added successfully');
            }
        }
    }
    public function get_products()
    {

        $products = new products_model();
        $result['products'] = $products->displayCatalog();

        return $this->response->setJSON($result);
    }
    public function get_featured()
    {
        $products = new products_model();
        $result['products'] = $products->displayFeatured();

        return $this->response->setJSON($result);
    }
    public function get_orders()
    {
        $products = new products_model();
        $result['orders'] = $products->displayOrders();

        return $this->response->setJSON($result);
    }
    public function get_users()
    {
        $users = new user_model();
        $result['users'] = $users->display_Users();

        return $this->response->setJSON($result);
    }
    public function deleteProduct()
    {

        $id = $this->request->getPost('product_id');
        $product = new products_model();
        $status = $product->deleteProduct($id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteOrder()
    {

        $id = $this->request->getPost('order_id');
        $product = new products_model();
        $status = $product->deleteOrder($id);

        try {
            if ($status) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteUser()
    {
        $id = $this->request->getPost('user_id');
        $users = new user_model();
        $result = $users->deleteUser($id);

        try {
            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function UserLogin()
    {

        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $login = new user_model();

        $result = $login->checkuser($email, $password);
        $adminresult = $login->checkAdmin($email, $password);

        try {
            if (count($result) > 1) {
                echo 1;
                $username = $result['username'];
                $userid = $result['id'];

                $data = [
                    'name' => $username,
                    'userid' => $userid
                ];
                $session->set($data);
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo  4;
        }
    }
    public function logout()
    {

        $session = session();
        session_unset();
        $session->destroy();
        return redirect()->to('init');
    }
    public function addtoCart()
    {

        $newOrder = new products_model();


        $product_id = $this->request->getPost('productid');
        $customer = $this->request->getPost('customer');
        $item_price = $this->request->getPost('item_price');
        $item_quantity = $this->request->getPost('item_quantity');
        $order_status = "pending";

        if ($newOrder->checkproduct($product_id, $customer) == 'okay') {
            $result = $newOrder->order($product_id, $customer, $item_quantity, $order_status);
            try {
                if ($result) {
                    echo 1;
                }
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        } else {
            echo 'duplicate';
        }
    }
    public function fillCart()
    {
        $cart_items = new products_model();
        $id = $this->request->getPost('customer');
        $result['orders'] = $cart_items->displayCartItems($id);
        return $this->response->setJSON($result);
    }

    public function AdminLogin()
    {

        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $login = new user_model();


        $result = $login->checkAdmin($email, $password);

        try {
            if (count($result) > 1) {
                echo 1;
                $username = $result['username'];
                $userid = $result['id'];

                $data = [
                    'name' => $username,
                    'userid' => $userid
                ];
                $session->set($data);
            } else {
                echo 2;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            echo  4;
        }
    }
    public function getAdmin()
    {
        $thismodel = new user_model();
        $admin_id = $this->request->getPost('admin_id');
        $result['data'] = $thismodel->getAdmin($admin_id);

        return $this->response->setJSON($result);
    }
    public function get_category()
    {
        $products = new products_model();
        $result['categories'] = $products->get_category();

        return $this->response->setJSON($result);
    }
    public function add_category()
    {
        $newOrder = new products_model();
        $category_name = $this->request->getPost('category_name');
        $status = '0';

        $result = $newOrder->addCategory($category_name,$status);
        try {
            if ($result) {
                echo 1;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }


    }
}
