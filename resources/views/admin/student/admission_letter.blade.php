@extends('admin.printable2')
@section('style')
    <style>
        ul.arrow-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0.4em;
            width: 0;
            height: 0;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            border-left: 8px solid #ff4d00ff; /* arrow color */
        }
    </style>
@endsection
@section('section')
    <div class="py-2 container-fluid">
        <h3 class="text-uppercase"><b>{{ $title }}</b></h3>
        <hr class="border-bottom border-4 my-0 border-dark">
        <div style="font-size: large;">
            
            <div class="my-3 py-2 text-capitalize">
                <span>{!!  __('text.dear_titles') !!} : <b class="text-danger">{{ $name??'' }}</b></span><br>
            </div>
            <div class="my-3 py-2">
                <p>{!! __('text.admission_letter_text_block1', ['degree'=>$degree??'DEG', 'department'=>$fee['department']??'DEP', 'matric'=>$matric ,'start_of_lectures'=>$start_of_lectures, 'school_email'=>$school_email]) !!}</p>
                <ul class="arrow-list">
                    <li>If you cannot at the time of registration produce the original copies of your certificates and other credentials this offer of admission may be revoked.</li>
                    <li>{!! __('text.admission_letter_text_list_item2', ['first_instalment_date'=>$first_instalment_date, 'second_instalment_date'=>$second_instalment_date]) !!}</li>
                    <li>It is mandatory for you to attend the orientation program for new students as will be scheduled.</li>
                </ul>
                <p>We congratulate you for your admission and welcome you into Gracious University. In case there is the need for more information or clarification, please contact email us at <b>registrar@gueduc.org</b> </p>
            </div>

            <table class="my-2">
                <thead>
                    <th>@lang('text.word_campus')</th>
                    <th>@lang('text.word_address')</th>
                    <th>@lang('text.word_username')</th>
                    <th>@lang('text.word_password')</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-danger">{{ $campus??'' }}</td>
                        <td>https://gustudents.com</td>
                        <td class="text-danger">{{ $matric??'' }}</td>
                        <td>12345678</td>
                    </tr>
            </table>
            

            <div class="my-4 py-3 text-capitalize">
                <span> <b>@lang('text.the_registrar')</b>  <br> {{ $registrar??'' }} </span>
            </div>
        </div>
    </div>
@endsection