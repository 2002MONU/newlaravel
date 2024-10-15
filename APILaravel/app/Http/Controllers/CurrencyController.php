<?php 
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        $currencies = $this->currencyService->getCurrencies();
        return view('currency.converter', compact('currencies'));
    }

    public function convert(Request $request)
    {
        $request->validate([
            'from' => 'required|string',
            'to' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $from = $request->input('from');
        $to = $request->input('to');
        $amount = $request->input('amount');

        $result = $this->currencyService->convert($from, $to, $amount);

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        // Fetch the names of the currencies
        $currencies = $this->currencyService->getCurrencies();
        $result['from_name'] = $currencies[$from] ?? $from;
        $result['to_name'] = $currencies[$to] ?? $to;
        $result['from_code'] = $from;
        $result['to_code'] = $to;
        
        // Calculate the equivalent value of 1 unit of the source currency in the target currency
        $result['one_unit_conversion'] = $result['rate'];

        return view('currency.result', compact('result'));
    }
}

