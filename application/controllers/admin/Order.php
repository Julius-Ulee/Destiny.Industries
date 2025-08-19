<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller 
{    
    public function __construct()
    {
		parent::__construct();
		if (!$this->session->userdata('username')) {
            redirect('admin');
        }
    }
	public function generatePDF() {
		$this->load->library('tcpdf');

		$data['title']      = 'Admin: Order';
		$data['content']    = $this->order->orderBy('id', 'DESC')->orderBy('date', 'DESC')->orderBy('name', 'DESC')->orderBy('address', 'DESC')->orderBy('city', 'DESC')->orderBy('province', 'DESC')->orderBy('phone', 'DESC')->orderBy('courier', 'DESC')->orderBy('cost_courier', 'DESC')->orderBy('total', 'DESC')->orderBy('status', 'paid')->get();

		$html = $this->load->view('pages/admin/pdf/report', $data, true);

		$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Your Name');
		$pdf->SetTitle('Laporan Transaksi');
		$pdf->SetSubject('Laporan Transaksi');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		$pdf->AddPage();

		$pdf->writeHTML($html, true, false, true, false, '');

		$pdf->Output('transaction_report.pdf', 'I');
	}

	public function printReport() {
		$data['title']      = 'Laporan Transaksi';
		$data['content']    = $this->order->orderBy('id', 'DESC')->orderBy('date', 'DESC')->orderBy('name', 'DESC')->orderBy('address', 'DESC')->orderBy('city', 'DESC')->orderBy('province', 'DESC')->orderBy('phone', 'DESC')->orderBy('courier', 'DESC')->orderBy('cost_courier', 'DESC')->orderBy('total', 'DESC')->orderBy('status', 'paid')->get();

		$this->load->view('pages/admin/print/report', $data);
	}

	public function export_excel()
	{
		$data['judul'] 		= 'Laporan Transaksi';
		$data['content']    = $this->order->orderBy('id', 'DESC')->orderBy('date', 'DESC')->orderBy('name', 'DESC')->orderBy('address', 'DESC')->orderBy('city', 'DESC')->orderBy('province', 'DESC')->orderBy('phone', 'DESC')->orderBy('courier', 'DESC')->orderBy('cost_courier', 'DESC')->orderBy('total', 'DESC')->orderBy('status', 'paid')->get();

		$this->load->view('pages/admin/print/export_excel', $data);
	}

    public function index($page = null)
    {
        $data['title']      = 'Admin: Order';
        $data['content']    = $this->order->orderBy('date', 'DESC')->orderBy('status', 'paid')->paginate($page)->get();
        $data['total_rows'] = $this->order->count();
        $data['pagination'] = $this->order->makePagination(base_url('admin/order'), 3, $data['total_rows']);
        $data['page']       = 'pages/admin/order/index';
        
        $this->viewAdmin($data);
    }

    public function search($page = null)
	{
		if (isset($_POST['keyword'])) {
			$this->session->set_userdata('keyword', $this->input->post('keyword'));
		} else {
			redirect(base_url('order'));
		}

		$keyword	        = $this->session->userdata('keyword');
		$data['title']		= 'Admin: Order';
		$data['content']	= $this->order->like('invoice', $keyword)
								->orderBy('date', 'DESC')
								->paginate($page)->get();
		$data['total_rows']	= $this->order->like('invoice', $keyword)->count();
		$data['pagination']	= $this->order->makePagination(
			base_url('admin/order/search'), 3, $data['total_rows']
		);
		$data['page']		= 'pages/admin/order/index';
		
		$this->viewAdmin($data);
	}

	public function reset()
	{
		$this->session->unset_userdata('keyword');
		redirect(base_url('admin/order'));
	}

    public function detail($id)
    {
        $data['order']			= $this->order->where('id', $id)->first();
		if (!$data['order']) {
			$this->session->set_flashdata('warning', '<b>Data tidak ditemukan.</b>');
			redirect(base_url('order'));
		}

		$this->order->table	= 'order_detail';
		$data['order_detail']	= $this->order->select([
				'order_detail.id_orders', 'order_detail.id_product', 'order_detail.quantity', 'order_detail.message', 'order_detail.sub_total', 'product.title', 'product.image', 'product.price'
			])
			->join('product')
			->where('order_detail.id_orders', $id)
			->get();

		if ($data['order']->status !== 'waiting') {
			$this->order->table = 'order_confirm';
			$data['order_confirm']	= $this->order->where('id_orders', $id)->first();
		}
		$data['title']          = 'Order Detail';
		$data['page']			= 'pages/admin/order/detail';

		$this->viewAdmin($data);
    }

    public function update($id)
	{
		if (!$_POST) {
			$this->session->set_flashdata('error', '<b>Terjadi kesalahan!</b>');
			redirect(base_url("order/detail/$id"));
		}

        if($this->input->post('waybill') != "") {
            $update = $this->order->where('id', $id)->update(['waybill' => $this->input->post('waybill') ,'status' => $this->input->post('status')]);
        } else {
            $update = $this->order->where('id', $id)->update(['status' => $this->input->post('status')]);
        }

		if ($update) {
			$this->session->set_flashdata('success', '<b>Data berhasil diperbaharui.</b>');
		} else {
			$this->session->set_flashdata('error', '<b>Terjadi kesalahan!</b>');
		}

		redirect(base_url("admin/order/detail/$id"));
	}
}

/* End of file Order.php */
