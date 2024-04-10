<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
	function index()
	{

		$crudModel = new CrudModel();


		$data['user_data'] = $crudModel->findAll();

		return view('crud_view', $data);
	}

	function success()
	{

		return view('success');
	}
	function htmlToPDF()
	{
		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml(view('pdf_view'));
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream();
	}

	function email_sent()
	{
		return view('send_email');
	}

	function pdf()
	{
		return view('pdf_view');
	}
	function add()
	{
		return view('add_data');
	}

	public function add_validation()
	{
		helper(['form', 'url']);


		$file = $this->request->getFile('type');
		if ($file->isValid() && !$file->hasMoved()) {
			$imageName = $file->getRandomName();
			$file->move('uploads/', $imageName);
		}
		$rules = [
			'name' => 'required|min_length[3]',
			'email' => 'required|valid_email',
			'gender' => 'required',
		];

		$error = $this->validate($rules);

		if (!$error) {
			echo view('add_data', [
				'error' => $this->validator
			]);
		} else {

			$crudModel = new CrudModel();

			$data = [
				'name' => $this->request->getVar('name'),
				'email' => $this->request->getVar('email'),
				'gender' => $this->request->getVar('gender'),
				'type' => $imageName,
			];

			$crudModel->save($data);

			$session = \Config\Services::session();
			$session->setFlashdata('success', 'User Data Added');


			return $this->response->redirect(site_url('/crud'));
		}
	}



	function fetch_single_data($id = null)
	{
		$crudModel = new CrudModel();

		$data['user_data'] = $crudModel->where('id', $id)->first();

		return view('edit_data', $data);
	}

	function edit_validation()
	{
		helper(['form', 'url']);

		$crudModel = new CrudModel();

		$id = $this->request->getVar('id');

		$rules = [
			'name' => 'required|min_length[3]',
			'email' => 'required|valid_email',
			'gender' => 'required',
		];

		$error = $this->validate($rules);

		if (!$error) {
			$data['user_data'] = $crudModel->where('id', $id)->first();
			$data['error'] = $this->validator;
			echo view('edit_data', $data);
		} else {

			$file = $this->request->getFile('type');
			if ($file->isValid() && !$file->hasMoved()) {
				$imageName = $file->getRandomName();
				$file->move('uploads/', $imageName);
			}

			$data = [
				'name' => $this->request->getVar('name'),
				'email'  => $this->request->getVar('email'),
				'gender'  => $this->request->getVar('gender'),
			];

			if (isset($imageName)) {
				$data['type'] = $imageName;
			}

			$crudModel->update($id, $data);

			$session = \Config\Services::session();
			$session->setFlashdata('success', 'User Data Updated');

			return $this->response->redirect(site_url('/crud'));
		}
	}


	function delete($id)
	{
		$crudModel = new CrudModel();

		$crudModel->where('id', $id)->delete($id);

		$session = \Config\Services::session();

		$session->setFlashdata('success', 'User Data Deleted');

		return $this->response->redirect(site_url('/crud'));
	}
	function sendMail()
	{
		$to = $this->request->getVar('mailTo');
		$subject = $this->request->getVar('subject');
		$message = $this->request->getVar('message');

		$email = \Config\Services::email();
		$email->setTo($to);
		$email->setFrom('parthhingemangoit@gmail.com', 'Confirm Registration');

		$email->setSubject($subject);
		$email->setMessage($message);
		if ($email->send()) {
			echo 'Email successfully sent';
		} else {
			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
	}


	function exportCSV()
	{
		$crudModel = new CrudModel();
		$userData = $crudModel->findAll();

		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="user_data.csv"');

		$output = fopen('php://output', 'w');

		fputcsv($output, array('ID', 'Name', 'Email', 'Gender', 'Image'));

		foreach ($userData as $user) {

			$rowData = array(
				$user['id'],
				$user['name'],
				$user['email'],
				$user['gender'],
				base_url("uploads/" . $user['type'])
			);

			fputcsv($output, $rowData);
		}

		fclose($output);

		exit();
	}
}
