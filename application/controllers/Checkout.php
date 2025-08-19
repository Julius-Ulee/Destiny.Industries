<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller 
{
    private $id;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('wilayah');
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url(),'refresh');
            return;
        }
    }

    public function index($input = null)
    {
        $this->checkout->table = 'cart';
        $data['cart']	= $this->checkout->select([
            'cart.id', 'cart.quantity', 'cart.sub_total',
            'product.title', 'product.image', 'product.price'
        ])
        ->join('product')
        ->where('cart.id_user', $this->id)
        ->get();

        if (! $data['cart']) {
            $this->session->set_flashdata('warning', '<b>Belum ada produk.</b>');
            redirect(base_url('cart'));
        }

        $data['provinces'] = $this->wilayah->province();
        $data['input']  = $input ? $input : (object) $this->checkout->getDefaultValues();
        $data['title']  = "Chekout";
        $data['page']   = "pages/users/checkout";

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            redirect(base_url('checkout'));
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->checkout->validate()) {
            return $this->index($input);
        }

        $total = $this->db->select_sum('sub_total')
                        ->where('id_user', $this->id)
                        ->get('cart')
                        ->row()
                        ->sub_total;
        
        $weightTotal = $this->db->select_sum('quantity')
                        ->where('id_user', $this->id)
                        ->get('cart')
                        ->row()
                        ->quantity;

        $city = (int) $input->city;
        $weight    = $weightTotal * 500;
        $courier = $input->courier;

        // $cost = json_decode($this->rajaongkir->cost(35, $city, $weight, $courier), true);
        
        if($courier == "jne") {
            $courierName = "JNE";
            $costCourier = 19000;
        } elseif ($courier == "tiki") {
            $courierName = "TIKI";
            $costCourier = 20000;
        } else {
            $courierName = "POS Indonesia";
            $costCourier = 22000;
        }

        $province = $this->wilayah->province();
        $provinceName = $this->wilayah->getName($province, $input->province);

        $cityState = $this->wilayah->city($input->province);
        $cityName = $this->wilayah->getName($cityState, $input->city);

        $data = [
            'id_user'       => $this->id,
            'date'          => date('Y-m-d'),
            'invoice'       => $this->id.date('YmdHis'),
            'total'         => $total,
            'name'          => $input->name,
            'address'       => $input->address,
            'city'          => $cityName,
            'province'      => $provinceName,
            'phone'         => $input->phone,
            'courier'       => $courierName,
            'cost_courier'  => $costCourier,
            'status'        => 'waiting'
        ];

        if ($order = $this->checkout->create($data)) {
            $cart = $this->db->select('cart.*, product.stok')
                            ->join('product', 'product.id = cart.id_product')
                            ->where('id_user', $this->id)
                            ->get('cart')->result_array();

            foreach($cart as $row) {
                $row['id_orders']       = $order;
                $oldStok = $row['stok'];
                unset($row['id'], $row['id_user'], $row['stok']);
                if($this->db->insert('order_detail', $row)){
                    $newStok = $oldStok - $row['quantity'];
                    $this->db->update('product', ['stok'=>$newStok], ['id' => $row['id_product']]);
                }
            }

            $this->db->delete('cart', ['id_user' => $this->id]);

            $this->session->set_flashdata('success', '<b>Data berhasil disimpan.</b>');

			$data['title']		= 'Checkout Success';
			$data['content']	= (object) $data;
			$data['page']		= 'pages/users/success';

			$this->view($data);
        } else {
            $this->session->set_flashdata('error', '<b>Terjadi suatu kesalahan.</b>');
			return $this->index($input);
        }
    }
}

/* End of file Checkout.php */
