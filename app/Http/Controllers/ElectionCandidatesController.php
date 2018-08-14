<?php

namespace App\Http\Controllers;

use Auth;
use App\Election;
use App\Candidate;
use StephenHill\Base58;
use Illuminate\Http\Request;

class ElectionCandidatesController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create Candidate
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $election
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $election)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $election = Election::findOrFail($election);

        $address = $this->generateBurnAdddress(Auth::user(), $election->id);

        $candidate = Candidate::create([
            'election_id' => $election->id,
            'user_id' => Auth::user()->id,
            'address' => $address,
            'content' => $request->content,
        ]);

        return redirect(route('elections.show', ['election' => $election->id]))
            ->with('success', 'You are now a candidate!');
    }

    /**
     * Generate Burn Address
     * @param  \App\User  $user
     * @return string
     */
    private function generateBurnAdddress($user, $election_id)
    {
        $base58 = new Base58();

        $template = 1 . $user->name . $election_id;

        if(strlen($template) > 34)
        {
            return $this->burn(substr($template, 0, 34));
        }
        else
        {
            $repeat = 34 - strlen($template);

            return $this->burn($template . str_repeat("X", $repeat));
        }
    }

    private function hh256($string)
    {
        $string = hash('sha256', $string);

        return bin2hex(hash('sha256', $string));
    }

    private function b58ec($string)
    {
        $base58 = new Base58();

        $unencoded = hex2bin(utf8_encode($string));

        return $base58->encode($unencoded);
    }

    private function b58dc($encoded, $trim=0)
    {
        $base58 = new Base58();

        return $base58->decode(substr($encoded, 0, -$trim));
    }

    private function burn($string)
    {
        $decoded = $this->b58dc($string, 4);
        $decoded_hex = bin2hex($decoded);
        $check = substr($this->hh256($decoded), 0, 8);
        $coded = $decoded_hex . $check;

        return $this->b58ec($coded);
    }
}
