@extends('layouts.auth')

@section('title', $prefix === 'XCPELECTION' ? 'XCPELECTION2015' : $prefix)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="pb-3 mb-4 border-bottom">
                    <a href="{{ route('events.index') }}" class="d-none d-sm-inline pull-right"><i class="fa fa-home"></i></a>
                    <a href="{{ route('xcp.index', ['prefix' => $prefix]) }}" class="text-dark" style="text-decoration: none">
                        {{ $prefix === 'XCPELECTION' ? 'XCPELECTION2015' : $prefix }}
                    </a>
                </h1>
                <div class="card mb-4">
                    <div class="card-header" style="padding-left: 0; padding-right: 0;">
                        <div class="btn-group" role="group">
                            <a href="https://counterpartytalk.org/t/q-a-counterparty-foundation-election-2019-q-a/5596" target="_blank" class="btn btn-link" style="text-decoration: none">
                                <i class="fa fa-question-circle d-none d-sm-inline"></i>
                                Election Q&A
                            </a>
                            <a href="https://counterpartytalk.org/t/ann-starting-the-foundation-election-2019-voting-period/5597" target="_blank" class="btn btn-link" style="text-decoration: none">
                                <i class="fa fa-archive d-none d-sm-inline"></i>
                                How to Vote
                            </a>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none">
                                  <i class="fa fa-calendar"></i>
                                  {{ $prefix === 'XCPELECTION' ? '2015' : substr($prefix, -4) }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="{{ route('xcp.index', ['prefix' => 'XCPELECTION2019']) }}">2019</a>
                                    <a class="dropdown-item text-secondary" href="https://counterpartytalk.org/t/the-state-of-the-counterparty-project/4332" target="_blank">2018 <small><i class="fa fa-external-link"></i></small></a>
                                    <a class="dropdown-item" href="{{ route('xcp.index', ['prefix' => 'XCPELECTION2017']) }}">2017</a>
                                    <a class="dropdown-item" href="{{ route('xcp.index', ['prefix' => 'XCPELECTION2016']) }}">2016</a>
                                    <a class="dropdown-item" href="{{ route('xcp.index', ['prefix' => 'XCPELECTION']) }}">2015</a>
                                    <a class="dropdown-item text-secondary" href="https://web.archive.org/web/20141229140540/http://counterpartyfoundation.org/" target="_blank">2014 <small><i class="fa fa-external-link"></i></small></a>
                                </div>
                            </div>
                        </div>
                        <a href="https://bitcorns.com/" target="_blank" class="btn btn-link pull-right d-none d-sm-inline" style="text-decoration: none">
                            &#x1f33d;
                            BITCORN
                        </a>
                    </div>
                    <div class="table-responsive">
                    <table class="table mb-0" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Candidate</th>
                                <th>Vote Code</th>
                                <th class="text-right">Votes (XCP)</th>
                                <th class="text-right">Broadcasts</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($votes as $vote)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ isset($candidates[$prefix][$vote['candidate']]) ? $candidates[$prefix][$vote['candidate']] : "N/A" }}</td>
                                <td>{{ $vote['candidate'] }}</td>
                                <td class="text-right" title="{{ number_format($vote['xcp_voted'], 8) }} XCP">{{ number_format($vote['xcp_voted'], 0) }}</td>
                                <td class="text-right">{{ $vote['broadcast_count'] }}</td>
                            </tr>
                        @endforeach
                        @if(count($votes) === 0)
                            <tr>
                                <td class="text-center" colspan="5">No votes have been cast yet...</td>
                            </tr>
                        @endif
                            <tr>
                                <th colspan="3"><small>* Numbers shown are estimated.</small></th>
                                <th class="text-right"title="{{ number_format($votes->sum('xcp_voted'), 8) }}">{{ number_format($votes->sum('xcp_voted'), 0) }} ({{ number_format($votes->sum('xcp_voted') / 2615483 * 100, 1) }}%)</th>
                                <th class="text-right">{{ $votes->sum('broadcast_count') }}</th>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer text-center">For Reference Only - Not Official <br class="d-block d-sm-none" /> (What is "official?")</div>
                </div>
                <p class="text-muted text-center py-4 mb-0">
                    Follow the XCP Foundation election <br class="d-block d-sm-none" /> on
                    <a href="https://t.me/bitcorns" class="ml-1" target="_blank">
                        <i class="fa fa-telegram"></i>
                        Telegram
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
