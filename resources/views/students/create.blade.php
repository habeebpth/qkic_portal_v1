@extends('layouts.master')

@section('title')
    {{ __('students') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('students') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create') . ' ' . __('students') }}
                        </h4>
                        <form class="pt-3 student-registration-form" id="create-form" data-success-function="formSuccessFunction" enctype="multipart/form-data" action="{{ route('students.store') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <label>{{ __('Gr Number') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('admission_no', $admission_no, ['readonly','placeholder' => __('Gr Number'), 'class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <label for="class_section">{{ __('class_section') }} <span class="text-danger">*</span></label>
                                    <select name="class_section_id" id="class_section" class="form-control select2">
                                        <option value="">{{ __('select') . ' ' . __('Class') . ' ' . __('section') }}</option>
                                        @if(count($class_sections))
                                            @foreach ($class_sections as $class_section)
                                                <option value="{{ $class_section->id }}">{{$class_section->full_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <label for="session_year_id">{{ __('session_year') }} <span class="text-danger">*</span></label>
                                    <select name="session_year_id" id="session_year_id" class="form-control select2">
                                        @if(count($sessionYears))
                                            @foreach ($sessionYears as $year)
                                                <option value="{{ $year->id }}" {{$year->default==1 ? "selected" : ""}}>{{$year->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-3">
                                    <label>{{ __('admission_date') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('admission_date', null, ['placeholder' => __('admission_date'), 'class' => 'datepicker-popup-no-future form-control','id'=>'admission_date','autocomplete'=>'off']) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>


                                @if(!empty($features) )
                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label>{{ __('Status') }} <span class="text-danger">*</span></label><br>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    {!! Form::radio('status', 1) !!}
                                                    {{ __('Active') }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    {!! Form::radio('status', 0,true) !!}
                                                    {{ __('Inactive') }}
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text-danger small">{{ __('Note').':-'.__('Activating this will consider in your current subscription cycle') }}</span>
                                    </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('first_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('first_name', null, ['placeholder' => __('first_name'), 'class' => 'form-control']) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('last_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('last_name', null, ['placeholder' => __('last_name'), 'class' => 'form-control']) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control','autocomplete'=>'off']) !!}
                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>

                                <input type="hidden" name="idcard_type" id="idcard_type" value="QID">
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('Qatar ID Number') }}</label>
                                    {!! Form::text('idcard_num', null, ['placeholder' => __('Qatar ID Number'), 'class' => 'form-control', 'id' => 'idcard_num']) !!}
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('Blood Group') }}</label>
                                    <select name="blood_group" id="blood_group" class="form-control select2">
                                        <option value="">{{ __('select') . ' ' . __('Blood Group') }}</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'male',true) !!}
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('gender', 'female') !!}
                                                {{ __('female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label for="image">{{ __('image') }} </label>
                                    <input type="file" name="image" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="image" class="form-control file-upload-info" disabled="" placeholder="{{ __('image') }}"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('mobile') }}</label>
                                    {!! Form::number('mobile', null, ['placeholder' => __('mobile'), 'min' => 0 ,'class' => 'form-control remove-number-increment']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('current_address') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('current_address', null, ['required', 'placeholder' => __('current_address'), 'class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('permanent_address') }} <span class="text-danger">*</span></label>
                                    {!! Form::textarea('permanent_address', null, ['required', 'placeholder' => __('permanent_address'), 'class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                            </div>

                            <hr>
                            <div class="row mt-5">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Location') }}</label>
                                    {!! Form::text('location', null, ['placeholder' => __('Location'), 'class' => 'form-control', 'id' => 'location']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Zone Number') }}</label>
                                    {!! Form::text('zone_number', null, ['placeholder' => __('Zone Number'), 'class' => 'form-control', 'id' => 'zone_number']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Street Number') }}</label>
                                    {!! Form::text('street_num', null, ['placeholder' => __('Street Number'), 'class' => 'form-control', 'id' => 'street_num']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Building Number') }}</label>
                                    {!! Form::text('building_num', null, ['placeholder' => __('Building Number'), 'class' => 'form-control', 'id' => 'building_num']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Landmark') }}</label>
                                    {!! Form::text('landmark', null, ['placeholder' => __('Landmark'), 'class' => 'form-control', 'id' => 'landmark']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Current Madrasa') }}</label>
                                    {!! Form::text('current_madrasa', null, ['placeholder' => __('Current Madrasa'), 'class' => 'form-control', 'id' => 'current_madrasa']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Current School') }}</label>
                                    {!! Form::text('current_school', null, ['placeholder' => __('Current School'), 'class' => 'form-control', 'id' => 'current_school']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>{{ __('Transportation Required') }}</label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('transportation', 'yes') !!} Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                {!! Form::radio('transportation', 'no') !!} No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(count($extraFields))
                                <div class="row other-details">

                                    {{-- Loop the FormData --}}
                                    @foreach ($extraFields as $key => $data)
                                        @php if(in_array(strtolower($data->name), ['zone', 'mother name', 'zone number', 'blood group', 'whatsapp no', 'mother mobile', 'location', 'street number', 'building number', 'landmark', 'current madrasa', 'current school', 'transportation needed', 'student idcard type', 'student idcard num'])) continue; @endphp
                                        {{-- Edit Extra Details ID --}}
                                        {{ Form::hidden('extra_fields['.$key.'][id]', '', ['id' => $data->type.'_'.$key.'_id']) }}

                                        {{-- Form Field ID --}}
                                        {{ Form::hidden('extra_fields['.$key.'][form_field_id]', $data->id, ['id' => $data->type.'_'.$key.'_id']) }}

                                        <div class='form-group col-md-12 col-lg-6 col-xl-4 col-sm-12'>

                                            {{-- Add lable to all the elements excluding checkbox --}}
                                            @if($data->type != 'radio' && $data->type != 'checkbox')
                                                <label>{{$data->name}} @if($data->is_required)
                                                        <span class="text-danger">*</span>
                                                    @endif</label>
                                            @endif

                                            {{-- Text Field --}}
                                            @if($data->type == 'text')
                                                {{ Form::text('extra_fields['.$key.'][data]', '', ['class' => 'form-control text-fields', 'id' => $data->type.'_'.$key, 'placeholder' => $data->name, ($data->is_required == 1 ? 'required' : '')]) }}
                                                {{-- Number Field --}}
                                            @elseif($data->type == 'number')
                                                {{ Form::number('extra_fields['.$key.'][data]', '', ['min' => 0, 'class' => 'form-control number-fields', 'id' => $data->type.'_'.$key, 'placeholder' => $data->name, ($data->is_required == 1 ? 'required' : '')]) }}

                                                {{-- Dropdown Field --}}
                                            @elseif($data->type == 'dropdown')
                                                {{ Form::select('extra_fields['.$key.'][data]',$data->default_values,null,
                                                    ['id' => $data->type.'_'.$key,'class' => 'form-control select-fields',
                                                        ($data->is_required == 1 ? 'required' : ''),
                                                        'placeholder' => 'Select '.$data->name
                                                    ]
                                                )}}

                                                {{-- Radio Field --}}
                                            @elseif($data->type == 'radio')
                                                <label class="d-block">{{$data->name}} @if($data->is_required)
                                                        <span class="text-danger">*</span>
                                                    @endif</label>
                                                <div class="row col-md-12 col-lg-12 col-xl-6 col-sm-12">
                                                    @if(count($data->default_values))
                                                        @foreach ($data->default_values as $keyRadio => $value)
                                                            <div class="form-check mr-2">
                                                                <label class="form-check-label">
                                                                    {{ Form::radio('extra_fields['.$key.'][data]', $value, null, ['id' => $data->type.'_'.$keyRadio, 'class' => 'radio-fields',($data->is_required == 1 ? 'required' : '')]) }}
                                                                    {{$value}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>

                                                {{-- Checkbox Field --}}
                                            @elseif($data->type == 'checkbox')
                                                <label class="d-block">{{$data->name}} @if($data->is_required)
                                                        <span class="text-danger">*</span>
                                                    @endif</label>
                                                @if(count($data->default_values))
                                                    <div class="row col-lg-12 col-xl-6 col-md-12 col-sm-12">
                                                        @foreach ($data->default_values as $chkKey => $value)
                                                            <div class="mr-2 form-check">
                                                                <label class="form-check-label">
                                                                    {{ Form::checkbox('extra_fields['.$key.'][data][]', $value, null, ['id' => $data->type.'_'.$chkKey, 'class' => 'form-check-input chkclass checkbox-fields',($data->is_required == 1 ? 'required' : '')]) }} {{ $value }}

                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif

                                                {{-- Textarea Field --}}
                                            @elseif($data->type == 'textarea')
                                                {{ Form::textarea('extra_fields['.$key.'][data]', '', ['placeholder' => $data->name, 'id' => $data->type.'_'.$key, 'class' => 'form-control textarea-fields', ($data->is_required ? 'required' : '') , 'rows' => 3]) }}

                                                {{-- File Upload Field --}}
                                            @elseif($data->type == 'file')
                                                <div class="input-group col-xs-12">
                                                    {{ Form::file('extra_fields['.$key.'][data]', ['class' => 'file-upload-default', 'id' => $data->type.'_'.$key, ($data->is_required ? 'required' : '')]) }}
                                                    {{ Form::text('', '', ['class' => 'form-control file-upload-info', 'disabled' => '', 'placeholder' => __('image')]) }}
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-theme" type="button">{{ __('upload') }}</button>
                                                    </span>
                                                </div>
                                                <div id="file_div_{{$key}}" class="mt-2 d-none file-div">
                                                    <a href="" id="file_link_{{$key}}" target="_blank">{{$data->name}}</a>
                                                </div>

                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <hr>
                            {{-- Father Details --}}
                            <h5 class="mb-3">Father's Details</h5>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Father's Name</label>
                                    {!! Form::text('father_name', null, ['placeholder' => __('Father Name'), 'class' => 'form-control', 'id' => 'father_name']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mobile Number</label>
                                    {!! Form::number('father_mobile', null, ['placeholder' => __('Mobile'), 'min' => 1, 'class' => 'form-control remove-number-increment', 'id' => 'father_mobile']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>WhatsApp Number</label>
                                    {!! Form::number('father_whatsapp', null, ['placeholder' => __('WhatsApp Number'), 'min' => 1, 'class' => 'form-control remove-number-increment', 'id' => 'father_whatsapp']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Occupation</label>
                                    {!! Form::text('father_occupation', null, ['placeholder' => __('Occupation'), 'class' => 'form-control', 'id' => 'father_occupation']) !!}
                                </div>
                                <input type="hidden" name="father_idcard_type" id="father_idcard_type" value="QID">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Qatar ID Number</label>
                                    {!! Form::text('father_idcard_num', null, ['placeholder' => __('Qatar ID Number'), 'class' => 'form-control', 'id' => 'father_idcard_num']) !!}
                                </div>
                            </div>

                            <hr>
                            {{-- Mother Details --}}
                            <h5 class="mb-3">Mother's Details</h5>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mother's Name</label>
                                    {!! Form::text('mother_name', null, ['placeholder' => __('Mother Name'), 'class' => 'form-control', 'id' => 'mother_name']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Mobile Number</label>
                                    {!! Form::number('mother_mobile', null, ['placeholder' => __('Mobile'), 'min' => 1, 'class' => 'form-control remove-number-increment', 'id' => 'mother_mobile']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>WhatsApp Number</label>
                                    {!! Form::number('mother_whatsapp', null, ['placeholder' => __('WhatsApp Number'), 'min' => 1, 'class' => 'form-control remove-number-increment', 'id' => 'mother_whatsapp']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Occupation</label>
                                    {!! Form::text('mother_occupation', null, ['placeholder' => __('Occupation'), 'class' => 'form-control', 'id' => 'mother_occupation']) !!}
                                </div>
                                <input type="hidden" name="mother_idcard_type" id="mother_idcard_type" value="QID">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label>Qatar ID Number</label>
                                    {!! Form::text('mother_idcard_num', null, ['placeholder' => __('Qatar ID Number'), 'class' => 'form-control', 'id' => 'mother_idcard_num']) !!}
                                </div>
                            </div>

                            <hr>
                            {{-- Guardian Details --}}
                            <div class="row mt-5">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="guardian_email">{{ __('guardian') . ' ' . __('email') }} <span class="text-danger">*</span></label>
                                    <select class="guardian-search form-control guardian_email" id="guardian_email"></select>
                                    <input type="hidden" id="guardian_email" class="guardian_email" name="guardian_email">
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('guardian') . ' ' . __('first_name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('guardian_first_name', null, ['placeholder' => __('guardian') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'guardian_first_name']) !!}
                                </div>

                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('guardian') . ' ' . __('last_name') }}</label>
                                    {!! Form::text('guardian_last_name', null, ['placeholder' => __('guardian') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'guardian_last_name']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                    <label>{{ __('guardian') . ' ' . __('mobile') }} <span class="text-danger">*</span></label>
                                    {!! Form::number('guardian_mobile', null, ['placeholder' => __('guardian') . ' ' . __('mobile'), 'class' => 'form-control remove-number-increment', 'id' => 'guardian_mobile','min' => 1 ]) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                    <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" checked name="guardian_gender" value="male" id="guardian_male">
                                                {{ __('male') }}
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="guardian_gender" value="female" id="guardian_female">
                                                {{ __('female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-6 col-xl-4">
                                    <label for="guardian_image">{{ __('image') }} </label>
                                    <input type="file" name="guardian_image" class="file-upload-default"/>
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="guardian_image" class="form-control file-upload-info" disabled="" placeholder="{{ __('image') }}"/>
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme" type="button">{{ __('upload') }}</button>
                                        </span>
                                    </div>
                                    <img id="guardian-image-preview" src="" alt="Guardian Image" class="img-fluid w-25"/>
                                </div>
                            </div>
                            <input class="btn btn-theme float-right ml-3" id="create-btn" type="submit" value={{ __('submit') }}>
                            <input class="btn btn-secondary float-right" type="reset" value={{ __('reset') }}>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function formSuccessFunction() {
            setTimeout(() => {
                window.location.reload()
            }, 3000);
        }

        $('#admission_date').datepicker({
            format: "dd-mm-yyyy",
            rtl: isRTL()
        }).datepicker("setDate", 'now');
    </script>
@endsection
