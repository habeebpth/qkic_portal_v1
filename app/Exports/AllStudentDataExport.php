<?php

namespace App\Exports;

use App\Models\Students;
use App\Models\FormField;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class AllStudentDataExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithTitle
{
    private $extraFields;
    private $show_deactive;
    private $class_id;
    private $session_year_id;
    private $search;

    public function __construct($show_deactive = 0, $class_id = null, $session_year_id = null, $search = null)
    {
        $this->show_deactive = $show_deactive;
        $this->class_id = $class_id;
        $this->session_year_id = $session_year_id;
        $this->search = $search;
        // Fetch all dynamic extra fields for students so they can be added to columns
        $this->extraFields = FormField::orderBy('rank')->get();
    }

    public function collection()
    {
        $query = Students::with('user', 'guardian', 'class_section.class.stream', 'class_section.section', 'class_section.medium', 'session_year', 'user.extra_student_details.form_field');
        
        $search = $this->search;
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('user_id', 'LIKE', "%$search%")
                    ->orWhere('class_section_id', 'LIKE', "%$search%")
                    ->orWhere('admission_no', 'LIKE', "%$search%")
                    ->orWhere('roll_number', 'LIKE', "%$search%")
                    ->orWhere('admission_date', 'LIKE', date('Y-m-d', strtotime($search)))
                    ->orWhereHas('user', function ($qu) use ($search) {
                        $qu->where('first_name', 'LIKE', "%$search%")
                            ->orWhere('last_name', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->orWhere('dob', 'LIKE', "%$search%")
                            ->orWhereRaw("concat(first_name,' ',last_name) LIKE '%" . $search . "%'");
                    })->orWhereHas('guardian', function ($qu) use ($search) {
                        $qu->where('first_name', 'LIKE', "%$search%")
                            ->orWhere('last_name', 'LIKE', "%$search%")
                            ->orWhere('email', 'LIKE', "%$search%")
                            ->orWhere('dob', 'LIKE', "%$search%")
                            ->orWhereRaw("concat(first_name,' ',last_name) LIKE '%" . $search . "%'");
                    });
            });
        }
        
        if ($this->class_id) {
            $query->where('class_section_id', $this->class_id);
        }
        
        if ($this->session_year_id) {
            $query->where('session_year_id', $this->session_year_id);
        }

        if ($this->show_deactive == 1) {
            $query->whereHas('user', function ($q) {
                $q->where('status', 0)->withTrashed();
            });
        } else {
            $query->whereHas('user', function ($q) {
                $q->where('status', 1);
            });
        }
        return $query->get();
    }

    public function title(): string
    {
        return 'All Student Data';
    }

    public function headings(): array
    {
        $headings = [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Mobile',
            'DOB',
            'Gender',
            'Blood Group',
            'Student idcard type',
            'Student idcard num',
            'Admission No',
            'Roll Number',
            'Admission Date',
            'Class Section',
            'Session Year',
            'Current Address',
            'Permanent Address',
            'Location',
            'Zone Number',
            'Street Number',
            'Building Number',
            'Landmark',
            'Current Madrasa',
            'Current School',
            'Transportation Needed',
            'Father Name',
            'Father Mobile',
            'Father Whatsapp',
            'Father Occupation',
            'Father ID Card Type',
            'Father ID Card Num',
            'Mother Name',
            'Mother Mobile',
            'Mother Whatsapp',
            'Mother Occupation',
            'Mother ID Card Type',
            'Mother ID Card Num',
            'Guardian Name',
            'Guardian Email',
            'Guardian Mobile',
            'Guardian Gender'
        ];

        // Append extra fields dynamically only if not already present
        foreach ($this->extraFields as $field) {
            if (!in_array($field->name, $headings)) {
                $headings[] = $field->name;
            }
        }

        return $headings;
    }

    public function map($student): array
    {
        $data = [
            'ID' => $student->id,
            'First Name' => $student->user->first_name ?? '',
            'Last Name' => $student->user->last_name ?? '',
            'Email' => $student->user->email ?? '',
            'Mobile' => $student->user->mobile ?? '',
            'DOB' => $student->user->dob ?? '',
            'Gender' => $student->user->gender ?? '',
            'Blood Group' => $student->user->blood_group ?? '',
            'Student idcard type' => $student->user->idcard_type ?? '',
            'Student idcard num' => $student->user->idcard_num ?? '',
            'Admission No' => $student->admission_no ?? '',
            'Roll Number' => $student->roll_number ?? '',
            'Admission Date' => $student->admission_date ?? '',
            'Class Section' => $student->class_section->full_name ?? '',
            'Session Year' => $student->session_year->name ?? '',
            'Current Address' => $student->user->current_address ?? '',
            'Permanent Address' => $student->user->permanent_address ?? '',
            'Location' => $student->location ?? '',
            'Zone Number' => $student->zone_number ?? '',
            'Street Number' => $student->street_num ?? '',
            'Building Number' => $student->building_num ?? '',
            'Landmark' => $student->landmark ?? '',
            'Current Madrasa' => $student->current_madrasa ?? '',
            'Current School' => $student->current_school ?? '',
            'Transportation Needed' => $student->transportation ?? '',
            'Father Name' => $student->father_name ?? '',
            'Father Mobile' => $student->father_mobile ?? '',
            'Father Whatsapp' => $student->father_whatsapp ?? '',
            'Father Occupation' => $student->father_occupation ?? '',
            'Father ID Card Type' => $student->father_idcard_type ?? '',
            'Father ID Card Num' => $student->father_idcard_num ?? '',
            'Mother Name' => $student->mother_name ?? '',
            'Mother Mobile' => $student->mother_mobile ?? '',
            'Mother Whatsapp' => $student->mother_whatsapp ?? '',
            'Mother Occupation' => $student->mother_occupation ?? '',
            'Mother ID Card Type' => $student->mother_idcard_type ?? '',
            'Mother ID Card Num' => $student->mother_idcard_num ?? '',
            'Guardian Name' => $student->guardian->full_name ?? '',
            'Guardian Email' => $student->guardian->email ?? '',
            'Guardian Mobile' => $student->guardian->mobile ?? '',
            'Guardian Gender' => $student->guardian->gender ?? ''
        ];

        // Ensure all unique extra fields are initialized to avoid undefined indexes
        foreach ($this->extraFields as $field) {
            if (!array_key_exists($field->name, $data)) {
                $data[$field->name] = '';
            }
        }

        // Process extra fields
        $fieldsData = collect($student->user->extra_student_details ?? [])->keyBy('form_field_id');
        
        foreach ($this->extraFields as $field) {
            $value = '';
            if ($fieldsData->has($field->id)) {
                $detail = $fieldsData->get($field->id);
                if ($field->type == 'checkbox') {
                    $decodedData = is_string($detail->data) ? json_decode($detail->data, true) : $detail->data;
                    $value = implode(', ', is_array($decodedData) ? $decodedData : []);
                } else if ($field->type == 'file') {
                    $value = $detail->file_url ?? '';
                } else if ($field->type == 'dropdown') {
                    $decodedList = is_string($field->default_values) ? json_decode($field->default_values, true) : (array)$field->default_values;
                    $value = is_array($decodedList) && isset($decodedList[$detail->data]) ? (string)$decodedList[$detail->data] : (string)$detail->data;
                } else {
                    $value = $detail->data;
                }
                
                // Only overwrite if value is not empty. This means if a native field is populated and extra field is empty, native survives.
                // If extra field is populated, it will overwrite native field gracefully as the single source of truth for Excel.
                if (!empty($value)) {
                    $data[$field->name] = $value;
                }
            }
        }

        return array_values($data);
    }
}
