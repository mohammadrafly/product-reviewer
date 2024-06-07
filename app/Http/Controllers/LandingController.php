<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Models\Survey;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'product' => Product::all(),
            'review' => Review::with('product')->get(),
        ];
        return view('landingpage.index',compact('data'));
    }

    public function singleProduct(Request $request, $id)
    {
        $data = [
            'title' => 'Product',
            'product' => Product::find($id),
            'review' => Review::where('id_product', $id)->get(),
            'countReview' => Review::where('id_product', $id)->count()
        ];
        return view('landingpage.productSingle',compact('data'));
    }

    public function review(Request $request, $id)
    {
        if ($request->ajax()) {
            Review::create([
                'id_product' => $id,
                'name' => $request->name,
                'email' => $request->email,
                'stars' => $request->stars,
                'review' => $request->review,
            ]);

            return $this->jsonResponse(true, 'Berhasil Menambah Review.');
        }
    }

    public function survey(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'company_name' => 'required|string',
                'contact_person' => 'required|string',
                'position' => 'required|string',
                'address' => 'required|string',
                'phone_no' => 'required|string|max:15',
                'fax_no' => 'required|string|max:15',
                'email' => 'required|email',
                'pit_score.*' => 'required',
                'comms_score.*' => 'required',
                'qp_score.*' => 'required',
                'ordering_score.*' => 'required',
                'invoicing_score.*' => 'required',
                'packaging_score.*' => 'required',
                'snt_score.*' => 'required',
                'pq_score.*' => 'required',
                'ch_score.*' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->route('survey')->withErrors($validator);
            }

            try {
                $data = $validator->validated();
                $total_weight = 0;
                $total_score = 0;

                //pit
                foreach ($data['pit_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //comms
                foreach ($data['comms_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //qp
                foreach ($data['qp_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //ordering
                foreach ($data['ordering_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //invoicing
                foreach ($data['invoicing_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //packaging
                foreach ($data['packaging_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //snt
                foreach ($data['snt_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //pq
                foreach ($data['pq_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                //ch
                foreach ($data['ch_score'] as $score) {
                    $total_weight += 4;
                    $total_score += $score;
                }

                $result = ($total_score / $total_weight) * 100;

                $judgement = 0;
                if ($result >= 70) {
                    $judgement = 'satisfied';
                } elseif ($result >= 50) {
                    $judgement = 'fair';
                } else {
                    $judgement = 'unsatisfied';
                }

                $finalData = [
                    'company_name' => $data['company_name'],
                    'contact_person' => $data['contact_person'],
                    'position' => $data['position'],
                    'address' => $data['address'],
                    'phone_no' => $data['phone_no'],
                    'fax_no' => $data['fax_no'],
                    'email' => $data['email'],
                    'judgement' => $judgement,
                ];

                $create = Survey::create($finalData);

                if (!$create) {
                    return redirect()->route('survey')->with('error', 'Survey gagal!');
                }

                return redirect()->route('survey')->with('success', 'Survey berhasil!');
            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->route('survey')->withErrors($e->validator);
            } catch (\Exception $e) {
                return redirect()->route('survey')->with('error', 'Terjadi kesalahan, silakan coba lagi.');
            }
        }

        $data = [
            'title' => 'Customer Satisfaction Survey',
            'score' => [
                'NA',
                '1',
                '2',
                '3',
                '4'
            ]
        ];

        return view('landingpage.survey', compact('data'));
    }

    private function jsonResponse($success, $message, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message
        ], $statusCode);
    }
}
