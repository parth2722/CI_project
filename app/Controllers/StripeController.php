<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Stripe;
use TCPDF;

class StripeController extends BaseController
{

    public function index()
    {
        return view('checkout');
    }
    public function createCharge()
    {
        \Stripe\Stripe::setApiKey(getenv('stripe.secret'));

        $userName = session()->get('name');
        $userEmail = session()->get('email');

        if (!$userName || !$userEmail) {
            return redirect()->to('/login')->with('error', 'User information not found in session');
        }

        $customer = \Stripe\Customer::create([
            'email' => $userEmail,
            'name' => $userName,
            'source' => $this->request->getVar('stripeToken'),
        ]);

        \Stripe\Charge::create([
            'amount' => 5 * 100,
            'currency' => 'usd',
            'customer' => $customer->id,
            'description' => 'Binaryboxtuts Payment Test'
        ]);

        return redirect()->to('/success')->with('success', ' Successful!');
    }

    public function refund($chargeId)
    {
        \Stripe\Stripe::setApiKey(getenv('stripe.secret'));

        try {

            $refund = \Stripe\Refund::create([
                'charge' => $chargeId,
                // 'amount' => 200,
                'reason' => 'requested_by_customer'
            ]);
            $balanceTransaction = \Stripe\BalanceTransaction::retrieve($refund->balance_transaction);

            return redirect()->back()->with('success', 'successful!');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function generate_invoice()
    {

        $userName = session()->get('name');
        $userEmail = session()->get('email');
        $amount = 5;

        $invoiceNumber = rand(1000, 9999);

        $pdf = new TCPDF();

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');
        $pdf->SetKeywords('Invoice, TCPDF, PHP, CodeIgniter');


        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 12);

        $content = '
        <h1>Invoice</h1>
        <p><strong>Invoice Number:</strong> ' . $invoiceNumber . '</p>
        <p><strong>User Name:</strong> ' . $userName . '</p>
        <p><strong>User Email:</strong> ' . $userEmail . '</p>
        <p><strong>Amount:</strong> $' . $amount . '</p>
    ';

        $pdf->writeHTML($content, true, false, true, false, '');

        $pdf->Output('invoice.pdf', 'D');
    }
}
