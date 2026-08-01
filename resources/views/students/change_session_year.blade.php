@extends('layouts.master')

@section('title')
    {{ __('Change Student Session Year') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('Change Student Session Year') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('Filter & Select Students') }}
                        </h4>
                        <div id="toolbar">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="filter-menu" for="source_session_year_id">{{ __('Source Session Year') }} <span class="text-danger">*</span></label>
                                    <select name="source_session_year_id" id="source_session_year_id" class="form-control">
                                        <option value="">{{ __('All Session Years') }}</option>
                                        @foreach ($sessionYears as $sessionYear)
                                            <option value="{{ $sessionYear->id }}" {{ $sessionYear->id == 9 ? 'selected' : '' }}>
                                                {{ $sessionYear->name }} {{ $sessionYear->id == 9 ? '(Legacy Hardcoded ID 9)' : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="filter-menu" for="class_section_id">{{ __('Class Section') }}</label>
                                    <select name="class_section_id" id="class_section_id" class="form-control">
                                        <option value="">{{ __('All Classes') }}</option>
                                        @foreach ($class_sections as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="filter-menu" for="status">{{ __('Student Status') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">{{ __('All (Active & Inactive)') }}</option>
                                        <option value="1">{{ __('Active Only') }}</option>
                                        <option value="0">{{ __('Inactive Only') }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-md-3">
                                    <label class="filter-menu" for="target_session_year_id">{{ __('Target Session Year (Assign To)') }} <span class="text-danger">*</span></label>
                                    <select name="target_session_year_id" id="target_session_year_id" class="form-control">
                                        @foreach ($sessionYears as $sessionYear)
                                            <option value="{{ $sessionYear->id }}" {{ (isset($defaultSessionYear) && $defaultSessionYear->id == $sessionYear->id) ? 'selected' : '' }}>
                                                {{ $sessionYear->name }} {{ (isset($defaultSessionYear) && $defaultSessionYear->id == $sessionYear->id) ? '(Active Default)' : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <form id="change-session-year-form" action="{{ route('students.change-session-year.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="target_session_year_id" id="form_target_session_year_id" value="">
                            <input type="hidden" name="student_ids" id="form_student_ids" value="">

                            <div class="row search-container">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' 
                                           data-toggle="table" 
                                           data-url="{{ route('students.change-session-year.list') }}" 
                                           data-click-to-select="true" 
                                           data-search="true" 
                                           data-toolbar="#toolbar" 
                                           data-show-columns="true" 
                                           data-show-refresh="true" 
                                           data-trim-on-search="false" 
                                           data-mobile-responsive="true" 
                                           data-maintain-selected="true" 
                                           data-pagination="true"
                                           data-side-pagination="server"
                                           data-page-list="[10, 20, 50, 100, 200]"
                                           data-query-params="changeSessionYearQueryParams">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th scope="col" data-field="no">{{ __('no.') }}</th>
                                                <th scope="col" data-field="student_id" data-visible="false">{{ __('student_id') }}</th>
                                                <th scope="col" data-field="student_name">{{ __('Student Name') }}</th>
                                                <th scope="col" data-field="admission_no">{{ __('admission_no') }}</th>
                                                <th scope="col" data-field="class_name">{{ __('Class') }}</th>
                                                <th scope="col" data-field="current_session_year">{{ __('Current Session Year') }}</th>
                                                <th scope="col" data-field="status_text">{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                            <div class="text-left my-4">
                                <button class="btn btn-theme float-right" id="btn-update-session-year" type="submit">
                                    {{ __('Update Session Year for Selected Students') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changeSessionYearQueryParams(p) {
            return {
                limit: p.limit,
                offset: p.offset,
                sort: p.sort,
                order: p.order,
                search: p.search,
                source_session_year_id: $('#source_session_year_id').val(),
                class_section_id: $('#class_section_id').val(),
                status: $('#status').val(),
            };
        }

        $('#source_session_year_id, #class_section_id, #status').on('change', function () {
            $('#table_list').bootstrapTable('refresh');
        });

        $('#change-session-year-form').on('submit', function (e) {
            e.preventDefault();
            var selections = $('#table_list').bootstrapTable('getSelections');
            if (selections.length === 0) {
                showErrorToast("{{ __('Please select at least one student') }}");
                return false;
            }

            var studentIds = selections.map(function (row) {
                return row.student_id;
            });

            var targetSessionYearId = $('#target_session_year_id').val();
            if (!targetSessionYearId) {
                showErrorToast("{{ __('Please select a target session year') }}");
                return false;
            }

            $('#form_student_ids').val(studentIds.join(','));
            $('#form_target_session_year_id').val(targetSessionYearId);

            var form = $(this);
            var url = form.attr('action');
            var data = new FormData(form[0]);

            function successFunction(response) {
                $('#table_list').bootstrapTable('refresh');
            }

            ajaxRequest('POST', url, data, null, successFunction);
        });
    </script>
@endsection
