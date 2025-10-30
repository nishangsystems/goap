@extends('admin.layout')
@section('section')
    @php
        $campuses = collect(json_decode($_this->api_service->campuses())->data);
        $degrees = collect(json_decode($_this->api_service->degrees())->data);
        $programs = collect(json_decode($_this->api_service->programs())->data);
    @endphp
    <div class="py-3">
        <div class="py-2">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-light table-stripped" id="hidden-table-info">
                <thead>
                    <tr class="text-capitalize border-bottom border-dark">
                        <th class="border-left border-right" rowspan="2">#</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_name')}}</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_email')}}</th>
                        <th class="border-left border-right" rowspan="2">{{__('text.word_phone')}}</th> 
                        <th class="border-left border-right" rowspan="2">{{__('text.word_campus')}}</th> 
                        <th class="border-left border-right" rowspan="2">{{__('text.word_degree')}}</th> 
                        <th class="border-left border-right" colspan="2">{{__('text.word_programs')}}</th> 
                        <th class="border-left border-right" rowspan="2"></th>
                    </tr>
                    <tr class="text-capitalize border-bottom border-dark">
                        <th class="border-left border-right">{{__('text.word_first')}}</th>
                        <th class="border-left border-right">{{__('text.word_second')}}</th> 
                    </tr>
                </thead>
                <tbody id="table_body">
                    @php($k = 1)
                    @foreach ($applications as $appl)
                        <tr class="border-bottom">
                            <td class="border-left border-right">{{ $k++ }}</td>
                            <td class="border-left border-right">{{ $appl->name == null ? ($appl->student?->name??'') : $appl->name }}</td>
                            <td class="border-left border-right">{{ $appl->email == null ? ($appl->student?->email??'') : $appl->email }}</td>
                            <td class="border-left border-right">{{ $appl->phone == null ? ($appl->student?->phone??'') : $appl->phone }}</td>
                            <td class="border-left border-right">{{ $campuses->where('id', $appl->campus_id)->first()->name??null }}</td>
                            <td class="border-left border-right">{{ $degrees->where('id', $appl->degree_id)->first()->deg_name??null }}</td>
                            <td class="border-left border-right">{{ $programs->where('id', $appl->program_first_choice)->first()->name??null }}</td>
                            <td class="border-left border-right">{{ $programs->where('id', $appl->program_second_choice)->first()->name??null }}</td>
                            <td class="border-left border-right">
                                @if(isset($action))
                                    <a href="{{ Request::url().'/'.$appl->id }}" class="btn btn-xs btn-primary mt-1">{{ $action }}</a>
                                @endif
                                @if(isset($download))
                                   <a href="{{ Request::url() }}/{{  $appl->id }}?_atn=_dld" class="btn btn-xs btn-primary mt-1">{{ $download }}</a>
                                @endif
                                @if($appl->admitted == null)
                                    <button type="button" class="btn btn-danger btn-sm rounded" onclick="confirm(`You are about to delete a student application form for {{ $appl->name }}. This operation is not reversible.`) ? (window.location.href=`{{ route('admin.applications.delete', $appl->id) }}`) : null">@lang('text.word_delete')</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">

            </div>
        </div>
    </div>
@endsection