<?php
function crud_permission($name, $order = 0) {
    return [
        ['name' => 'show_'.$name, 'group_name' => $name, 'guard_name' => 'web', 'group_order' => $order],
        ['name' => 'create_'.$name, 'group_name' => $name, 'guard_name' => 'web', 'group_order' => $order],
        ['name' => 'edit_'.$name, 'group_name' => $name, 'guard_name' => 'web', 'group_order' => $order],
        ['name' => 'delete_'.$name, 'group_name' => $name, 'guard_name' => 'web', 'group_order' => $order]
    ];
}

function role_name($id) {
    $role = \Spatie\Permission\Models\Role::find($id);
    return $role->name ?? null;
}

function can($key) {
    return auth()->user()->can($key);
}

function can_not($key) {
    return !auth()->user()->can($key);
}

function unauthorized() {
    return redirect()->route('dashboard')
        ->withMessage(__('Unauthorized'))->withType('danger');
}



if (!function_exists('array_to_object')) {

    /**
     * Convert Array into Object in deep
     *
     * @param array $array
     * @return
     */
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}

if (!function_exists('empty_fallback')) {

    /**
     * Empty data or null data fallback to string -
     *
     * @return string
     */
    function empty_fallback ($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('create_button')) {

    function create_button ($action, $model)
    {
        $action = str_replace($model, "", $action);

        return [
            'submit_text' => ($action == "update") ? "Update" : "Submit",
            'submit_response' => ($action == "update") ? "Updated." : "Submited.",
            'submit_response_notyf' => ($action == "update") ? "Data ".$model." Update success " : "Data ".$model." Added successfully"
        ];
    }
}


/*
 *
 * ##### format date US to KH
 */
if (!function_exists('dateKh')) {

    function dateKh($date_string)
    {
        $date = parseDateToArray($date_string);

        return 'ថ្ងៃទី'.$date['d'] . ' ខែ' . $date['mk'] . ' ឆ្នាំ' . $date['y'];

    }
}

if (!function_exists('formatDateKh')) {


    function formatDateKh($date_string, $format = "")
    {

        $date = parseDateToArray($date_string);

        if ($format == 'd') return $date['d'];

        elseif ($format == 'm') return $date['m'];

        elseif ($format == 'mm') return $date['mk'];

        elseif ($format == 'y') return $date['y'];

        else return $date['d'] . '-' . $date['mk'] . '-' . $date['y'];

    }

    function parseDateToArray($date_string)
    {
        //must use format  y/m/d  - ex 2020-03-27
        $array_result = array();

        $date_string = date_format(date_create($date_string), "Y-m-d");

        $arr_date = explode("-", $date_string);

        $array_result['y'] = convertToKhmerNumber($arr_date[0]);
        $array_result['m'] = convertToKhmerNumber($arr_date[1]);
        $array_result['mk'] = convertToKhmerMonth($arr_date[1]);
        $array_result['d'] = convertToKhmerNumber($arr_date[2]);

        return $array_result;
    }
}

if (!function_exists('convertToKhmerNumber')) {
    function convertToKhmerNumber($input)
    {
        $result = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $single_char = substr($input, $i, 1);

            switch ($single_char) {
                case '0':
                    $single_char = '០';
                    break;
                case '1':
                    $single_char = '១';
                    break;
                case '2':
                    $single_char = '២';
                    break;
                case '3':
                    $single_char = '៣';
                    break;
                case '4':
                    $single_char = '៤';
                    break;
                case '5':
                    $single_char = '៥';
                    break;
                case '6':
                    $single_char = '៦';
                    break;
                case '7':
                    $single_char = '៧';
                    break;
                case '8':
                    $single_char = '៨';
                    break;
                case '9':
                    $single_char = '៩';
                    break;
                default:
                    $single_char = '';
                    break;
            }
            $result = $result . $single_char;
        }
        return $result;
    }
}

if (!function_exists('convertToKhmerMonth')) {
    function convertToKhmerMonth($input)
    {
        $result = '';
        $input = intval($input);
        switch ($input)
        {
          case 1:
            $result = 'មករា';
            break;
          case 2:
            $result = 'កុម្ភៈ';
            break;
          case 3:
            $result = 'មីនា';
            break;
          case 4:
            $result = 'មេសា';
            break;
          case 5:
            $result = 'ឧសភា';
            break;
          case 6:
            $result = 'មិថុនា';
            break;
          case 7:
            $result = 'កក្កដា';
            break;
          case 8:
            $result = 'សីហា';
            break;
          case 9:
            $result = 'កញ្ញា';
            break;
          case 10:
              $result = 'តុលា';
              break;
          case 11:
              $result = 'វិច្ឆិកា';
              break;
          case 12:
              $result = 'ធ្នូ';
              break;
          default:
            $result= '';
            break;
        }

      return $result;

    }

}
